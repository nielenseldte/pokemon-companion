<?php

namespace App\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
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

    protected function promptForMissingArgumentsUsing(): array
    {
        return [
            'name' => ['What should you Action be called? Think about it logically, what does this class do?', 'E.g. ShowPostAction'],
        ];
    }

    protected function createActionInterface()
    {
        $directory = app_path('Actions/Contracts');
        $filePath = $directory . '/ActionInterface.php';
        $stubPath = base_path('stubs/action.interface.stub');

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (!File::exists($filePath)) {
            $content = File::get($stubPath);
            File::put($filePath, $content);
        }
    }

    protected function makeStandardAction(string $name, bool $logable)
    {
        $directory = app_path('Actions');
        $filePath = $directory . "/$name.php";
        $logable ?  $stubPath = base_path('stubs/action.class.standard.stub') : $stubPath = base_path('stubs/action.class.standard.logable.stub');

        $stub = File::get($stubPath);

        $replacements = [
            '{{ namespace }}' => "App\Actions",
            '{{ class }}' => $name,
        ];

        $content = str_replace(array_keys($replacements), array_values($replacements), $stub);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (!File::exists($filePath)) {
            File::put($filePath, $content);
        }
    }

    protected function makeModelAction(string $name, string $modelName, bool $logable)
    {
        $directory = app_path("Actions/$modelName");
        $filePath = $directory . "/$name.php";
        $logable ?  $stubPath = base_path('stubs/action.class.model.stub') : $stubPath = base_path('stubs/action.class.model.logable.stub');

        $stub = File::get($stubPath);

        $replacements = [
            '{{ namespace }}' => 'App\Actions' .'\\'. $modelName,
            '{{ class }}' => $name,
            '{{ model }}' => $modelName
        ];

        $content = str_replace(array_keys($replacements), array_values($replacements), $stub);

        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        if (!File::exists($filePath)) {
            File::put($filePath, $content);
        }
    }

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

        $this->createActionInterface();

        if (!$model) {
            $this->makeStandardAction($name, $makeLogMethod);
        } else {
            $modelName = Str::before($model, '.');
            $this->makeModelAction($name, $modelName, $makeLogMethod);
        }

        $this->info("DONE: Created an Action class '$name'");
    }

    
}
