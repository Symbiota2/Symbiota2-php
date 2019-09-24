---
layout: default
---

### [Back to index](./index.html)

# Creating a link outlet hook

**NOTE: If you are not planning on including new links for link outlets in the frontend elements of your plugin, skip this page.**

**Note: if you are going to be offering i18n internationalization support, all translation keys used withing your plugin must 
  have a prefix of the plugin name in order to ensure uniqueness.**

To create a link outlet hook so that a link appears within a specific link outlet, follow these steps:
- If it does not already exist, add the `link_hooks` property to your plugin config file and assign it an empty array value.
- **If you are going to be offering i18n internationalization support** add the following object to the `link_hooks` property 
  array (replacing `<link-outlet-name>` with the name of the link outlet you would like to hook into, `<link-path>` with 
  the path the link should direct to, `<link-text-translation-key>` with the i18n translation key for the text you would 
  like to appear on the link, and `<link-index>` with the numeric sort order value that should be assigned to the link within 
  the outlet):
  ```
  {
      "outlet": "<link-outlet-name>",
      "link_path": "<link-path>",
      "link_text_translation_key": "<link-text-translation-key>",
      "index": "<link-index>"
  }
  ```
- **If you are not going to be offering i18n internationalization support** add the following object to the `link_hooks` property 
  array (replacing `<link-outlet-name>` with the name of the link outlet you would like to hook into, `<link-path>` with 
  the path the link should direct to, `<link_text>` with the text that should appear on the link, and `<link-index>` with 
  the numeric sort order value that should be assigned to the link within the outlet):
  ```
  {
      "outlet": "<link-outlet-name>",
      "link_path": "<link-path>",
      "link_text": "<link-text>",
      "index": "<link-index>"
  }
  ```
- After following the above steps, **if you are offering i18n internationalization support**, the `config.json` file should 
  resemble the following:
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
      "link_hooks": [
        {
          "outlet": "example-plugin-link-outlet",
          "link_path": "path/where/i/want/the/link/to/go",
          "link_text_translation_key": "example-plugin.example-link-text",
          "index": 5
        }
      ]
    }
    ```
- After following the above steps, **if you are not offering i18n internationalization support**, the `config.json` file 
  should resemble the following:
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
      "link_hooks": [
        {
          "outlet": "example-plugin-link-outlet",
          "link_path": "path/where/i/want/the/link/to/go",
          "link_text": "Follow this link",
          "index": 5
        }
      ]
    }
    ```

### [Back to index](./index.html)
