<?php

namespace Modules;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider {

    public function boot() {
        $directories = array_map('basename', File::directories(__DIR__));
        
        if (!empty($directories)) {
            foreach ($directories as $directory) {
                $this->loadModule($directory);
            }
        }
    }

    public function loadModule($moduleName) {
        $modulePath = __DIR__ . '/' . $moduleName;

        // Load routes
        if (File::exists($modulePath . '/routes/routes.php')) {
            $this->loadRoutesFrom($modulePath . '/routes/routes.php');
        }
        // Load views
        if (File::exists($modulePath . '/resources/views')) {
            $this->loadViewsFrom($modulePath . '/resources/views', $moduleName);
        }
        // Load translations
        if (File::exists($modulePath . '/resources/languages')) {
            $this->loadTranslationsFrom($modulePath . '/resources/languages', $moduleName);
            $this->loadJsonTranslationsFrom($modulePath . '/resources/languages');
        }
        // Load migrations
        if (File::exists($modulePath . '/migrations')) {
            $this->loadMigrationsFrom($modulePath . '/migrations');
        }
        // Load helpers
        if (File::exists($modulePath . '/helpers')) {
            foreach (File::allFiles($modulePath . '/helpers') as $file) {
                require_once $file->getPathname();
            }
        }
    }

    public function register() {
        $directories = array_map('basename', File::directories(__DIR__));

        if (!empty($directories)) {
            foreach ($directories as $directory) {
                $configPath = __DIR__ . '/' . $directory . '/config';

                if (File::exists($configPath)) {
                    $configFiles = array_map('basename', File::allFiles($configPath));

                    if (!empty($configFiles)) {
                        foreach ($configFiles as $configFile) {
                            $this->mergeConfigFrom($configPath . '/' . $configFile, basename($configFile, '.php'));
                        }
                    }
                }
            }
        }
    }

}