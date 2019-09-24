---
layout: default
---

### [Back to index](./index.html)

# Add npm scripts to the package.json file

**Before proceeding, be sure to have [setup your plugin to add frontend elements](./frontend-initial-setup.html).**

To add npm build scripts for your plugin to the package.json file, follow these steps:
- **If you are using a Mac or Linux machine:**
  - Edit the `package.json` file in the root folder of your Symbiota2 installation by adding the following lines after the last line 
    in the `scripts` property (replacing `<plugin-name>` with the name of your plugin):
    ```json
    "build_<plugin-name>": "ng build <plugin-name>",
    "npm_pack_<plugin-name>": "cd dist/<plugin-name> && npm pack",
    "move_<plugin-name>": "cp ./dist/<plugin-name>/bundles/<plugin-name>.umd.js ./src/ui/assets/js/plugins/"
    ```
- **If you are using a Windows machine:**
  - Edit the `package.json` file in the root folder of your Symbiota2 installation by adding the following lines after the last line 
    in the `scripts` property (replacing `<plugin-name>` with the name of your plugin):
    ```json
    "build_<plugin-name>": "ng build <plugin-name>",
    "npm_pack_<plugin-name>": "cd dist/<plugin-name> && npm pack",
    "move_<plugin-name>": "copy .\\dist\\<plugin-name>\\bundles\\<plugin-name>.umd.js .\\src\\ui\\assets\\js\\plugins\\"
    ```
