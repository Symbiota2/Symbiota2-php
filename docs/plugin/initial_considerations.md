---
layout: default
---

### [Back to index](./index.html)

# Initial considerations

It is good to take a moment to consider some of the important aspects of your Symbiota2 plugin before 
beginning the actual work of creating it. Having a basic idea of the general architecture of your plugin
prior to writing any code can save time in the development process and help avoid making mistakes. Some 
important items to consider include:

- **Selecting a name for your plugin** - 
    Every Symbiota2 plugin needs to have a name that is unique in order to identify it uniquely within 
    the software. The name must be unique to all of the plugins listed in the [plugin registry](https://github.com/Symbiota2/Symbiota2/blob/master/plugin-registry.json)
    and to all additional plugins that are installed within a Symbiota2 portal. Plugin names cannot not 
    contain spaces and it is suggested to use all lower-case letters. Additionally, plugins cannot start
    with the prefix `symbiota-` or be named `core`, which are reserved for core Symbiota2 plugins. To ensure that your plugin name will
    be unique, it is suggested to use a developer-specific or project-specific prefix with your plugin name,
    such as "my_name-plugin_name". Review the [plugin registry documentation](./plugin_registry.html)
    for further information regarding the registry.

- **Dependencies required by your plugin** - 
    If your plugin is going to rely on other Symbiota2 plugins in order to operate as intended, you must
    identify those plugins as dependencies for your plugin. This does not include the Symbiota2 core plugins,
    which are included as part of the core Symbiota2 application. Any other plugin that is utilized by your plugin,
    either through utilizing API endpoints in the backend, or services or components in the frontend, must be defined
    as a dependency. Dependencies are defined within the [plugin config file](./plugin_config.html).

- **Backend elements of your plugin** - 
    If your plugin is going to include backend elements, including additions to the data schema, it is good to
    consider the architecture of these elements and how they will integrate within the greater Symbiota2
    architecture. Symbiota2 uses the [API Platform Framework](https://api-platform.com/){:target="_blank"}, which utilizes 
    the [Symfony Framework](https://symfony.com/doc/current/index.html){:target="_blank"}, in its backend. So all backend 
    elements must adhere to both of those frameworks.

- **Frontend elements of your plugin** - 
    If your plugin is going to include frontend elements, it is good to consider the architecture of these elements 
    as well and how they will integrate within the greater Symbiota2 architecture. Symbiota2 uses the [Angular Framework](https://angular.io/){:target="_blank"},
    in its frontend, so all frontend elements must adhere to this frameworks. 
    
### [Back to index](./index.html)
