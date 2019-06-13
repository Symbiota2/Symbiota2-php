import { ɵɵdefineInjectable, Injectable, Component, NgModule } from '@angular/core';
import Map from 'ol/Map.js';
import XYZ from 'ol/source/XYZ.js';
import { Tile } from 'ol/layer.js';
import { fromLonLat } from 'ol/proj.js';
import View from 'ol/View.js';

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var SymbiotaSpatialService = /** @class */ (function () {
    function SymbiotaSpatialService() {
    }
    SymbiotaSpatialService.decorators = [
        { type: Injectable, args: [{
                    providedIn: 'root'
                },] }
    ];
    /** @nocollapse */
    SymbiotaSpatialService.ctorParameters = function () { return []; };
    /** @nocollapse */ SymbiotaSpatialService.ngInjectableDef = ɵɵdefineInjectable({ factory: function SymbiotaSpatialService_Factory() { return new SymbiotaSpatialService(); }, token: SymbiotaSpatialService, providedIn: "root" });
    return SymbiotaSpatialService;
}());

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var SymbiotaSpatialComponent = /** @class */ (function () {
    function SymbiotaSpatialComponent() {
    }
    /**
     * @return {?}
     */
    SymbiotaSpatialComponent.prototype.ngOnInit = /**
     * @return {?}
     */
    function () {
        this.source = new XYZ({
            // Tiles from Mapbox (Light)
            url: 'https://api.tiles.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png?' +
                'access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
        });
        this.layer = new Tile({
            source: this.source
        });
        this.view = new View({
            center: fromLonLat([-110.90713, 32.21976]),
            zoom: 8,
        });
        this.map = new Map({
            target: 'map',
            layers: [this.layer],
            view: this.view
        });
    };
    SymbiotaSpatialComponent.decorators = [
        { type: Component, args: [{
                    selector: 'symbiota-spatial-symbiota-spatial',
                    template: "\n        <div id=\"map\" class=\"map\"></div>\n    ",
                    styles: [".map{width:100%;height:100vh}"]
                }] }
    ];
    /** @nocollapse */
    SymbiotaSpatialComponent.ctorParameters = function () { return []; };
    return SymbiotaSpatialComponent;
}());

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var SymbiotaSpatialModule = /** @class */ (function () {
    function SymbiotaSpatialModule() {
    }
    SymbiotaSpatialModule.decorators = [
        { type: NgModule, args: [{
                    declarations: [SymbiotaSpatialComponent],
                    imports: [],
                    exports: [SymbiotaSpatialComponent],
                    bootstrap: [SymbiotaSpatialComponent]
                },] }
    ];
    return SymbiotaSpatialModule;
}());

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */

export { SymbiotaSpatialComponent, SymbiotaSpatialModule, SymbiotaSpatialService };
//# sourceMappingURL=symbiota-spatial.js.map
