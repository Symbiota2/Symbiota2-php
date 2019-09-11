---
layout: default
---

### [Back to index](./index.html)

# Initial setup to add frontend elements

**NOTE: If you are not planning on including frontend elements in your plugin, go back to the index and skip the section 
on adding frontend elements.**

**Before proceeding, be sure to have [setup your plugin config file](./initial-config-file-setup.html).**

To setup your project to add frontend elements, follow these steps:
- Build the Angular framework for the plugin by running the following (replacing `<plugin-name>` with the name of your plugin):
```shell
ng g library <plugin-name> --prefix=<plugin-name>
```
- After the build process is complete, verify that the root folder for the plugin project within the `plugins` folder 
of the Symbiota2 installation has a structure resembling the following:

```
plugins
│   ...
└───example-plugin
│   │   config.json
│   │   karma.conf.js
│   │   ng-package.json
│   │   package.json
│   │   README.md
│   │   tsconfig.lib.json
│   │   tsconfig.spec.json
│   │   tslint.json
│   └───api
│   └───src
│       │   public-api.ts
│       │   test.ts
│       └───lib
│           │   example-plugin.component.spec.ts
│           │   example-plugin.component.ts
│           │   example-plugin.module.ts
│           │   example-plugin.service.spec.ts
│           │   example-plugin.service.ts
│   
│   ...
```
- Remove the example component and service that were automatically built:
  - Edit the `plugins/<plugin-name>/src/public-api.ts` file so that it resembles the following:
    ```typescript
    export * from './lib/example-plugin.module';
    ```
  
  - Edit the `plugins/<plugin-name>/src/lib/<plugin-name>.module.ts` file so that it resembles the following:
      ```typescript
      import { NgModule } from '@angular/core';
      
      @NgModule({
        declarations: [],
        imports: [],
        exports: []
      })
      export class ExamplePluginModule { }
      ```
  
  - Delete the following files:
    - `plugins/<plugin-name>/src/lib/<plugin-name>.component.spec.ts`
    - `plugins/<plugin-name>/src/lib/<plugin-name>.component.ts`
    - `plugins/<plugin-name>/src/lib/<plugin-name>.service.spec.ts`
    - `plugins/<plugin-name>/src/lib/<plugin-name>.service.ts`
  - Verify that the root folder for the plugin project within the `plugins` folder of the Symbiota2 installation now has 
    a structure resembling the following:
  
  ```
  plugins
  │   ...
  └───example-plugin
  │   │   config.json
  │   │   karma.conf.js
  │   │   ng-package.json
  │   │   package.json
  │   │   README.md
  │   │   tsconfig.lib.json
  │   │   tsconfig.spec.json
  │   │   tslint.json
  │   └───api
  │   └───src
  │       │   public-api.ts
  │       │   test.ts
  │       └───lib
  │           │   example-plugin.module.ts
  │   
  │   ...
  ```
- Add the `ui_filename` property to your plugin config file.
- Assign the value of the `ui_filename` property to `<plugin-name>.umd.js` replacing `<plugin-name>` with the name of 
  your plugin.
- Add the `ui_module_name` property to your plugin config file.
- Open the `plugins/<plugin-name>/src/lib/<plugin-name>.module.ts` file and note the class name that is being exported 
  in the bottom line of the file. This class name will be the module name used by your plugin.
- Assign the value of the `ui_module_name` property to the module name used by your plugin.
- The `config.json` file should resemble the following after these steps have been completed:
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
      "ui_module_name": "ExamplePluginModule"
    }
    ```

### [Back to index](./index.html)
