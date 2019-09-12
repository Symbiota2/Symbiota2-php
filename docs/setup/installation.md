---
layout: default
---

### [Back to index](./index.html)

# Install the software

Symbiota2 uses the Symfony framework and requires [Composer](https://getcomposer.org/doc/00-intro.md), [node.js 10 or greater](https://nodejs.org/en/), and [PHP 7.1 or greater](http://php.net/manual/en/install.php) to be installed. In addition, the following PHP extensions need to be enabled:

- Ctype
- iconv
- JSON
- Mbstring
- OpenSSL
- PCRE
- PDO
- Session
- SimpleXML
- Tokenizer

If any of the Docker server stack components are to be used, [Docker Desktop](https://www.docker.com/products/docker-desktop)
must be installed also.

**If you are installing Symbiota2 on a Linux machine, make sure you have node.js 10 or greater installed.**

To install Symbiota2:

- Create a GitHub clone of the repository:

    `git clone https://github.com/Symbiota2/Symbiota2.git <portal-name>`
    
    replacing `<portal-name>` with the name you would like to use for the root folder of your installation
- Change direcotry to root of installation:
    
    `cd <portal-name>`
    
- Run Composer install:

  `composer install`
  
- Run npm install:
    
    `npm install`
    

### [Back to index](./index.html)
