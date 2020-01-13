---
layout: default
---

### [Back to index](./index.html)

# Populate the database with sample data

Sample data, which can be used to populate the database for development purposes, is available for the core Symbiota2 application 
and the following plugins: checklist, collection, crowd-source, exsiccati, glossary, image-processor, key, media, occurrence, 
occurrence-association, occurrence-comment, occurrence-dataset, occurrence-loan, taxa, and traits. 

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
    php bin/console doctrine:database:import config/sql/symbiota2_default_data.sql --env=dev
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

**After completing these steps, if you are logged into the php Docker container, exit the container:**
```shell
exit
```

### [Back to index](./index.html)
