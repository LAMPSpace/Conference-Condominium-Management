<?php

namespace App\Console\Commands;

use Faker\Provider\Base;
use Illuminate\Support\Facades\File;
use Illuminate\Console\Command;

class Module extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module CLI';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $path = 'modules';
        $name = $this->argument('name');
        $modulePath = $path . '/' . $name;
        if (File::exists(base_path($modulePath))) {
            $this->error('Module already exists!');
            return;
        }

        File::makeDirectory(base_path($modulePath), 0755, true, true);

        // Config
        $configFolder = base_path($modulePath . '/config');
        if (!File::exists($configFolder)) {
            File::makeDirectory($configFolder, 0755, true, true);
            File::put($configFolder . '/.gitkeep', '');
        }

        // Helpers
        $helpersFolder = base_path($modulePath . '/helpers');
        if (!File::exists($helpersFolder)) {
            File::makeDirectory($helpersFolder, 0755, true, true);
            $functionFile = base_path($modulePath . '/helpers/function.php');
            if (!File::exists($functionFile)) {
                File::put($functionFile, "<?php\r\n");
            }
        }

        // Migrations
        $migrationsFolder = base_path($modulePath . '/migrations');
        if (!File::exists($migrationsFolder)) {
            File::makeDirectory($migrationsFolder, 0755, true, true);
            File::put($migrationsFolder . '/.gitkeep', '');
        }

        // Resources
        $resourcesFolder = base_path($modulePath . '/resources');
        if (!File::exists($resourcesFolder)) {
            File::makeDirectory($resourcesFolder, 0755, true, true);

            // Views
            $viewsFolder = base_path($modulePath . '/resources/views');
            if (!File::exists($viewsFolder)) {
                File::makeDirectory($viewsFolder, 0755, true, true);
                File::put($viewsFolder . '/.gitkeep', '');
            }

            // Languges
            $languagesFolder = base_path($modulePath . '/resources/lang');
            if (!File::exists($languagesFolder)) {
                File::makeDirectory($languagesFolder, 0755, true, true);
            }
        }

        // Routes
        $routesFolder = base_path($modulePath . '/routes');
        if (!File::exists($routesFolder)) {
            File::makeDirectory($routesFolder, 0755, true, true);

            // Create web.php
            $webFile = base_path($modulePath . '/routes/web.php');
            if (!File::exists($webFile)) {
                $stub = file_get_contents(app_path('Console/Commands/Stubs/RouteModule.stub'));
                $stub = str_replace('{{module_name}}', $name, $stub);
                $stub = str_replace('{{slug}}', strtolower($name), $stub);
                File::put($webFile, $stub);
            }

            // Create api.php
            $apiFile = base_path($modulePath . '/routes/api.php');
            if (!File::exists($apiFile)) {
                File::put($apiFile, "<?php\r\nuse Illuminate\Support\Facades\Route;\r\n");
            }
        }

        // Src
        $srcFolder = base_path($modulePath . '/src');
        if (!File::exists($srcFolder)) {
            File::makeDirectory($srcFolder, 0755, true, true);

            // Http
            $httpFolder = base_path($modulePath . '/src/Http');
            if (!File::exists($httpFolder)) {
                File::makeDirectory($httpFolder, 0755, true, true);

                // Controllers
                $controllersFolder = base_path($modulePath . '/src/Http/Controllers');
                if (!File::exists($controllersFolder)) {
                    File::makeDirectory($controllersFolder, 0755, true, true);
                    File::put($controllersFolder . '/.gitkeep', '');
                }

                // Middleware
                $middlewareFolder = base_path($modulePath . '/src/Http/Middlewares');
                if (!File::exists($middlewareFolder)) {
                    File::makeDirectory($middlewareFolder, 0755, true, true);
                    File::put($middlewareFolder . '/.gitkeep', '');
                }
            }
            
            // Models
            $modelsFolder = base_path($modulePath . '/src/Models');
            if (!File::exists($modelsFolder)) {
                File::makeDirectory($modelsFolder, 0755, true, true);
                File::put($modelsFolder . '/.gitkeep', '');
            }

            // Commands
            $commandsFolder = base_path($modulePath . '/src/Commands');
            if (!File::exists($commandsFolder)) {
                File::makeDirectory($commandsFolder, 0755, true, true);
                File::put($commandsFolder . '/.gitkeep', '');
            }

            // Repositories
            $repositoriesFolder = base_path($modulePath . '/src/Repositories');
            if (!File::exists($repositoriesFolder)) {
                File::makeDirectory($repositoriesFolder, 0755, true, true);

                $moduleRepositoryFile = base_path($modulePath . '/src/Repositories/'. $name . 'Repository.php');
                if (!File::exists($moduleRepositoryFile)) {
                    $repoNamespace = 'Modules\\' . $name . '\\src\\Repositories';
                    // using stub file
                    $stub = file_get_contents(app_path('Console/Commands/Stubs/CoreRepository.stub'));
                    $stub = str_replace('{{namespace}}', $repoNamespace, $stub);
                    $stub = str_replace('{{repository_name}}', $name . 'Repository', $stub);
                    File::put($moduleRepositoryFile, $stub);
                }
            }

            // Services
            $servicesFolder = base_path($modulePath . '/src/Services');
            if (!File::exists($servicesFolder)) {
                File::makeDirectory($servicesFolder, 0755, true, true);

                $moduleServiceFile = base_path($modulePath . '/src/Services/'. $name . 'Service.php');
                if (!File::exists($moduleServiceFile)) {
                    $serviceNamespace = 'Modules\\' . $name . '\\src\\Services';
                    $stub = file_get_contents(app_path('Console/Commands/Stubs/CoreService.stub'));
                    $stub = str_replace('{{namespace}}', $serviceNamespace, $stub);
                    $stub = str_replace('{{service_name}}', $name . 'Service', $stub);
                    $stub = str_replace('{{repository}}', "Modules\\" . $name . "\\src\\Repositories\\" . $name . "Repository", $stub);
                    $stub = str_replace('{{dependency}}', $name . "Repository", $stub);
                    File::put($moduleServiceFile, $stub);
                }
            }
        }

        $this->info('Module created successfully.');
        $this->info('Structure:');
        $this->info('├── config');
        $this->info('├── helpers');
        $this->info('├── migrations');
        $this->info('├── resources');
        $this->info('│   ├── lang');
        $this->info('│   └── views');
        $this->info('├── routes');
        $this->info('│   ├── api.php');
        $this->info('│   └── web.php');
        $this->info('└── src');
        $this->info('    ├── Commands');
        $this->info('    ├── Http');
        $this->info('    │   ├── Controllers');
        $this->info('    │   └── Middlewares');
        $this->info('    └── Models');
    }
}
