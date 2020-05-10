import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {TaxonAvailablePermissionComponent} from './components/taxon-available-permission/taxon-available-permission.component';
import {TaxonCurrentPermissionComponent} from './components/taxon-current-permission/taxon-current-permission.component';

@NgModule({
    declarations: [
        TaxonAvailablePermissionComponent,
        TaxonCurrentPermissionComponent
    ],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        TaxonAvailablePermissionComponent,
        TaxonCurrentPermissionComponent
    ],
    providers: [
        {
            provide: 'taxonomy-current-permission',
            useValue: [{
                name: 'taxa-taxonomy-current-permission',
                component: TaxonCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'taxonomy-available-permission',
            useValue: [{
                name: 'taxa-taxonomy-available-permission',
                component: TaxonAvailablePermissionComponent
            }],
            multi: true
        }
    ]
})
export class TaxaModule {
}
