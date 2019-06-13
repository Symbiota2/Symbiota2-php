(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('@angular/core'), require('collection')) :
    typeof define === 'function' && define.amd ? define('occurrence-search', ['exports', '@angular/core', 'collection'], factory) :
    (global = global || self, factory(global['occurrence-search'] = {}, global.ng.core, global.collection));
}(this, function (exports, core, collection) { 'use strict';

    /**
     * @fileoverview added by tsickle
     * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
     */
    var OccurrenceSearchService = /** @class */ (function () {
        function OccurrenceSearchService() {
        }
        OccurrenceSearchService.decorators = [
            { type: core.Injectable, args: [{
                        providedIn: 'root'
                    },] }
        ];
        /** @nocollapse */
        OccurrenceSearchService.ctorParameters = function () { return []; };
        /** @nocollapse */ OccurrenceSearchService.ngInjectableDef = core.ɵɵdefineInjectable({ factory: function OccurrenceSearchService_Factory() { return new OccurrenceSearchService(); }, token: OccurrenceSearchService, providedIn: "root" });
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
            { type: core.Component, args: [{
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
            { type: core.NgModule, args: [{
                        imports: [
                            collection.CollectionModule
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

    exports.OccurrenceSearchComponent = OccurrenceSearchComponent;
    exports.OccurrenceSearchModule = OccurrenceSearchModule;
    exports.OccurrenceSearchService = OccurrenceSearchService;

    Object.defineProperty(exports, '__esModule', { value: true });

}));
//# sourceMappingURL=occurrence-search.umd.js.map
