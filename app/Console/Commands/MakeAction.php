<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Console\PromptsForMissingInput;

class MakeAction extends Command implements PromptsForMissingInput
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:action {name} {model?} {--logable}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates an Action class with a handle() method 
    {name : The name of your action. eg. ShowPostAction} 
    {model? : the eloquent model you want to link to the action} 
    {--logable : Whether to make an optional logResults() method on the Action class}';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $model = $this->argument('model');
        $logable = $this->option('logable');
        $makeLogMethod = false;

        if (!$model) {
            $modelChoice = $this->choice('Would you like to link this Action to a specific Model? 🔗', [
                'No', 'Yes'
            ], 0);

            if ($modelChoice === "Yes") {
                $models = get_eloquent_models();
                $model = $this->anticipate('Which Model would you like to link it to?', $models, 0);
            }
        }

        if ($logable) {
            $makeLogMethod = true;
            
        } else {
            $logChoice = $this->choice('Would you like to have a logResults() method on the Action? 🪵', [
                'No',
                'Yes'
            ], 0);
            $makeLogMethod = $logChoice === "Yes";
        }

        $this->info("Name: {$name}, Model: {$model}, Make Log method?: {$makeLogMethod}");
    }

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => ['What should you Action be called? Think about it logically, what does this class do?', 'E.g. ShowPostAction'],   
        ];
    }
}
