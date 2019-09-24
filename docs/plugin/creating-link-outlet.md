---
layout: default
---

### [Back to index](./index.html)

# Creating a link outlet

**NOTE: If you are not planning on including new link outlets in the frontend elements of your plugin, skip this page.**

**Before proceeding, be sure to have [created the frontend component to serve as the outlet](./creating-frontend-component.html).**

To create the outlet within a component, follow these steps:
- Open the `package.json` file in the root folder of your plugin and add the following line in the `peerDependencies` object:
  
```json
"symbiota-plugin": "file:../../dist/symbiota-plugin/symbiota-plugin-0.0.1.tgz"
```
- Open the `ng-package.json` file in the root folder of your plugin and add the following line in the `umdModuleIds` object under the `lib` property:
  
```json
"symbiota-plugin": "symbiota-plugin"
```
- From the root folder of your plugin, edit the file `src/lib/<plugin-name>.module.ts` (with `<plugin-name>` being 
  the name of your plugin) in the following ways:
  - Import `SymbiotaPluginModule` from `symbiota-plugin` in the top of the file and add it to the `imports` property array.
- From the root folder of your plugin, edit the file `src/lib/<component-name>/<component-name>.component.ts` (with `<component-name>` being 
  the component to serve as the outlet) in the following ways:
  - Import `PluginLinkService` from `symbiota-plugin` in the top of the file.
  - Create a global within the component class and assign it the value of an empty array. This will serve as the link array.
  - Inject the `PluginLinkService` in the `constructor` method.
  - Within the `constructor` method, call the `getOutletLinks` method of the injected `PluginLinkService` and pass it the name 
    you would like to use for this outlet and reassign the global to the value that is returned.
  - Sort the global by the `link_text` property.
- From the root folder of your plugin, edit the file `src/lib/<component-name>/<component-name>.component.html` (with `<component-name>` being 
  the component to serve as the outlet) add one of the following blocks of code where you would like the hooked links from the outlet
  to display (replacing `<global>` with the global you created in the previous steps):
  - **If you are offering i18n internationalization support:**
    ```typescript
    {% raw %}
    <ng-container *ngIf="<global>.length > 0">
        <div *ngFor="let link of <global>">
            <a routerLink="{{link.link_path}}" *ngIf="link.link_text">{{link.link_text}}</a>
            <a routerLink="{{link.link_path}}" *ngIf="link.link_text_translation_key">{{ link.link_text_translation_key | translate }}</a>
        </div>
    </ng-container>
    {% endraw %}
    ```
  - **If you are not offering i18n internationalization support:**
    ```typescript
    {% raw %}
    <ng-container *ngIf="<global>.length > 0">
       <div *ngFor="let link of <global>">
         <a routerLink="{{link.link_path}}">{{link.link_text}}</a>
       </div>
    </ng-container>
      
    ```
After following the above steps, using a component named `example` in a plugin that offers i18n internationalization support: 
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
    "symbiota-plugin": "file:../../dist/symbiota-plugin/symbiota-plugin-0.0.1.tgz"
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
      "symbiota-shared": "symbiota-shared",
      "symbiota-plugin": "symbiota-plugin"
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
import {SymbiotaPluginModule} from "symbiota-plugin";

@NgModule({
    declarations: [],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule,      
        SymbiotaPluginModule
    ],
    exports: []
})
export class ExamplePluginModule { }
```
- The `src/lib/example/example.component.ts` file in the plugin root directory would resemble the following:
        
```typescript
import {Component, OnInit} from '@angular/core';
import {PluginLinkService} from 'symbiota-plugin';

@Component({
    selector: 'example-plugin-example',
    templateUrl: './example.component.html',
    styleUrls: ['./example.component.css']
})
export class ExampleComponent implements OnInit {

    globalArray = [];

    constructor(
        private linkService: PluginLinkService
    ) {
      this.globalArray = Object.assign([], this.linkService.getOutletLinks('example-plugin-link-outlet'));
      this.globalArray.sort((a, b) => a.link_text.localeCompare(b.link_text));
    }

    ngOnInit() {
    }

}
```
- The `src/lib/example/example.component.html` file in the plugin root directory would resemble the following:
          
```typescript
{% raw %}
<ng-container *ngIf="<global>.length > 0">
    <div *ngFor="let link of <global>">
        <a routerLink="{{link.link_path}}" *ngIf="link.link_text">{{link.link_text}}</a>
        <a routerLink="{{link.link_path}}" *ngIf="link.link_text_translation_key">{{ link.link_text_translation_key | translate }}</a>
    </div>
</ng-container>
{% endraw %}
```

### [Back to index](./index.html)
