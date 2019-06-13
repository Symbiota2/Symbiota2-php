import { Injectable, ɵɵdefineInjectable, Component, NgModule } from '@angular/core';
import { CollectionModule } from 'collection';

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
class OccurrenceSearchService {
    constructor() {
    }
}
OccurrenceSearchService.decorators = [
    { type: Injectable, args: [{
                providedIn: 'root'
            },] }
];
/** @nocollapse */
OccurrenceSearchService.ctorParameters = () => [];
/** @nocollapse */ OccurrenceSearchService.ngInjectableDef = ɵɵdefineInjectable({ factory: function OccurrenceSearchService_Factory() { return new OccurrenceSearchService(); }, token: OccurrenceSearchService, providedIn: "root" });

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
class OccurrenceSearchComponent {
    constructor() {
    }
    /**
     * @return {?}
     */
    ngOnInit() {
    }
}
OccurrenceSearchComponent.decorators = [
    { type: Component, args: [{
                selector: 'occurrence-search-occurrence-search',
                template: `
        <collection-checkbox-list></collection-checkbox-list>
  `
            }] }
];
/** @nocollapse */
OccurrenceSearchComponent.ctorParameters = () => [];

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
const ɵ0 = [{
        name: 'occurrence-search-search',
        component: OccurrenceSearchComponent
    }];
class OccurrenceSearchModule {
}
OccurrenceSearchModule.decorators = [
    { type: NgModule, args: [{
                imports: [
                    CollectionModule
                ],
                declarations: [
                    OccurrenceSearchComponent
                ],
                exports: [
                    OccurrenceSearchComponent
                ],
                entryComponents: [
                    OccurrenceSearchComponent
                ],
                providers: [
                    {
                        provide: 'occurrence-search',
                        useValue: ɵ0,
                        multi: true
                    }
                ]
            },] }
];

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */

export { OccurrenceSearchComponent, OccurrenceSearchModule, OccurrenceSearchService };
//# sourceMappingURL=occurrence-search.js.map
