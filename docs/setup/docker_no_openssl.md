---
layout: default
---

### [Back to index](./index.html)

# If Docker openssl container is not being used

The Docker openssl container provides a service that creates both a public.pem and private.pem key files and saves them 
in config/jwt of your Symbiota2 installation. These key files are necessary for the authentication processes within Symbiota2.
If you are not using the Docker containers entirely, or have chosen to remove the openssl container from your 
docker-compose file, you will need to generate these key files through the following steps:

- Generate the config/jwt/private.pem file by running the following in your terminal:
    ```shell
    openssl genrsa -out config/jwt/private.pem -aes256 4096
    ```
- Enter `1234567891011121314151617181920` as pass phrase when prompted, then enter again to verify.
- Generate the config/jwt/public.pem file by running the following in your terminal:
    ```shell
    openssl rsa -pubout -in config/jwt/private.pem -out config/jwt/public.pem
    ```
- Enter `1234567891011121314151617181920` as pass phrase when prompted.

### [Back to index](./index.html)
