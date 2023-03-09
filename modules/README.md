# Modules

## **Structure of the modules directory**

The modules directory contains the following subdirectories:

```
modules
├── Demo
│ ├── configs
│ │ └── demo.php
│ ├── migrations
│ ├── resources
│ │ └── languages
│ │ └── views
│ ├── routes
│ │ └── routes.php
│ ├── src
│ │ └── Commands
│ │ └── Http
│ │ | └── Controllers
│ │ | └── Middlewares
│ │ └── Models
├── Demo2
│ ├── ...
└── ModuleServiceProvider.php
```

## **Usage**

### Migration
```bash
php artisan make:migration create_demo_table --path=modules/Demo/migrations
```

### Controller
```bash
php artisan make:controller DemoController --resource --model=Demo --path=modules/Demo/src/Http/Controllers
```

### Model
```bash
php artisan make:model Demo --path=modules/Demo/src/Models
```

### Middleware
```bash
php artisan make:middleware DemoMiddleware --path=modules/Demo/src/Http/Middlewares
```

### Command
```bash
php artisan make:command DemoCommand --path=modules/Demo/src/Commands
```
