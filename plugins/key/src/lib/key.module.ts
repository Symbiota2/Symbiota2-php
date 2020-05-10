import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {KeyAvailablePermissionComponent} from './components/key-available-permission/key-available-permission.component';
import {KeyCurrentPermissionComponent} from './components/key-current-permission/key-current-permission.component';

@NgModule({
    declarations: [
        KeyAvailablePermissionComponent,
        KeyCurrentPermissionComponent
    ],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        KeyAvailablePermissionComponent,
        KeyCurrentPermissionComponent
    ],
    providers: [
        {
            provide: 'key-available-permission',
            useValue: [{
                name: 'key-key-available-permission',
                component: KeyAvailablePermissionComponent
            }],
            multi: true
        },
        {
            provide: 'key-current-permission',
            useValue: [{
                name: 'key-key-current-permission',
                component: KeyCurrentPermissionComponent
            }],
            multi: true
        }
    ]
})
export class KeyModule {
}
