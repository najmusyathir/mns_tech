<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About MNS TECH


Welcome to MNS Tech Store, your one-stop shop for all things PC! Whether you're a hardcore gamer, a digital artist, or a professional in need of powerful computing solutions, we've got you covered. Explore our wide range of products, from cutting-edge gaming rigs to high-performance workstations, and discover the perfect PC for your needs. With top brands, expert advice, and unbeatable prices, MNS Tech Store is the ultimate destination for all your PC shopping needs.


## LARAVEL SETUP

- Install composer
- Download php.zip at PHP official website
- Save it in C:php/
- Rename file php.ini-development to php.ini
- Enable comments extension:
    > openssl
    > pdo_mysql
    > zip
    > fileinfo

- if encounter error like "VCRUNTIME140.dll and MSVCP140.dll missing in Windows 11", install this ( https://aka.ms/vs/17/release/vc_redist.x64.exe )

- run "composer install" in DIR of imported project
- run 'composer require laravel/ui'
- run 'npm install'
- run 'npm run build'
- copy .env.example = paste and rename it as .env
- run "php artisan migrate"
- run "php artisan key:generate"
- run "php artisan serve"


## Basic cli syntax
- start server >> php artisan serve
- create migration file >> php artisan make:migration action_name
- migrate files >> php artisan migrate
- create controller file >> php artisan make:controller NameController
