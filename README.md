<p align="center"><a href="https://laravel.com" target="_blank"><img src=https://avatars.githubusercontent.com/u/127288517?s=200&v=4" width="150" alt="LAMPSpace"></a></p>

## About Conference Condominium Management System application
[![Develop build](https://github.com/LAMPSpace/Conference-Condominium-Management/actions/workflows/develop.yml/badge.svg?branch=develop)](https://github.com/LAMPSpace/Conference-Condominium-Management/actions/workflows/develop.yml)

With our software, you can easily create and manage event schedules, track attendee registrations, and generate reports on attendance and other important metrics. The system is user-friendly and customizable, so you can tailor it to meet the unique needs of your condominium community.
## Getting Started

- Clone the repository
- Clone the .env.example file and rename it to .env

### Using Docker to setup
The project is configurated to run with docker by using the [Laravel Sail](https://laravel.com/docs/8.x/sail#introduction).

First, you need to run composer install command line if you have the completed PHP CLI and composer setup on your local.

Otherwise, you could install composer dependencies for this existing application by following this [Laravel Sail guideline](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects).

After installing the composer dependencies, following this [Configuring A Bash Alias](https://laravel.com/docs/8.x/sail#configuring-a-bash-alias) to run `sail` command lines.

### Configuration

After the application is up, we need to run migration and seed script to create table and sample data
- If you are using sail, you need to run this command: `sail artisan migrate:refresh --seed`
- Otherwise, you could use the normal laravel migration command line: `php artisan migrate:refresh --seed` but just make sure the application is able to connect to your database following the settings in `.env` file.

## Usage

## Database
<iframe width="100%" height="315" src='https://dbdiagram.io/embed/640d5968296d97641d873926'> </iframe>

## Roadmap
- [ ] Authenticate System
- [ ] Authorization System
- [ ] User Management
- [ ] Condominium Management
- [ ] Event Management
- [ ] Event Registration
- [ ] Event Attendance
- [ ] Event Report
- [ ] Event Feedback
- [ ] Event Survey
- [ ] ...

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.
