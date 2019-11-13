---
layout: default
---

### [Back to index](./index.html)

# i18n internationalization support setup

**NOTE: If you are not planning on providing i18n internationalization support with your plugin, skip this page.**

**Before proceeding, be sure to have [setup your plugin to add frontend elements](./frontend-initial-setup.html).**

To setup i18n internationalization support for your plugin, follow these steps:
- Create a directory named `i18n` in the root directory of your plugin. This directory will store all of the i18n translation 
  files associated with your plugin.
- If you are going to be offering support for languages other than English, Arabic, Chinese, Farsi, French, German, Hindi, 
  Italian, Japanese, Portuguese, Russian, Spanish, or Urdu (which are the languages supported by default by the core Symbiota2 
  application and its associated optional plugins), you will have to initialize the main i18n translation files in your Symbiota2
  installation for the additional languages. For each additional language, follow these steps:
  - Determine the [ISO 639-1 code for the language](https://www.loc.gov/standards/iso639-2/php/code_list.php){:target="_blank"}.
  - **If you are using a Mac or Linux machine** run the following from the root directory of your Symbiota2 installation 
    (replacing `<iso-639-1-code>` with the ISO 639-1 code for the language and adjusting for the correct paths to the `src` and 
    `i18n` directories of your plugin):
    ```shell
    ngx-translate-extract --input ./path/to/plugin/src --output ./path/to/plugin/i18n/<iso-639-1-code>.json --sort
    ```
  - **If you are using a Windows machine** run the following from the root directory of your Symbiota2 installation 
    (replacing `<iso-639-1-code>` with the ISO 639-1 code for the language and adjusting for the correct paths to the `src` and 
    `i18n` directories of your plugin):
    ```shell
    ngx-translate-extract --input .\\path\\to\\plugin\\src --output .\\path\\to\\plugin\\i18n\\<iso-639-1-code>.json --sort
    ```

### [Back to index](./index.html)
