---
layout: default
---

### [Back to index](../index.html)

# Populate the database with data

If you setup a new database for your Symbiota2 installation and it currently contains no data, you can either 
populate your new database with the default data designed for new portals that only contains data necessary for lookup 
menus and initial authentication, or you can populate your new database with the Symbiota2 development database which
is a completely populated sample database intended for development purposes. **Note - if you have upgraded a Symbiota 1.x
database and are using that in your Symbiota2 installation, skip this section.**

**Before proceeding, make sure you have [setup your Symbiota2 database](./setup_symbiota2_database.html).**

* * *

To populate the default data in your Symbiota2 database follow these steps:
- Unzip the config/sql/symbiota2_default_data.zip archive into config/sql/default. If you are using the php Docker 
    container or a Linux or Mac, this can be done in your terminal by running:
    ```shell
    unzip config/sql/symbiota2_default_data.zip -d config/sql/
    ```
- To execute the sql scripts, in your terminal run:
    ```shell
    php bin/console doctrine:database:import config/sql/default/* --env=dev
    ```

* * *

To populate with the Symbiota2 development database follow these steps:
- Unzip the config/sql/symbiota2_dev_db.zip archive into config/sql/dev. If you are using the php Docker 
    container or a Linux or Mac, this can be done in your terminal by running:
    ```shell
    unzip config/sql/symbiota2_dev_db.zip -d config/sql/
    ```
- To execute the sql scripts, in your terminal run:
    ```shell
    php bin/console doctrine:database:import config/sql/dev/* --env=dev
    ```

* * *

### [Back to index](../index.html)
