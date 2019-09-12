---
layout: default
---

### [Back to index](./index.html)

# docker-compose documentation

Symbiota2 includes a docker-compose file that builds Docker containers for all of the required server stack components for
using Symbiota2. The following table lists each of the Docker containers and explains the services that the container 
provides:
* * *

| Name      | Description                                                   | Port  |
|:----------|:--------------------------------------------------------------|:------|
| nginx     | Provides the nginx server (requires php container)            | 80    |
| php       | Provides the php-fpm service (requires nginx container)       |       |
| openssl   | Provides the openssl service to create the pem security keys  |       |
| mysql     | Provides the MySQL DBMS service                               | 3308  |
| mariadb   | Provides the MariaDB DBMS service                             | 3310  |
| postgres  | Provides the Postgres DBMS service with PostGIS installed     | 5434  |
| jekyll    | Provides the Jekyll service to host documentation site        | 4000  |
| adminer   | Provides the Adminer service for DBMS management              | 8080  |
| elk       | **Future development** Will provide ElasticSearch service     |       |

* * *

- nginx container:
  - **Requires:** php container
  - **Mounted directory:** Mounted to root directory of Symbiota2 installation
  - **Container url:** [http://localhost/](http://localhost/){:target="_blank"}

- php container:
  - **Requires:** nginx container
  - **Mounted directory:** Mounted to root directory of Symbiota2 installation

- openssl container:
  - **Mounted directory:** Mounted to root directory of Symbiota2 installation

- mysql container:
  - **Mounted directory:** Data directory mounted to /data/mysql of Symbiota2 installation
  - To connect to this container from a database management application on the host machine:
    - **host:** localhost:3308
    - **username:** root
    - **password:** password

- mariadb container:
  - **Mounted directory:** Data directory mounted to /data/mariadb of Symbiota2 installation
  - To connect to this container from a database management application on the host machine:
    - **host:** localhost:3310
    - **username:** root
    - **password:** password

- postgres container:
  - **Mounted directory:** Data directory mounted to /data/postgres of Symbiota2 installation
  - To connect to this container from a database management application on the host machine:
    - **host:** localhost:5434
    - **username:** postgres
    - **password:** password

- jekyll container:
  - **Mounted directory:** Mounted to /docs directory of Symbiota2 installation
  - **Container url:** [http://0.0.0.0:4000/](http://0.0.0.0:4000/)

- adminer container:
  - **Container url:** [http://localhost:8080/](http://localhost:8080/)

* * *

**Helpful docker-compose commands (on Linux machines run with `sudo`)**
- To start all Docker containers in logging mode:
    `docker-compose up`
- To start all Docker containers in detached (non-logging) mode:
    `docker-compose up -d`
- To log into a running container:
    `docker-compose exec <container-name> bash`
- To shut down all Docker containers:
    `docker-compose down`

### [Back to index](./index.html)
