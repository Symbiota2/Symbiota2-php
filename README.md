## Welcome to the Symbiota2 development repository

Symbiota2 is currently under development. Though some portions of the application may work, the application as a whole is not ready for use. Symbiota2 uses the Laravel framework and requires [Composer](https://getcomposer.org/doc/00-intro.md), [node.js](https://nodejs.org/en/), and [PHP 7.1.3 or greater](http://php.net/manual/en/install.php) to be installed. In addition, the following PHP extensions need to be enabled:

- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- JSON

Symbiota2 can be installed in the following steps:

- Clone the code in this repository
`git clone https://github.com/Symbiota2/Symbiota2.git portal-name`
- `cd portal-name`
- `composer install`
- `npm install`
- Copy /config/database_example.php to /config/database.php and edit with database connection parameters
- Copy /.env.example to /.env and edit with database connection parameters
- `php artisan key:generate`
- `php artisan config:cache`
- `php artisan doctrine:migrations:diff`
- `php artisan doctrine:migrations:migrate`
- `php artisan passport:install`
- After `php artisan passport:install` has completed there should be two records in the oath_clients table of your database
- If you are installing a development environment: copy /src/environments/environment.ts.example to /src/environments/environment.ts and within that file, change [API base URL] with the base URL of your backend API (ex. http://localhost/public/) and [client secret] to the value in the secret field of the second record (id = 2) in the oath_clients table of your database
- If you are installing a production environment: copy /src/environments/environment.prod.ts.example to /src/environments/environment.prod.ts and within that file, change [API base URL] with the base URL of your backend API (ex. http://localhost/public/) and [client secret] to the value in the secret field of the second record (id = 2) in the oath_clients table of your database
- `ng serve`
