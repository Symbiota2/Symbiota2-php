---
layout: default
---

### [Back to index](./index.html)

# Add npm build scripts to the package.json file

**Before proceeding, be sure to have [setup your plugin to add frontend components](./frontend-initial-setup.html).**

To add npm build scripts for your plugin to the package.json file, follow these steps:
- **If you are using a Mac or Linux machine:**
  - Edit the `package.json` file in the root folder of your Symbiota2 installation by adding the following lines after the last line 
    in the `scripts` property (replacing `<plugin-name>` with the name of your plugin):
    ```json
    "build_<plugin-name>": "ng build <plugin-name>",
    "npm_pack_<plugin-name>": "cd dist/<plugin-name> && npm pack",
    "move_<plugin-name>": "cp ./dist/<plugin-name>/bundles/<plugin-name>.umd.js ./src/ui/assets/js/plugins/",
    "package_<plugin-name>": "npm run build_<plugin-name> && npm run npm_pack_<plugin-name> && npm run move_<plugin-name>"
    ```
- **If you are using a Windows machine:**
  - Edit the `package.json` file in the root folder of your Symbiota2 installation by adding the following lines after the last line 
    in the `scripts` property (replacing `<plugin-name>` with the name of your plugin):
    ```json
    "build_<plugin-name>": "ng build <plugin-name>",
    "npm_pack_<plugin-name>": "cd dist/<plugin-name> && npm pack",
    "move_<plugin-name>": "copy .\\dist\\<plugin-name>\\bundles\\<plugin-name>.umd.js .\\src\\ui\\assets\\js\\plugins\\",
    "package_<plugin-name>": "npm run build_<plugin-name> && npm run npm_pack_<plugin-name> && npm run move_<plugin-name>"
    ```
- The `package.json` file in the root folder of your Symbiota2 installation should resemble the following after these 
  steps have been completed (with `...` representing omitted lines):
    ```json
    {
      "name": "symbiota2",
      "version": "0.0.1",
      "scripts": {
        ...
        "postinstall" : "npm run package_core_plugins && npm run package_optional_plugins",
        "build_example-plugin": "ng build example-plugin",
        "npm_pack_example-plugin": "cd dist/example-plugin && npm pack",
        "move_example-plugin": "cp ./dist/example-plugin/bundles/example-plugin.umd.js ./src/ui/assets/js/plugins/",
        "package_example-plugin": "npm run build_example-plugin && npm run npm_pack_example-plugin && npm run move_example-plugin"
      },
      "private": true,
      "dependencies": {
        ...
      },
      "devDependencies": {
        ...
      }
    }
    ```

- After adding these scripts to the `package.json` file, you can build your plugin and install (or update) it in your main
Symbiota2 application by running the following command (replacing `<plugin-name>` with the name of your plugin):
```shell
npm run package_<plugin-name>
```

### [Back to index](./index.html)
