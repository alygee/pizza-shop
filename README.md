# Pizza shop, site for ordering pizza
The demo is here http://pizza.albert-allagulov.com/

## Technologies used

- Laravel 8.0 as a backend framework
- Vue as a SPA application

## Installation
- Configure a connection to a database, create a table
- Run `composer install` for backend dependencies
- Run `npm install` for frontend dependencies
- Run `npm run development` or `npm run prod` to build frontend
- Create .env settings file
- Generate crypt key: `php artisan key: generate`
- Run DB migrations: `php artisan migrate --seed`
- Create link to file storage: `php artisan storage: link`

## Some notes
Authorization is implemented via JSON Web Token (JWT).  
A role system for managing the admin panel has been made, but the admin panel itself is not implemented.  
The site contains flaws and bugs that I plan to fix in the future.


