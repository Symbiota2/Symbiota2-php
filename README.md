## Welcome to the Symbiota2 development repository

Symbiota2 is currently under development. Though some portions of the application may work, the application as a whole is not ready for use. Symbiota2 uses the Laravel framework and requires [Composer](https://getcomposer.org/doc/00-intro.md), [node.js](https://nodejs.org/en/), and [PHP 7.1.3 or greater](http://php.net/manual/en/install.php) to be installed. In addition, the following PHP extensions need to be enabled:

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
- `php bin/console doctrine:migrations:diff`
- `php bin/console doctrine:migrations:migrate`
- Generate private key by `openssl genrsa -out config/jwt/private.pem -aes256 4096` and use JWT_PASSPHRASE value from /.env file as pass phrase when prompted, then enter value again to verify
- Generate public key by `openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem` and use JWT_PASSPHRASE value from /.env file as pass phrase when prompted
- Within /frontend/environments/environment.ts, change [API base URL] with the base URL of your backend API (ex. http://localhost/public/)
- `ng serve`
