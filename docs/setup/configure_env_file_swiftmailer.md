---
layout: default
---

### [Back to index](/index.html)

# Configure Swift Mailer in the .env file

Symbiota2 includes the [Swift Mailer](https://swiftmailer.symfony.com/){:target="_blank"} PHP library, which
needs to be configured in order for Symbiota2 to send emails to users. Swift Mailer needs to be configured to
use either a Gmail account or other SMTP service for mailing. If you do not already have a SMTP service working 
in your server stack, it might be easiest to create a Gmail account for the Symbiota2 installation. If you create a
Gmail account to use, be sure to go to Settings -> Accounts and Import -> Change account settings -> Other Google 
Account settings -> Security and set 'Less secure app access' to On. Then edit the .env file by doing the following:

- If you are configuring Swift Mailer to work with a Gmail account, follow these steps:
  - Change line 61 to the following:
    ```shell
    MAILER_URL=gmail://username:password@localhost
    ```
  - Change `username` in line 61 to the username of the Gmail account.
  - Change `password` in line 61 to the password of the Gmail account.

- If you are configuring Swift Mailer to work with an SMTP server, follow these steps:
  - Change line 61 to the following:
    ```shell
    MAILER_URL=smtp://localhost:25?encryption=&auth_mode=
    ```
  - Change `localhost:25` in line 61 to the host and port of the SMTP server.
  - Set the encryption type after `encryption=` in line 61.
  - Set the authorization mode type after `auth_mode=` in line 61.

### [Back to index](/index.html)
