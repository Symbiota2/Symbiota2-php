---
layout: default
---

### [Back to index](./index.html)

# Creating a new frontend service

**NOTE: If you are not planning on including new services in the frontend elements of your plugin, skip this page.**

**Before proceeding, be sure to have [added the npm build scripts to the package.json file](./add-npm-build-scripts.html).**

**The [Angular documentation on services](https://angular.io/guide/architecture-services){:target="_blank"} 
  should be used as a general reference for creating and working with services in the frontend.**

**If you are going to be offering i18n internationalization support, [this ngx-translate tutorial](https://www.codeandweb.com/babeledit/tutorials/how-to-translate-your-angular8-app-with-ngx-translate){:target="_blank"} 
  should be used as a general reference for providing i18n translation support. Note: all translation keys used withing 
  your plugin must have a prefix of the plugin name in order to ensure uniqueness.**

It is strongly suggested to create the initial structure for the new service using an Angular Schematic through 
  either [the Angular CLI](https://angular.io/cli/generate){:target="_blank"} or using an IDE with Angular support. Using 
  the Angular CLI, this can be done through the following steps:
  - From the root directory of your Symbiota2 installation, change directory to the `src/lib` directory of your plugin
    project through the following command (replacing `<plugin-name>` with the name of your plugin):
    ```
    cd plugins/<plugin-name>/src/lib
    ```
  - Generate the service Angular Schematic through the following command:
    ```
    ng g service
    ```
  - Enter a name for the new service when prompted.
  - Once the service has been generated, edit the file named `<plugin-name>.module.ts` (with `<plugin-name>` being 
    the name of your plugin) in the following ways:
    - Import the new service in the top of the file..
    - If it does not already exist, add the `providers` property to the `@NgModule` declaration and assign it 
      an empty array value.
    - Add the imported service to the `providers` property array.
    - Add the new component to the `public-api.ts` file of your plugin by adding the following 
    line to the  `src/public-api.ts` file in your plugin root directory (replacing `<service-name>` with the name you 
    entered for the new service in the previous step):
    ```
    export * from './lib/<service-name>.service';
    ```

After following the above steps, for a service named `example` in a plugin that offers i18n internationalization support 
  for English, Spanish, and Portuguese:
  - The root folder for the plugin project within the `plugins` folder of the Symbiota2 installation would have a structure 
    resembling the following:
    
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
    │   └───i18n
    │   │   │   en.json
    │   │   │   es.json
    │   │   │   pt.json
    │   │   
    │   └───src
    │       │   public-api.ts
    │       │   test.ts
    │       └───lib
    │           │   example.service.spec.ts
    │           │   example.service.ts
    │           │   example-plugin.module.ts
    │   
    │   ...
    ```

  - The `src/public-api.ts` file in the plugin root directory would resemble the following:
    
    ```typescript
    /*
     * Public API Surface of example-plugin
     */
    
    export * from './lib/example-plugin.module';
    export * from './lib/example.service';
    ```
  - The `src/lib/example-plugin.module.ts` file in the plugin root directory would resemble the following:
      
  ```typescript
  import { NgModule } from '@angular/core';
  import {TranslateModule} from '@ngx-translate/core';
  import {SymbiotaAuthModule} from 'symbiota-auth';
  import {SymbiotaSharedModule} from 'symbiota-shared';
  import {ExampleService} from "./example.service";
  
  @NgModule({
      declarations: [],
      imports: [
          TranslateModule,
          SymbiotaAuthModule,
          SymbiotaSharedModule
      ],
      exports: [],
      providers: [
          ExampleService
      ]
  })
  export class ExamplePluginModule { }
  ```

### [Back to index](./index.html)
