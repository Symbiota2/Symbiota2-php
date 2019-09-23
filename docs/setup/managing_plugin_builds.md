---
layout: default
---

### [Back to index](./index.html)

# npm scripts for managing plugins

Despite several plugins being included with Symbiota2, the compiled frontend code for each plugin (for those that include
frontend portions) however, is not included and therefore needs to be managed locally within each Symbiota2 installation.
Several npm scripts are included with Symbiota2 that automate the process of plugin build management to managing all 
included plugins from simply one script, but each of the npm scripts can be run individually to isolate specific steps in
the build process or run subsets of processes. All of the npm scripts are defined in the `package.json` file in the root
directory of your Symbiota2 installation.

**To run any of the npm scripts, simply type `npm run` followed by the script.**

* * *
The following list of scripts are available for each of the optional plugins included in Symbiota2 (replacing `<plugin-name>` with 
the name of the target plugin):

- `build_<plugin-name>`

  Initiates an Angular build process on the plugin which compiles the Typescript files and saves the compiled files in
  the plugin's subdirectory within the `dist` directory.

- `npm_pack_<plugin-name>`

  Initiates an npm pack process on the compiled plugin files which packages the files into an installable tarball file and
  then saves the tarball file within the plugin's subdirectory within the `dist` directory.

- `move_<plugin-name>`

  Copies the plugin's compiled umd file to the public plugin directory of the Symbiota2 installation (`src/ui/assets/js/plugins`).
  **Note: this script utilizes the run-script-os library and has operating system specific variations which are automatically
  selected when the script is run.**

- `merge-<plugin-name>-all-translations`

  Runs all of the separate merge scripts for each of the i18n translation files included with the plugin, which merge translation
  changes with the main i18n translation files for the Symbiota2 installation.

- `package_<plugin-name>`

  Automates the process of running `build_<plugin-name>`, `npm_pack_<plugin-name>`, `move_<plugin-name>`, and 
  `merge-<plugin-name>-all-translations` in succession.

* * *
The following list of scripts are available for each of the core plugins included in Symbiota2 (replacing `<plugin-name>` with 
the name of the target plugin):

- `build_<plugin-name>`

  Initiates an Angular build process on the plugin which compiles the Typescript files and saves the compiled files in
  the plugin's subdirectory within the `dist` directory.

- `npm_pack_<plugin-name>`

  Initiates an npm pack process on the compiled plugin files which packages the files into an installable tarball file and
  then saves the tarball file also within the plugin's subdirectory within the `dist` directory.

- `install_<plugin-name>`

  Installs (or re-installs) the plugin within the main Symbiota2 installation.

- `package_<plugin-name>`

  Automates the process of running `build_<plugin-name>`, `npm_pack_<plugin-name>`, and `install_<plugin-name>` in succession.

* * *
The following list of scripts are available for working with all of the plugins, or the core or optional plugins as a group:

- `set-core-all-translations`

  Sets (or resets) the main i18n translation files for the Symbiota2 installation and populates them with the i18n translation 
  files included with the core frontend application and all of the core plugins.

- `merge-core-all-translations`

  Runs all of the separate merge scripts for each of the i18n translation files included with the core frontend application 
  and all of the core plugins, which merge translation changes with the main i18n translation files for the Symbiota2 
  installation.

- `package_all_plugins`

  Automates the process of running `package_<plugin-name>` for all plugins, both core and optional, and then running `merge-core-all-translations` in
  succession.

- `package_optional_plugins`

  Automates the process of running `package_<plugin-name>` for all optional plugins.

- `package_core_plugins`

  Automates the process of running `package_<plugin-name>` for all core plugins, and then running `merge-core-all-translations` in
  succession.

* * *
The `set-core-all-translations` and `package_all_plugins` scripts are also automated to run in succession as postinstall
processes after `npm install` is run.

* * *

### [Back to index](./index.html)
