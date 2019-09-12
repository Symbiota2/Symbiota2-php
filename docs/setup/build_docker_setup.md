---
layout: default
---

### [Back to index](./index.html)

# Build Docker containers

The initial launch of the containers included in the docker-compose file will take longer to complete as all 
of the packages will have to be downloaded, installed, and the container images built. Once all of these initial
steps are complete, further launches are completed much faster. To perform the initial launch of the Docker 
containers, follow the following steps:

- **If you are using a Linux machine, and the nginx and php containers for your server, make sure that Apache is disabled
  and port 80 is open.**
- Start all of the Docker containers in detached (non-logging) mode (on Linux machines run with `sudo`):
    
    `docker-compose up -d`
    
- Wait for all of the container images to be built and started.
- Once all of the containers are ready, if you are using the nginx and php containers for your server, log into the 
    php container (on Linux machines run with `sudo`):
    
    `docker-compose exec php bash`
    
    **Note - once you are done working in the terminal, exit the php container by typing:** `exit`

### [Back to index](./index.html)
