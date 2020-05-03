import {NgModule} from '@angular/core';
import {TranslateModule} from '@ngx-translate/core';

import {SymbiotaAuthModule} from 'symbiota-auth';
import {SymbiotaSharedModule} from 'symbiota-shared';

import {TaxonomyEditorCurrentPermissionComponent} from './components/taxonomy-editor-current-permission/taxonomy-editor-current-permission.component';
import {TaxonomyEditorAvailablePermissionComponent} from './components/taxonomy-editor-available-permission/taxonomy-editor-available-permission.component';
import {TaxonProfileEditorAvailablePermissionComponent} from './components/taxon-profile-editor-available-permission/taxon-profile-editor-available-permission.component';
import {TaxonProfileEditorCurrentPermissionComponent} from './components/taxon-profile-editor-current-permission/taxon-profile-editor-current-permission.component';

@NgModule({
    declarations: [
        TaxonomyEditorCurrentPermissionComponent,
        TaxonomyEditorAvailablePermissionComponent,
        TaxonProfileEditorAvailablePermissionComponent,
        TaxonProfileEditorCurrentPermissionComponent
    ],
    imports: [
        TranslateModule,
        SymbiotaAuthModule,
        SymbiotaSharedModule
    ],
    entryComponents: [
        TaxonomyEditorCurrentPermissionComponent,
        TaxonomyEditorAvailablePermissionComponent,
        TaxonProfileEditorAvailablePermissionComponent,
        TaxonProfileEditorCurrentPermissionComponent
    ],
    providers: [
        {
            provide: 'taxonomy-editor-current-permission',
            useValue: [{
                name: 'taxa-taxonomy-editor-current-permission',
                component: TaxonomyEditorCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'taxonomy-editor-available-permission',
            useValue: [{
                name: 'taxa-taxonomy-editor-available-permission',
                component: TaxonomyEditorAvailablePermissionComponent
            }],
            multi: true
        },
        {
            provide: 'taxon-profile-editor-current-permission',
            useValue: [{
                name: 'taxa-taxon-profile-editor-current-permission',
                component: TaxonProfileEditorCurrentPermissionComponent
            }],
            multi: true
        },
        {
            provide: 'taxon-profile-editor-available-permission',
            useValue: [{
                name: 'taxa-taxon-profile-editor-available-permission',
                component: TaxonProfileEditorAvailablePermissionComponent
            }],
            multi: true
        }
    ]
})
export class TaxaModule {
}
