---
layout: default
---

### [Back to index](./index.html)

# Creating a link outlet hook

**NOTE: If you are not planning on including new links for link outlets in the frontend elements of your plugin, skip this page.**

To create a link outlet hook so that a link appears within a specific link outlet, follow these steps:
- If it does not already exist, add the `link_hooks` property to your plugin config file and assign it an empty array value.
- Add the following object to the `link_hooks` property array (replacing `<link-outlet-name>` with the name of the 
  link outlet you would like to hook into, `<link-path>` with the path the link should direct to, and `<link_text>` with 
  the text that should appear on the link):
  ```
  {
      "outlet": "<link-outlet-name>",
      "link_path": "<link-path>",
      "link_text": "<link-text>"
  }
  ```
- After following the above steps the `config.json` file should resemble the following:
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
          "link_text": "Follow this link"
        }
      ]
    }
    ```

### [Back to index](./index.html)
