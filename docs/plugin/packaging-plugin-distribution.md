---
layout: default
---

### [Back to index](./index.html)

# Packaging a plugin for distribution

**Before proceeding, be sure to have [added the npm build scripts to the package.json file](./add-npm-build-scripts.html).**

Once your plugin is complete and ready for distribution, it needs to have a final build and then be packaged in a zip archive.
To create a final build and package your plugin, follow these steps:
- Create the final build of your plugin by running the following command (replacing `<plugin-name>` with the name of your plugin):
    ```
    npm run package_<plugin-name>
    ```
- Copy the `api` directory (if it exists), `src` directory (if it exists), and the `config.json` file from the root directory
  of your plugin to the `dist/<plugin-name>` directory (with `<plugin-name>` being the name of your plugin) in the root 
  directory of your Symbiota2 installation.
- Create a zip archive of the `dist/<plugin-name>` directory (with `<plugin-name>` being the name of your plugin) in the root 
  directory of your Symbiota2 installation. The final zip file will be the final packaged version of your plugin. It can be used
  to install your plugin in a Symbiota2 installation locally, or via download.
    
### [Back to index](./index.html)
