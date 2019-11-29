---
layout: default
---

### [Back to index](./index.html)

# To upgrade a Symbiota 1.x database to use with Symbiota2

If you are using a Symbiota 1.x database with your installation of Symbiota2, you must first verify that your 
Symbiota 1.x database is using the most reccent schema version by doing the following:

**It is highly recommended to make a backup of your database before proceeding. The following steps will make several 
changes to your database schema that will be difficult to undo.**

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
- If your database is using the default Symbiota 1.x schema, in your terminal window run:
    ``` 
    php bin/console doctrine:database:import config/sql/db_schema-1.1_patch.sql --env=dev
    ```
- If your database has been modified outside of the Symbiota 1.x db_schema-x and db_schema_patch-x sql files, you will
    have to execute the `config/sql/db_schema-1.1_patch.sql` file manually on your database, and adjust the scripts
    included within the file in the event that they differ from your database schema and cause and error.
- If you have any custom tables in your database that are outside the tables defined in the Symbiota 1.x db_schema-x and 
    db_schema_patch-x sql files, rename them to have the prefix `s1_` in front of their name. **Any tables that are not part
    of the Symbiota2 schema or have the `s1_` prefix in their table name, will be deleted in the next step in upgrading the
    database.**
- Once the above steps have been completed successfully, follow the steps outlined 
    in [setting up the Symbiota2 database](./setup_symbiota2_database.html) to complete the process of upgrading a Symbiota 1.x database.
### [Back to index](./index.html)
