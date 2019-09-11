---
layout: default
---

### [Back to index](./index.html)

# Creating a component outlet hook for a component

**NOTE: If you are not planning on including new components in the frontend elements of your plugin, go back to the 
index and skip the section on adding components to the frontend.**

**Before proceeding, be sure to have [created the frontend component](./creating-frontend-component.html).**

To create a component outlet hook for a component so it appears within a specific outlet, follow these steps:
- If it does not already exist, add the `component_hooks` property to your plugin config file and assign it an empty array value.
- Add the following object to the `component_hooks` property array (replacing `<component-outlet-name>` with the name of the 
  component outlet you would like to hook into, `<index-value>` with the numerical sort order index you would like your 
  component to have within the outlet, and `<component-name>` with the component name in kebab case):
  ```
  {
      "outlet": "<component-outlet-name>",
      "index": <index-value>,
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
      "component_hooks": [
        {
          "outlet": "example-plugin-component-outlet",
          "index": 5,
          "provider": "example-component"
        }
      ]
    }
    ```

### [Back to index](./index.html)
