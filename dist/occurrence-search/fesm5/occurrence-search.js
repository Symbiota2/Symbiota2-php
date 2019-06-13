import { ɵɵdefineInjectable, Injectable, Component, NgModule } from '@angular/core';
import { CollectionModule } from 'collection';

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var OccurrenceSearchService = /** @class */ (function () {
    function OccurrenceSearchService() {
    }
    OccurrenceSearchService.decorators = [
        { type: Injectable, args: [{
                    providedIn: 'root'
                },] }
    ];
    /** @nocollapse */
    OccurrenceSearchService.ctorParameters = function () { return []; };
    /** @nocollapse */ OccurrenceSearchService.ngInjectableDef = ɵɵdefineInjectable({ factory: function OccurrenceSearchService_Factory() { return new OccurrenceSearchService(); }, token: OccurrenceSearchService, providedIn: "root" });
    return OccurrenceSearchService;
}());

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var OccurrenceSearchComponent = /** @class */ (function () {
    function OccurrenceSearchComponent() {
    }
    /**
     * @return {?}
     */
    OccurrenceSearchComponent.prototype.ngOnInit = /**
     * @return {?}
     */
    function () {
    };
    OccurrenceSearchComponent.decorators = [
        { type: Component, args: [{
                    selector: 'occurrence-search-occurrence-search',
                    template: "\n        <collection-checkbox-list></collection-checkbox-list>\n  "
                }] }
    ];
    /** @nocollapse */
    OccurrenceSearchComponent.ctorParameters = function () { return []; };
    return OccurrenceSearchComponent;
}());

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var ɵ0 = [{
        name: 'occurrence-search-search',
        component: OccurrenceSearchComponent
    }];
var OccurrenceSearchModule = /** @class */ (function () {
    function OccurrenceSearchModule() {
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
    return OccurrenceSearchModule;
}());

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
