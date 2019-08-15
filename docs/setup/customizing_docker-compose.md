---
layout: default
---

### [Back to index](../index.html)

# Customizing the docker-compose file

The docker-compose.yml file can be customized to contain only the Docker containers that you wish to use for your 
Symbiota2 installation. For instance, if you intend to use the mysql container to provide the DBMS service to your Symbiota2 application
and know you will not wish to use the other DBMS service containers, you can delete the mariadb and postgres containers
from this file. The only two containers that either must be maintained or deleted together are the nginx and php containers,
which require each other. Reducing the amount of containers that are created and run in Docker improves the overall performance 
of your Symbiota2 installation by reducing CPU usage.

To remove containers from your docker-compose.yml file, simply edit the file and delete the container clocks from the file.
Be careful to preserve the indenting of the containers that remain in the file.

### [Back to index](../index.html)
