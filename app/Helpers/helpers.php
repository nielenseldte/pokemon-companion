<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

if (!function_exists('get_eloquent_models')) {
    function get_eloquent_models() {
        $models = [];
        $modelsPath = app_path('Models');

        if (File::exists($modelsPath)) {
            $modelFiles = File::allFiles($modelsPath);

            foreach ($modelFiles as $modelFile) {
                $className = 'App\\Models\\' . $modelFile->getFilenameWithoutExtension();
                if (class_exists($className) && is_subclass_of($className, Model::class)) {
                    $models[] = $modelFile->getFilename();
                }
                
            }
        }
        return $models;
    }
}