---
layout: default
---

### [Back to index](./index.html)

# Assigning a unique route to a component

**NOTE: If you are not planning on including new components in the frontend elements of your plugin, go back to the 
index and skip the section on adding components to the frontend.**

**Before proceeding, be sure to have [created the frontend component](./creating-frontend-component.html).**

To assign a unique route to a component, follow these steps:
- If it does not already exist, add the `ui_routes` property to your plugin config file and assign it an empty array value.
- Add the following object to the `ui_routes` property array (replacing `<plugin-name>` with the name of your 
  plugin, `<component-path>` with the unique path you want for your component, and `<component-name>` with the component 
  name in kebab case):
  ```
  {
      "path": "<plugin-name>/<component-path>",
      "provider": "<component-name>"
  }
  ```
- After following the above steps, for a component named `example`, the `config.json` file should resemble the following:
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
      "api_namespace": "ExamplePlugin",
      "ui_filename": "example-plugin.umd.js",
      "ui_module_name": "ExamplePluginModule",
      "ui_routes": [
        {
          "path": "examplecomponent",
          "provider": "example-component"
        }
      ]
    }
    ```

### [Back to index](./index.html)
