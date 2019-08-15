---
layout: default
---

### [Back to index](../index.html)

# Configuration considerations

Symbiota2 requires a complete server stack of software to be installed and configured in order to be accessible 
through a client application, such as a browser. This server stack can be installed on a single machine, 
multiple networked machines, or a network of Docker containers. For development purposes, most will
want to either install the server stack on a single machine, or on a network of Docker containers.
Symbiota2 comes with a docker-compose file that automates the installation of the complete server 
stack in a network of Docker containers. This docker-compose file can be customized however, to also allow
for the integration of server stack applications being installed directly on the local machine.
This allows for a few different scenarios to be employed in installing and configuring the server
stack for Symbiota2 to be run on a local machine:

- **Installation of the complete server stack in Docker containers** - 
    This is likely the easiest scenario to setup for those that do not currently have a server
    stack already installed on their local machine. The docker-compose file that comes with Symbiota2
    makes the setup process nearly automated through terminal commands. Performance of the server stack
    running through Docker, specifically the php engine, can be significantly slow however.

- **Installation of some server stack components on the local machine and others in Docker containers** - 
    This is a more complex scenario to setup, but can result in better performance, especially if 
    the server (Apache or nginx) and php components are installed locally whcih are usually the 
    sources of performance issues in the complete Docker setup. While the setup of this scenario
    does require applications to be configured on the local machine, there are several [server stack
    software packages that can automate this process](/setup/server_stack_packages.html).
    
- **Installation of the complete server stack on the local machine** - 
    This could be the most complicated scenario to setup, but could offer the best performance overall.
    As already noted, [there are several server stack software packages that can nearly automate the setup 
    process](/setup/server_stack_packages.html), relieving much of the complication in the configuration.

### [Back to index](../index.html)
