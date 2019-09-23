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
In situations when no changes have been made to the Symbiota2 files (other than the `.env` and `docker-compose.yml` files), 
it is best to also run the following to ensure locally maintained files are also updated: 
- `composer run-script update-all-files`
- `npm install`

* * *
In situations when changes have been made to the locally maintained Symbiota2 files, or plugins have been created within 
the installation, additional steps may need to be taken when updating a Symbiota2 installation to ensure that both locally 
maintained files are also updated and file changes specific to your Symbiota2 installation, whether from editing the code 
or creating new plugins, are preserved. [Follow this link for a full explanation of the Composer scripts included in 
Symbiota2 for managing locally maintained files.](./plugin_composer_scripts.html) The Symbiota2 templates for the locally 
maintained files are located within the same directory as the locally maintained file and have the same filename, but with 
a file type of `.dist`.

When plugins are created within a Symbiota2 installation, the `angular.json` and `tsconfig.json` locally maintained files 
will likely be edited during the process of creating the plugin. In situations when file changes have occurred through creating a 
plugin, or other changes have been made to the locally maintained Symbiota2 files, the Symbiota2 template for the locally 
maintained file can be referenced to determine if updating the local file is necessary. Either scan the GitHub log to see 
if the template(s) of the locally maintained Symbiota2 file(s) that have been edited are included in the update, or visually 
compare the Symbiota2 template itself for changes. If a Symbiota2 template file is included in the update, follow these 
steps to update the locally maintained Symbiota2 file:
- [Locate and run the update Composer script associated with the locally maintained Symbiota2 file.](./plugin_composer_scripts.html)
- In the update process, a backup file will be created of the locally maintained Symbiota2 file within the same directory 
  as the locally maintained file and have the same filename, but with a file type of `.bak`. Locate the update file that 
  was created in the update process and use it to transfer the changes you had made to the newly updated file.
- Once the local edits have been merged into the updated file, run `npm install`

* * *

### [Back to index](./index.html)
