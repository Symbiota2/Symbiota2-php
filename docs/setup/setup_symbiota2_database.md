---
layout: default
---

### [Back to index](./index.html)

# Setup the Symbiota2 database

To run the initial setup scripts for your Symbiota2 database follow these steps:

- Make sure you have [configured the database parameters in your .env file](./configure_env_file_database.html).
- Additionally, if you are using Docker, make sure you have [built the Docker containers](./build_docker_setup.html).
- If you are using a Symbiota 1.x database, make sure you have [upgraded it](./upgrade_1.x_database.html).
- To generate the migration scripts for your database, in your terminal run:
    ```shell
    php bin/console doctrine:migrations:diff
    ```
- To execute the migration scripts that were generated, in your terminal run:
    ```shell
    php bin/console doctrine:migrations:migrate
    ```
- Enter 'y' when prompted to confirm the execution of the migration scripts

- Populate the default data in your database by running:
    ```shell
    php bin/console doctrine:database:import config/sql/default/* --env=dev
    ```

### [Back to index](./index.html)
