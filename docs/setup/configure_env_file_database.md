---
layout: default
---

### [Back to index](./index.html)

# Configure the database parameters in the .env file

The .env file in the root directory of the Symbiota2 installation configures the database connection.
Symbiota2 is configured to use the MySQL DBMS container within the Docker setup by default. If you are
planning on using this DBMS for your database, as well as the nginx and php containers within 
the Docker setup for your server, there is no need to do anything further. If you are planning on using 
this DBMS for your database with a locally installed application for your server, edit the .env by changing
line 11 to the following:

```shell
DATABASE_URL=mysql://root:password@127.0.0.1:3308/symbiota
```

* * *

If you are planning on using a different DBMS in the Docker setup, SQLite, or one installed locally on your machine,
you must edit the .env file by doing the following:

- Comment out lines 11-13 so that lines 10-14 look like the following:
    ```shell
    ######TO USE MYSQL UNCOMMENT THESE LINES##############################
    #DATABASE_URL=mysql://root:password@mysql/symbiota
    #DATABASE_DRIVER='pdo_mysql'
    #DATABASE_SERVER_VERSION='5.7'
    ######################################################################
    ```

- If you plan to use the MariaDB DBMS Docker container (**NOTE - THIS CONTAINER IS NOT
    COMPATIBLE WITH DOCKER FOR WINDOWS**), uncomment lines 17-19 so that lines 16-20 
    look like the following:
    ```shell
    ######TO USE MARIADB UNCOMMENT THESE LINES############################
    DATABASE_URL=mysql://root:password@mariadb/symbiota
    DATABASE_DRIVER='pdo_mysql'
    DATABASE_SERVER_VERSION='mariadb-10.4.1'
    ######################################################################
    ```
  
  - If you are going to use this DBMS with a locally installed application for your server, edit the .env by 
    changing line 17 to the following:
    ```shell
    DATABASE_URL=mysql://root:password@127.0.0.1:3310/symbiota
    ```
    
- If you plan to use the Postgres DBMS Docker container, uncomment lines 23-25 so that lines 
    22-26 look like the following:
    ```shell
    ######TO USE POSTGRES UNCOMMENT THESE LINES###########################
    DATABASE_URL=postgres://postgres:password@postgres/symbiota
    DATABASE_DRIVER='pdo_pgsql'
    DATABASE_SERVER_VERSION='11.1'
    ######################################################################
    ```
  
  - If you are going to use this DBMS with a locally installed application for your server, edit the .env by 
      changing line 23 to the following:
      ```shell
      DATABASE_URL=postgres://postgres:password@127.0.0.1:5434/symbiota
      ```

- If you plan to use SQLite, uncomment line 29 so that lines 28-30 look like the following:
    ```shell
    ######TO USE SQLITE UNCOMMENT THIS LINE###############################
    DATABASE_URL=sqlite:///%kernel.project_dir%/data/sqlite/symbiota.db
    ######################################################################
    ```

- If you plan to use a DBMS that is installed locally on your machine, follow these steps:
  - Uncomment lines 33-35 so that lines 32-36 look like the following:
    ```shell
    ######TO USE LOCAL DB UNCOMMENT THESE LINES AND EDIT##################
    DATABASE_URL=
    DATABASE_DRIVER=''
    DATABASE_SERVER_VERSION=''
    ######################################################################
    ```
  - Set `DATABASE_URL` to the absolute url for your database connection, for example:
    ```shell
    DATABASE_URL=mysql://username:password@127.0.0.1:3306/database_name
    ```
  - Set `DATABASE_DRIVER` to either `pdo_mysql` for MySQL or MariaDB DBMSs, or 
    `pdo_pgsql` for a Postgres DBMS.
  - Set `DATABASE_SERVER_VERSION` to the version of your DBMS, for example `11.1` For 
    a MariaDB DBMS, append `mariadb-` to the version number, for example 
    `mariadb-10.4.1`
- **NOTE - You can only have one DBMS database configuration uncommented at a time in the .env
    file. You can change the DBMS that is uncommented, but only one can be active at a time.**

### [Back to index](./index.html)
