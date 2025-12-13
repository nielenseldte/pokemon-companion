<?php

namespace App\Console\Commands;

use App\Models\Card;
use Illuminate\Support\Arr;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCards extends Command
{
    const ENDPOINT = 'https://api.pokemontcg.io/v2/cards';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pokemon:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Populates the mongoDB databse with the latest card data from Pokemon API into central MongoDB';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Importing all Pokemon Player cards...");

        $page = 1;
        $pageSize = 250;
        $totalCount = null;

        do {
            $response = Http::withHeaders([
                'X-Api-Key' => env('POKEMON_API_KEY')
            ])
            ->timeout(120)
            ->get(self::ENDPOINT, [
                'page' => $page,
                'pageSize' => $pageSize,
            ]);

            $data = $response->json();

            if (!$response->ok()) {
                $this->error("Error: Failed at page {$page} , HTTP Code-" . $response->status());
                break;
            }

            if (!$data || !isset($data['data'])) {
                $this->error("Error on page: {$page}, failed to retreive any cards for this page");
                break;
            }

            $cards = $data['data'];

            $cards = array_filter($cards, fn($c) => ($c['supertype'] ?? '') === 'Pokémon');

            foreach ($cards as $card) {
                $attacks = Arr::get($card, 'attacks', []);
                $damage = 0;
                foreach ($attacks as $attack) {
                    $damage += intval(Arr::get($attack, 'damage', 0));
                }
                Card::updateOrCreate(
                    ['card_id' => Arr::get($card, 'id')],
                    [
                        'name' => Arr::get($card, 'name', 'N/A'),
                        'hp' => intval(Arr::get($card, 'hp', 0)),
                        'total_damage' => $damage,
                        'images' => Arr::get($card, 'images', []),
                        'value' => Arr::get($card, 'tcgplayer.prices.holofoil', []),
                        'average_sale_price' => Arr::get($card, 'cardmarket.prices.averageSellPrice', 0),
                        'price_url' => Arr::get($card, 'cardmarket.url', '#')
                    ]);
            }

            $this->info("Imported ". count($cards). " from API");

            $page++;
            $totalCount = $data['totalCount'] ?? null;
            sleep(2);
        } while ($totalCount === null || ($page - 1) * $pageSize < $totalCount);

        $this->info("Import complete");
    }
}
