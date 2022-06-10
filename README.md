<p align="center"><a href="https://squadms.com" target="_blank"><img src="https://raw.githubusercontent.com/SquadMS/Squad-MS/master/logo-white-border.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About SquadMS

SquadMS, or Squad Management System, is a [Laravel](https://laravel.com/) based community and [Squad](https://joinsquad.com) server management system to accomodate **all** requirements set by [OWI](https://www.offworldindustries.com/) for licensed Squad server hosting and take the pain out of it.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Installation (development)

**Requirements:**
- macOS, Linux, and Windows (via [WSL2](https://docs.microsoft.com/en-us/windows/wsl/about))
- [Docker](https://www.docker.com/)

SquadMS coming with an [Laravel Sail](https://laravel.com/docs/8.x/sail) docker environment tailored to it's need. This environment does contain services for MySQL, Redis & HTTP as well as our [SquadMS RCON Worker](https://github.com/SquadMS/SquadMS-RCON-Worker) and has required software such as PHP and NodeJS/NPM installed to run the applications and development scripts.

In order to start using SquadMS you will first need to create your local environment configuration file by copying the `.env.example` file at the root of this project to `.env`. For now this will suffice.

Since [Laravel Sail](https://laravel.com/docs/8.x/sail) is installed using [Composer](https://getcomposer.org/) it is required that you do install all dependencies before using [Laravel Sail](https://laravel.com/docs/8.x/sail) to run the development environment. Since [Laravel Sail](https://laravel.com/docs/8.x/sail) does require [Docker](https://www.docker.com/) to be installed we can use an intermediade container to do so as [described in the offical documentation on how to install dependencies for existing projects](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects) - this will install all dependencies using [Composer](https://getcomposer.org/) and [NPM](https://www.npmjs.com/).
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php80-composer:latest \
    composer install --ignore-platform-reqs
```
It is advised that you then configure an bash alias for [Laravel Sail](https://laravel.com/docs/8.x/sail). You can read on how to do so in the [offical documentation](https://laravel.com/docs/9.x/sail#configuring-a-bash-alias). If you do wish to not use a bash alias you will have to substitute `sail` with `vendor/bin/sail` in the following steps.

After you have installed all dependencies using [Composer](https://getcomposer.org/) and [NPM](https://www.npmjs.com/) you can use [Laravel Sail](https://laravel.com/docs/8.x/sail) to start the development environment as [described in the documentation](https://laravel.com/docs/8.x/sail#starting-and-stopping-sail) by running the following command:
```
sail up -d
```

It is **highly** recommended that you do read the offical documentation for [Laravel Sail](https://laravel.com/docs/8.x/sail) and [Laravel](https://laravel.com/docs/8.x) for information on any further steps.

Now that your [Laravel Sail](https://laravel.com/docs/8.x/sail) environment is running you are able to use it to generate your `APP_KEY` in your .env file. To do so run the following command:
```
sail artisan key:generate
```

Next you will have to install and build the frontend assets using [Laravel Mix](https://laravel-mix.com/docs/6.0/installation). To do so simply run the following commands:
```
sail artisan npm install
sail artisan npm run dev
```

You will also have to publish all assets provided trought the SquadMS module system. This does include any theme or plugin. To do so run the following command:
```
sail artisan sqms:publish-assets
```

You can now visit the followin URLs to view the local site:
http://localhost:80   - The Octane version ("supercharged" but requires reload/reboot on changes)
http://localhost:8080 - The regular version (use this for xDebug as it is not compatible with Octane/Swoole)

### Partners

- **[Deutsche Squad Gemeinschaft](https://dsg-gaming.de/)**

## License

SquadMS and the Laravel framework are open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
