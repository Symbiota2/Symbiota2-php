---
layout: default
---

### [Back to index](./index.html)

# Composer scripts for managing plugins

Within a Symbiota2 installation there are several files that, once installed, are maintained locally and not included in
code updates. These files are are maintained in such a way so that they can be uniquely configured for a Symbiota2 
installation without worry that configurations will be lost in future code updates. Periodically these files need to be
updated however. Several Composer scripts are included with Symbiota2 that automate the process of updating these files 
and creating a backup copy so that any modifications that have been made to them will be preserved and able to be merged 
back into the updated file. All of the Composer scripts are defined in the `composer.json` file in the root directory of your 
Symbiota2 installation.

**To run any of the Composer scripts, simply type `composer run-script` followed by the script.**

The following list of scripts are available for backing up and updating locally maintained files:

- `update-angular-json`

  Creates a backup copy of the `angular.json` file (`angular.json.bak`) and then updates the file to the most recent version.

- `update-api_platform-yaml`

  Creates a backup copy of the `config/packages/api_platform.yaml` file (`config/packages/api_platform.yaml.bak`) and then 
  updates the file to the most recent version.

- `update-docker-compose-yml`

  Creates a backup copy of the `docker-compose.yml` file (`docker-compose.yml.bak`) and then updates the file to the most 
  recent version.

- `update-doctrine-yaml`

  Creates a backup copy of the `config/packages/doctrine.yaml` file (`config/packages/doctrine.yaml.bak`) and then updates 
  the file to the most recent version.

- `update-package-json`

  Creates a backup copy of the `package.json` file (`package.json.bak`) and then updates the file to the most recent version.

- `update-plugin-composer-json`

  Creates a backup copy of the `plugin-composer.json` file (`plugin-composer.json.bak`) and then updates the file to the most 
  recent version.

- `update-plugin-config-json`

  Creates a backup copy of the `config/plugin-config.json` file (`config/plugin-config.json.bak`) and then updates the file 
  to the most recent version.

- `update-tsconfig-json`

  Creates a backup copy of the `tsconfig.json` file (`tsconfig.json.bak`) and then updates the file to the most recent version.

- `update-all-files`

  Automates the process of running `update-angular-json`, `update-api_platform-yaml`, `update-doctrine-yaml`, `update-package-json`, 
    `update-plugin-composer-json`, `update-plugin-config-json`, and `update-tsconfig-json` in succession.

### [Back to index](./index.html)
