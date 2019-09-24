---
layout: default
---

### [Back to index](./index.html)

# Creating a new frontend component

**NOTE: If you are not planning on including new components in the frontend elements of your plugin, go back to the 
index and skip the section on adding components to the frontend.**

**Before proceeding, be sure to have [added the npm build scripts to the package.json file](./add-npm-build-scripts.html).**

**The [Angular documentation on components](https://angular.io/guide/architecture-components){:target="_blank"} 
  should be used as a general reference for creating and working with components in the frontend.**

**If you are going to be offering i18n internationalization support, [this ngx-translate tutorial](https://www.codeandweb.com/babeledit/tutorials/how-to-translate-your-angular8-app-with-ngx-translate){:target="_blank"} 
  should be used as a general reference for providing i18n translation support. Note: all translation keys used withing 
  your plugin must have a prefix of the plugin name in order to ensure uniqueness.**

Components are essentially sections of the frontend framework. They can be made up of a single component, or be comprised
  of several sub-components. In Symbiota2, a plugin component can be integrated into the frontend framework in one of the 
  following three ways:
  - [By assigning a unique route to the component so that it can be accessed by its own url.](./assigning-unique-route-component.html)
  - [By creating a component outlet hook for the component so that it will be integrated into a specific component outlet as a sub-component.](./creating-component-hook.html)  
  - [By creating a tab outlet hook for the component so that it will be integrated into a specific tab outlet as a sub-component
    within a tabs component.](./creating-tab-hook.html)

Regardless of how the component will be integrated into the frontend framework, it is strongly suggested to create its 
  initial structure using an Angular Schematic through either [the Angular CLI](https://angular.io/cli/generate){:target="_blank"}
  or using an IDE with Angular support. Using the Angular CLI, this can be done through the following steps:
  - From the root directory of your Symbiota2 installation, change directory to the `src/lib` directory of your plugin
    project through the following command (replacing `<plugin-name>` with the name of your plugin):
    ```
    cd plugins/<plugin-name>/src/lib
    ```
  - Generate the component Angular Schematic through the following command:
    ```
    ng g component
    ```
  - Enter a name for the new component when prompted.
  - Once the component has been generated, edit the file named `<plugin-name>.module.ts` (with `<plugin-name>` being 
    the name of your plugin) in the following ways:
    - Ensure that the new component has been imported in the top of the file and added to the `declarations` property array,
      if it has not, then import it and add it.
    - Add the new component to the `exports` property array.
    - If they do not already exist, add the `entryComponents` and `providers` properties to the `@NgModule` declaration and assign them 
      both empty array values.
    - Add the new component to the `entryComponents` property array.
    - Add the following object to the `providers` property array (replacing `<component-name>` with the name you 
      entered for the new component in kebab case, and replacing `<component>` with the actual component that was imported
      at the top of the file and has been added to the `declarations`, `exports`, and `entryComponents` properties):
      ```
      {
          provide: '<component-name>',
          useValue: [{
              name: '<component-name>',
              component: <component>
          }],
          multi: true
      }
      ```
  - Add the new component to the `public-api.ts` file of your plugin by adding the following 
    line to the  `src/public-api.ts` file in your plugin root directory (replacing `<component-name>` with the name you 
    entered for the new component in the previous step):
    ```
    export * from './lib/<component-name>/<component-name>.component';
    ```

After following the above steps, for a component named `example` in a plugin that offers i18n internationalization support 
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
    │   └───api
    │   └───i18n
    │   │   │   en.json
    │   │   │   es.json
    │   │   │   pt.json
    │   │   
    │   └───src
    │       │   public-api.ts
    │       │   test.ts
    │       └───lib
    │           │   example-plugin.module.ts
    │           └───example
    │               │   example.component.css
    │               │   example.component.html
    │               │   example.component.spec.ts
    │               │   example.component.ts
    │   
    │   ...
    ```

  - The `src/public-api.ts` file in the plugin root directory would resemble the following:
    
    ```typescript
    /*
     * Public API Surface of example-plugin
     */
    
    export * from './lib/example-plugin.module';
    export * from './lib/example/example.component';
    ```
  - The `src/lib/example-plugin.module.ts` file in the plugin root directory would resemble the following:
      
  ```typescript
  import { NgModule } from '@angular/core';
  import {TranslateModule} from '@ngx-translate/core';
  import {SymbiotaAuthModule} from 'symbiota-auth';
  import {SymbiotaSharedModule} from 'symbiota-shared';
  import { ExampleComponent } from './example/example.component';
  
  @NgModule({
      declarations: [
          ExampleComponent
      ],
      imports: [
          TranslateModule,
          SymbiotaAuthModule,
          SymbiotaSharedModule
      ],
      exports: [
          ExampleComponent
      ],
      entryComponents: [
          ExampleComponent
      ],
      providers: [
          {
              provide: 'example-component',
              useValue: [{
                  name: 'example-component',
                  component: ExampleComponent
              }],
              multi: true
          }
      ]
  })
  export class ExamplePluginModule { }
  ```

### [Back to index](./index.html)
