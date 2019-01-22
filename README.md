## Welcome to the Symbiota2 development repository

Symbiota2 is currently under development. Though some portions of the application may work, the application as a whole is not ready for use. Symbiota2 uses the Symfony framework and requires [Composer](https://getcomposer.org/doc/00-intro.md), [node.js](https://nodejs.org/en/), and [PHP 7.1.3 or greater](http://php.net/manual/en/install.php) to be installed. In addition, the following PHP extensions need to be enabled:

- OpenSSL
- PDO
- Mbstring
- Tokenizer
- XML
- Ctype
- JSON

Symbiota2 can be installed for development in the following steps:

- Clone the code in this repository
`git clone https://github.com/Symbiota2/Symbiota2.git portal-name`
- `cd portal-name`
- `composer install`
- `npm install`
- Edit /.env with database connection parameters
- To install the pre-populated Symbiota2 development database:
  - Unzip config/sql/symbiota2_dev_db.zip
  - From project root run `php bin/console doctrine:database:import config/sql/dev/* --env=dev`
  - All users have the password: password
- To use an existing Symbiota database:
  - Ensure that the database has been updated to schema 1.1
  - `php bin/console doctrine:database:import config/sql/db_schema-1.1_patch.sql --env=dev`
  - `php bin/console doctrine:migrations:diff`
  - `php bin/console doctrine:migrations:migrate`
  - All existing users will need to update their passwords before successfully logging in
- To install an empty Symbiota2 database with default lookup data:
  - `php bin/console doctrine:migrations:diff`
  - `php bin/console doctrine:migrations:migrate`
  - `php bin/console doctrine:database:import config/sql/default_data.sql --env=dev`
  - One admin user will be added to the database with username: admin and password: admin
- Generate private key by `openssl genrsa -out config/jwt/private.pem -aes256 4096` and use JWT_PASSPHRASE value from /.env file as pass phrase when prompted, then enter value again to verify
- Generate public key by `openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem` and use JWT_PASSPHRASE value from /.env file as pass phrase when prompted
- `ng serve`
