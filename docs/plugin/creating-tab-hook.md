---
layout: default
---

### [Back to index](./index.html)

# Creating a tab outlet hook for a component

**NOTE: If you are not planning on including new components in the frontend elements of your plugin, go back to the 
index and skip the section on adding components to the frontend.**

**Before proceeding, be sure to have [created the frontend component](./creating-frontend-component.html).**

**Note: if you are going to be offering i18n internationalization support, all translation keys used withing your plugin must 
  have a prefix of the plugin name in order to ensure uniqueness.**

To create a tab outlet hook for a component so it appears within a specific outlet, follow these steps:
- If it does not already exist, add the `tab_hooks` property to your plugin config file and assign it an empty array value.
- **If you are going to be offering i18n internationalization support** add the following object to the `tab_hooks` property 
  array (replacing `<tab-outlet-name>` with the name of the tab outlet you would like to hook into, `<tab-text-translation-key>` with 
  the i18n translation key for the text you would like to appear on the tab, `<index-value>` with the numerical sort order 
  index you would like your component to have within the outlet, and `<component-name>` with the component name in kebab case):
  ```
  {
      "outlet": "<tab-outlet-name>",
      "tab_text_translation_key": "<tab-text-translation-key>",
      "index": <index-value>,
      "provider": "<component-name>"
  }
  ```
- **If you are not going to be offering i18n internationalization support** add the following object to the `tab_hooks` property 
  array (replacing `<tab-outlet-name>` with the name of the tab outlet you would like to hook into, `<tab-text>` with the 
  text you would like to appear on the tab, `<index-value>` with the numerical sort order index you would like your component 
  to have within the outlet, and `<component-name>` with the component name in kebab case):
  ```
  {
      "outlet": "<tab-outlet-name>",
      "tab_text": "<tab-text>",
      "index": <index-value>,
      "provider": "<component-name>"
  }
  ```
- After following the above steps, **if you are offering i18n internationalization support**, for a component named `example`, 
  the `config.json` file should resemble the following:
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
      "tab_hooks": [
        {
          "outlet": "example-plugin-tab-outlet",
          "tab_text_translation_key": "example-plugin.example-component.tab-text",
          "index": 5,
          "provider": "example-component"
        }
      ]
    }
    ```
- After following the above steps, **if you are not offering i18n internationalization support**, for a component named `example`, 
    the `config.json` file should resemble the following:
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
      "tab_hooks": [
        {
          "outlet": "example-plugin-tab-outlet",
          "tab_text": "Example Component Tab",
          "index": 5,
          "provider": "example-component"
        }
      ]
    }
    ```

### [Back to index](./index.html)
