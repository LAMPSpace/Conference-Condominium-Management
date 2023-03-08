<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Conference Condominium Management System application

## Getting Started

- Clone the repository
- Clone the .env.example file and rename it to .env

### Using Docker to setup

### Configuration

After the application is up, we need to run migration and seed script to create table and sample data
- If you are using sail, you need to run this command: `sail artisan migrate:refresh --seed`
- Otherwise, you could use the normal laravel migration command line: `php artisan migrate:refresh --seed` but just make sure the application is able to connect to your database following the settings in `.env` file.

## Usage

## Roadmap

## Contributing