- **If you are going to be offering i18n internationalization support:**
  - Determine the [ISO 639-1 codes for all of the languages you will support (must support English)](https://www.loc.gov/standards/iso639-2/php/code_list.php){:target="_blank"}
  - For each language, add the following line (using the appropriate operating system format) after the lines added in the 
    previous steps (replacing `<plugin-name>` with the name of your plugin and replacing `<iso-639-1-code>` with the ISO 639-1 
    code for the language):
    - **If you are using a Mac or Linux machine:**
      ```json
      "merge-<plugin-name>-<iso-639-1-code>-translations": "json-merger --output src/ui/assets/i18n/<iso-639-1-code>.json --pretty plugins/<plugin-name>/i18n/<iso-639-1-code>.json src/ui/assets/i18n/<iso-639-1-code>.json"
      ```
    - **If you are using a Windows machine:**
      ```json
      "merge-<plugin-name>-<iso-639-1-code>-translations": "json-merger --output src\\ui\\assets\\i18n\\<iso-639-1-code>.json --pretty plugins\\<plugin-name>\\i18n\\<iso-639-1-code>.json src\\ui\\assets\\i18n\\<iso-639-1-code>.json"
      ```
  - Add the following line to automate the execution of all of the merge scripts added in the previous step replacing `<plugin-name>` with 
    the name of your plugin and replacing `<merge-script-calls>` with calls to each of the merge scripts created in the 
    previous step in the format `npm run <script>` (with `<script>` being the script) separated by a double ampersand surrounded 
    by spaces:
    ```json
    "merge-<plugin-name>-all-translations": "<merge-script-calls>"
    ```
  - Add the following line (using the appropriate operating system format) after the line added in the previous step:
    - **If you are using a Mac or Linux machine, use the following format replacing `<plugin-name>` with the name of your 
      plugin and replacing `<language-iso-639-1-codes>` with the ISO 639-1 codes of each of the languages you will support 
      separated by a comma:**
      ```json
      "extract-<plugin-name>-translations": "ngx-translate-extract --input ./plugins/<plugin-name> --output ./plugins/<plugin-name>/i18n/{<language-iso-639-1-codes>}.json --sort"
      ```
    - **If you are using a Windows machine, use the following format replacing `<plugin-name>` with the name of your 
      plugin and replacing `<language-file-references>` with references to the translation files for each of the languages
      for which you will offering support in the format `.\\plugins\\<plugin-name>\\i18n\\<iso-639-1-code>.json` (with `<plugin-name>` being 
      the name of your plugin and `<iso-639-1-code>` being the ISO 639-1 code for the language) separated by a space:**
      ```json
      "extract-<plugin-name>-translations": "ngx-translate-extract --input .\\plugins\\<plugin-name> --output <language-file-references> --sort"
      ```
- Add a final package script to automate the execution the other scripts added after the line added in the previous step:
  - **If you are going to be offering i18n internationalization support:**
    ```json
    "package_<plugin-name>": "npm run build_<plugin-name> && npm run npm_pack_<plugin-name> && npm run move_<plugin-name> && npm run merge-<plugin-name>-all-translations"
    ```
  - **If you are not going to be offering i18n internationalization support:**
    ```json
    "package_<plugin-name>": "npm run build_<plugin-name> && npm run npm_pack_<plugin-name> && npm run move_<plugin-name>"
    ```
- After following the above steps, for a plugin offering i18n internationalization support for English, Spanish, and Portuguese, 
  the `package.json` file in the root folder of your Symbiota2 installation should resemble the following on a Mac or Linux machine 
  (with `...` representing omitted lines):
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
        "merge-example-plugin-en-translations": "json-merger --output src/ui/assets/i18n/en.json --pretty plugins/example-plugin/i18n/en.json src/ui/assets/i18n/en.json",
        "merge-example-plugin-es-translations": "json-merger --output src/ui/assets/i18n/es.json --pretty plugins/example-plugin/i18n/es.json src/ui/assets/i18n/es.json",
        "merge-example-plugin-pt-translations": "json-merger --output src/ui/assets/i18n/pt.json --pretty plugins/example-plugin/i18n/pt.json src/ui/assets/i18n/pt.json",
        "merge-example-plugin-all-translations": "npm run merge-example-plugin-en-translations && npm run merge-example-plugin-es-translations && npm run merge-example-plugin-pt-translations",
        "extract-example-plugin-translations": "ngx-translate-extract --input ./plugins/example-plugin --output ./plugins/example-plugin/i18n/{en,es,pt}.json --sort",
        "package_example-plugin": "npm run build_example-plugin && npm run npm_pack_example-plugin && npm run move_example-plugin && npm run merge-example-plugin-all-translations"
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
- After following the above steps, for a plugin offering i18n internationalization support for English, Spanish, and Portuguese, 
  the `package.json` file in the root folder of your Symbiota2 installation should resemble the following on a Windows machine 
  (with `...` representing omitted lines):
    ```json
    {
      "name": "symbiota2",
      "version": "0.0.1",
      "scripts": {
        ...
        "postinstall" : "npm run package_core_plugins && npm run package_optional_plugins",
        "build_example-plugin": "ng build example-plugin",
        "npm_pack_example-plugin": "cd dist/example-plugin && npm pack",
        "move_example-plugin": "copy .\\dist\\example-plugin\\bundles\\example-plugin.umd.js .\\src\\ui\\assets\\js\\plugins\\",
        "merge-example-plugin-en-translations": "json-merger --output src\\ui\\assets\\i18n\\en.json --pretty plugins\\example-plugin\\i18n\\en.json src\\ui\\assets\\i18n\\en.json",
        "merge-example-plugin-es-translations": "json-merger --output src\\ui\\assets\\i18n\\es.json --pretty plugins\\example-plugin\\i18n\\es.json src\\ui\\assets\\i18n\\es.json",
        "merge-example-plugin-pt-translations": "json-merger --output src\\ui\\assets\\i18n\\pt.json --pretty plugins\\example-plugin\\i18n\\pt.json src\\ui\\assets\\i18n\\pt.json",
        "merge-example-plugin-all-translations": "npm run merge-example-plugin-en-translations && npm run merge-example-plugin-es-translations && npm run merge-example-plugin-pt-translations",
        "extract-example-plugin-translations": "ngx-translate-extract --input .\\plugins\\example-plugin --output .\\plugins\\example-plugin\\i18n\\en.json .\\plugins\\example-plugin\\i18n\\es.json .\\plugins\\example-plugin\\i18n\\pt.json --sort",
        "package_example-plugin": "npm run build_example-plugin && npm run npm_pack_example-plugin && npm run move_example-plugin && npm run merge-example-plugin-all-translations"
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
