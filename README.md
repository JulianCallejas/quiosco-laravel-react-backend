<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>


## Quiosco Backend

This is a simple app to order food, made with Laravel and ReactJS

To run this app, you need to install Composer for Laravel and NodeJs for React. This repository contains the Backend for this app.

## Installation

1. Clone the repository

2. Install the dependencies
    ```Bash
    composer install
    ```
3. Create the database in MySql

4. Update the .env file with the database configuration. See the .env.example file

5. Make migrations 
    ```Bash
    php artisan migrate
    ```

6. Seed the database
    ```Bash
    php artisan db:seed
    ```

7. Start the server
    ```Bash
    php artisan serve
    ```