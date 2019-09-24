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
- Copy the `api` directory (if it exists), `i18n` directory (if it exists), `src` directory (if it exists), and the `config.json` file from the root directory
  of your plugin to the `dist/<plugin-name>` directory (with `<plugin-name>` being the name of your plugin) in the root 
  directory of your Symbiota2 installation.
- Create a zip archive of the `dist/<plugin-name>` directory (with `<plugin-name>` being the name of your plugin) in the root 
  directory of your Symbiota2 installation. The final zip file will be the final packaged version of your plugin. It can be used
  to install your plugin in a Symbiota2 installation locally, or via download.
- For a service named `example-plugin` which includes a service named `example` and a component named `example` as well as 
  offers i18n internationalization support for English, Spanish, and Portuguese, the contents of the zip archive for the 
  plugin project would have a structure resembling the following:
    
    ```
    └───example-plugin.zip
        │   config.json
        │   example-plugin.d.ts
        │   example-plugin.metadata.json
        │   example-plugin-0.0.1.tgz
        │   package.json
        │   public-api.d.ts
        │   README.md
        └───bundles
        │   │   example-plugin.umd.js
        │   │   example-plugin.umd.js.map
        │   │   example-plugin.umd.min.js
        │   │   example-plugin.umd.min.js.map
        │
        └───esm5
        │   │   example-plugin.js
        │   │   public-api.js
        │   └───lib
        │       │   example-plugin.module.js
        │
        └───esm2015
        │   │   example-plugin.js
        │   │   public-api.js
        │   └───lib
        │       │   example-plugin.module.js
        │
        └───fesm5
        │   │   example-plugin.js
        │   │   example-plugin.js.map
        │
        └───fesm2015
        │   │   example-plugin.js
        │   │   example-plugin.js.map
        │
        └───i18n
        │   │   en.json
        │   │   es.json
        │   │   pt.json
        │
        └───lib
        │   │   example-plugin.module.d.ts
        │      
        └───src
            │   public-api.ts
            │   test.ts
            └───lib
                  │   example.component.css
                  │   example.component.html
                  │   example.component.spec.ts
                  │   example.component.ts
                  │   example.service.spec.ts
                  │   example.service.ts
                  │   example-plugin.module.ts
        
    
    ```
    
### [Back to index](./index.html)
