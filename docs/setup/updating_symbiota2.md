---
layout: default
---

### [Back to index](./index.html)

# Updating Symbiota2

It is good to keep your Symbiota2 installation up to date with the latest code improvements and additions. Updating a Symbiota2 
installation is always started by running the following from the root folder of your installation:
- `git pull`
- `composer install`

* * *
In situations when no changes have been made to the locally maintained Symbiota2 files (other than the `.env` and `docker-compose.yml` files), 
it is best to also run the following to ensure locally maintained files are also updated: 
- `composer run-script update-all-files`
- `npm install`

* * *
In situations when changes have been made to the locally maintained Symbiota2 files, or plugins have been created within 
the installation, additional steps may need to be taken when updating a Symbiota2 installation to ensure that both locally 
maintained files are updated and file changes specific to your Symbiota2 installation, whether from editing the code 
or creating new plugins, are preserved. [Follow this link for a full explanation of the Composer scripts included in 
Symbiota2 for managing locally maintained files.](./plugin_composer_scripts.html) The Symbiota2 templates for the locally 
maintained files are located within the same directory as the locally maintained file and have the same filename, but with 
a file type of `.dist`.

When plugins are created within a Symbiota2 installation, the `angular.json` and `tsconfig.json` locally maintained files 
will likely be edited during the process of creating the plugin. In situations when file changes have occurred through creating a 
plugin, or other changes have been made to the locally maintained Symbiota2 files, the corresponding Symbiota2 template for the 
edited file can be referenced to determine if updating the local file is necessary. Either scan the GitHub log to see 
if the corresponding template(s) of the edited file(s) are included in the update, or visually compare each edited file 
to its corresponding Symbiota2 template for changes. If the locally edited Symbiota2 file(s) need to be updated, follow these 
steps for each file:
- [Locate and run the update Composer script associated with the locally maintained Symbiota2 file.](./plugin_composer_scripts.html)
- During the update process, a backup file is created for the locally maintained Symbiota2 file, adding it to the same directory 
  as the locally maintained file and having the same filename, but with a file type of `.bak`. Locate the backup file that 
  corresponds to the edited file in your installation and use it to transfer the edits to the newly updated version.

Once all of the locally edited Symbiota2 files that require updating are updated, or it is determined that they do not require 
updating, follow these steps to update the remaining locally maintained Symbiota2 files:
- [Run each of the update Composer scripts, other than `update-all-files`, and those associated with the edited files from the previous step.](./plugin_composer_scripts.html)
- Run `npm install`

* * *

### [Back to index](./index.html)
