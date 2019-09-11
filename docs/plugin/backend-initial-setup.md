---
layout: default
---

### [Back to index](./index.html)

# Initial setup to add backend elements

**NOTE: If you are not planning on including backend elements in your plugin, go back to the index and skip the section 
on adding backend elements.**

**Before proceeding, be sure to have [setup your plugin config file](./initial-config-file-setup.html).**

To setup your project to add backend elements, follow these steps:
- Create a new directory in the root directory of your plugin project and name it `api`. This directory will serve as the 
  root directory for the backend elements of your plugin project.
- Add the `api_namespace` property to your plugin config file.
- Determine a namespace to use with the backend classes of your plugin. Note that the namespace must be unique and it is 
  strongly suggested to use a variation of the plugin name. The namespace should also be in pascal case. This namespace 
  will serve as the base namespace for all backend classes within this plugin.
- Assign the value of the `api_namespace` property to the namespace you have chosen.
- The `config.json` file should resemble the following after these steps have been completed:
    ```json
    {
      "name": "example-plugin",
      "title": "Example Plugin",
      "version": "0.0.1",
      "description": "An example plugin.",
      "dependencies": [
        "dependency1",
        "dependency2"
      ],
      "api_namespace": "ExamplePlugin"
    }
    ```
- The root folder for the plugin project within the `plugins` folder of the Symbiota2 installation should have a 
    structure resembling the following after these steps have been completed:
    ```
    plugins
    │   ...
    └───example-plugin
    │   │   config.json
    │   └───api
    │   
    │   ...
    ```

### [Back to index](./index.html)
