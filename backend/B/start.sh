#!/bin/bash
set -e

composer install
composer require laravel/breeze --dev
php artisan migrate
php artisan serve --host 0.0.0.0
