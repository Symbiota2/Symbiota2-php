---
layout: default
---

### [Back to index](./index.html)

# Initial config file setup

**Before proceeding, be sure to have [setup your plugin project](./plugin_project_setup.html).**

To setup an initial config file for your plugin project, follow these steps:
- Create a new file in the root directory of your plugin project and name it `config.json`
- Copy and paste the following into the `config.json` file:
    ```json
    {
      "name": "",
      "title": "",
      "version": "0.0.1",
      "description": "",
      "dependencies": []
    }
    ```
- Assign the value of the `name` property to the name of your plugin.
- Assign the value of the `title` property to the title which you would like your plugin referred to in user interfaces.
- Assign the value of the `description` property to a brief description of your plugin (Note: this is not required).
- If your plugin is going to have dependencies, add each dependency name as a string value to the `dependencies` array.
- If further dependencies arise through the process of development, add their names to this array as they arise.
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
      ]
    }
    ```

### [Back to index](./index.html)
