<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## How to start the web application:

1- create .env file and copy the .env.example file to it and change the database name to shop

2- run the follwoing command first:

- composer install
- npm install

3- create new database in the name: shop

4- run the follwoing command in order:

- php artisan migrate
- php artisan db:seed --class=RolesTableSeeder
- php artisan db:seed --class=PermissionSeeder
- php artisan db:seed --class=PermissionRoleSeeder

5- run this command:
- php artisan storage:link

6- To run the website:
- npm run dev
- php artisan serve

Note:

to signup as super admin, first register as normal user and then change the role_id in the database table (user) to 1
and then you can access the admin dashboard via the small icon in the nav bar.

if the image upload didn't work the first time, please try upload it again. It will work eventually
