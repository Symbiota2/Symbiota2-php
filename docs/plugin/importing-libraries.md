---
layout: default
---

### [Back to index](./index.html)

# Importing commonly used libraries into a plugin

**Before proceeding, be sure to have [setup your plugin to add frontend elements](./frontend-initial-setup.html).**

External and core Symbiota2 libraries can be imported into your plugin. External libraries are limited to those that are 
imported into the core Symbiota2 application (see the `package.json` file in the root directory of your Symbiota2 installation 
for a full list of the imported libraries).

To import some commonly used libraries into your plugin, follow these steps:
- Open the `package.json` file in the root folder of your plugin and add the following lines to the `peerDependencies` object:

```json
"symbiota-auth": "file:../../dist/symbiota-auth/symbiota-auth-0.0.1.tgz",
"symbiota-shared": "file:../../dist/symbiota-shared/symbiota-shared-0.0.1.tgz"
```
- **If you are offering i18n internationalization support** also add the following line to the `peerDependencies` object:

```json
"@ngx-translate/core": "^11.0.1"
```
- Open the `ng-package.json` file in the root folder of your plugin and add the following lines after the `entryFile` key 
  in the `lib` property:
  
```json
"umdModuleIds": {
  "symbiota-auth": "symbiota-auth",
  "symbiota-shared": "symbiota-shared"
}
```
- **If you are offering i18n internationalization support** also add the following line to the `umdModuleIds` object added 
  in the previous step:
  
```json
"@ngx-translate/core": "@ngx-translate/core"
```
- From the root folder of your plugin, edit the file `src/lib/<plugin-name>.module.ts` (with `<plugin-name>` being the name 
  of your plugin) in the following ways:
  - Import `SymbiotaAuthModule` from `symbiota-auth` in the top of the file and add it to the `imports` property array.
  - Import `SymbiotaSharedModule` from `symbiota-shared` in the top of the file and add it to the `imports` property array.
  - **If you are offering i18n internationalization support** import `TranslateModule` from `@ngx-translate/core` in the 
    top of the file and add it to the `imports` property array.

After following the above steps, for a plugin that offers i18n internationalization support: 
- The `package.json` file in the plugin root directory would resemble the following: 

```json
{
  "name": "example-plugin",
  "version": "0.0.1",
  "peerDependencies": {
    "@angular/common": "^8.0.3",
    "@angular/core": "^8.0.3",
    "@ngx-translate/core": "^11.0.1",
    "symbiota-auth": "file:../../dist/symbiota-auth/symbiota-auth-0.0.1.tgz",
    "symbiota-shared": "file:../../dist/symbiota-shared/symbiota-shared-0.0.1.tgz"
  }
}
```
- The `ng-package.json` file in the plugin root directory would resemble the following: 

```json
{
  "$schema": "../../node_modules/ng-packagr/ng-package.schema.json",
  "dest": "../../dist/example-plugin",
  "lib": {
    "entryFile": "src/public-api.ts",
    "umdModuleIds": {
      "@ngx-translate/core": "@ngx-translate/core",
      "symbiota-auth": "symbiota-auth",
      "symbiota-shared": "symbiota-shared"
    }
  }
}
```
- The `src/lib/example-plugin.module.ts` file in the plugin root directory would resemble the following:
     
```typescript
import { NgModule } from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';
import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

@NgModule({
  declarations: [],
  imports: [
      TranslateModule,
      SymbiotaAuthModule,
      SymbiotaSharedModule
  ],
  exports: []
})
export class ExamplePluginModule { }
```

### [Back to index](./index.html)
