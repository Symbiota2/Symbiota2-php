---
layout: default
---

### [Back to index](/index.html)

# To upgrade a Symbiota 1.x database to use with Symbiota2

If you are using a Symbiota 1.x database with your installation of Symbiota2, you must first verify that your 
Symbiota 1.x database is using the most reccent schema version by doing the following:

- Establish a connection to your database.
- Run the following sql query on your database to determine the schema version:
    ```sql
    SELECT versionnumber FROM schemaversion ORDER BY versionnumber DESC LIMIT 1
    ```

- If the result of the last step is 1.1, then your database has the most recent schema. If the result is a lower value, 
    install the remaining database schema patch files from your Symbiota 1.x installation before proceeding.

Once you have verified that your Symbiota 1.x database has the most recent schema version, install the Symbiota2 upgrade 
patch on your database by doing the following:

- Make sure you have [configured the database parameters in your .env file](./configure_env_file_database.html).
- Additionally, if you are using Docker, make sure you have [built the Docker containers](./build_docker_setup.html).
- In your terminal window run:
    ``` 
    php bin/console doctrine:database:import config/sql/db_schema-1.1_patch.sql --env=dev
    ```

### [Back to index](/index.html)
