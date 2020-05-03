import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {KeyAdminAvailablePermissionComponent} from './components/key-admin-available-permission/key-admin-available-permission.component';
import {KeyAdminCurrentPermissionComponent} from './components/key-admin-current-permission/key-admin-current-permission.component';
import {KeyEditorAvailablePermissionComponent} from './components/key-editor-available-permission/key-editor-available-permission.component';
import {KeyEditorCurrentPermissionComponent} from './components/key-editor-current-permission/key-editor-current-permission.component';

@NgModule({
    declarations: [
        KeyAdminAvailablePermissionComponent,
        KeyAdminCurrentPermissionComponent,
        KeyEditorAvailablePermissionComponent,
        KeyEditorCurrentPermissionComponent
    ],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        KeyAdminAvailablePermissionComponent,
        KeyAdminCurrentPermissionComponent,
        KeyEditorAvailablePermissionComponent,
        KeyEditorCurrentPermissionComponent
    ],
    providers: [
        {
            provide: 'key-admin-available-permission',
            useValue: [{
                name: 'key-key-admin-available-permission',
                component: KeyAdminAvailablePermissionComponent
            }],
            multi: true
        },
        {
            provide: 'key-admin-current-permission',
            useValue: [{
                name: 'key-key-admin-current-permission',
                component: KeyAdminCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'key-editor-current-permission',
            useValue: [{
                name: 'key-key-editor-current-permission',
                component: KeyEditorCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'key-editor-available-permission',
            useValue: [{
                name: 'key-key-editor-available-permission',
                component: KeyEditorAvailablePermissionComponent
            }],
            multi: true
        }
    ]
})
export class KeyModule {
}
