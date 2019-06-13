(function (global, factory) {
    typeof exports === 'object' && typeof module !== 'undefined' ? factory(exports, require('@angular/core'), require('ol/Map.js'), require('ol/source/XYZ.js'), require('ol/layer.js'), require('ol/proj.js'), require('ol/View.js')) :
    typeof define === 'function' && define.amd ? define('symbiota-spatial', ['exports', '@angular/core', 'ol/Map.js', 'ol/source/XYZ.js', 'ol/layer.js', 'ol/proj.js', 'ol/View.js'], factory) :
    (global = global || self, factory(global['symbiota-spatial'] = {}, global.ng.core, global.Map, global.XYZ, global.layer_js, global.proj_js, global.View));
}(this, function (exports, core, Map, XYZ, layer_js, proj_js, View) { 'use strict';

    Map = Map && Map.hasOwnProperty('default') ? Map['default'] : Map;
    XYZ = XYZ && XYZ.hasOwnProperty('default') ? XYZ['default'] : XYZ;
    View = View && View.hasOwnProperty('default') ? View['default'] : View;

    /**
     * @fileoverview added by tsickle
     * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
     */
    var SymbiotaSpatialService = /** @class */ (function () {
        function SymbiotaSpatialService() {
        }
        SymbiotaSpatialService.decorators = [
            { type: core.Injectable, args: [{
                        providedIn: 'root'
                    },] }
        ];
        /** @nocollapse */
        SymbiotaSpatialService.ctorParameters = function () { return []; };
        /** @nocollapse */ SymbiotaSpatialService.ngInjectableDef = core.ɵɵdefineInjectable({ factory: function SymbiotaSpatialService_Factory() { return new SymbiotaSpatialService(); }, token: SymbiotaSpatialService, providedIn: "root" });
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
            this.layer = new layer_js.Tile({
                source: this.source
            });
            this.view = new View({
                center: proj_js.fromLonLat([-110.90713, 32.21976]),
                zoom: 8,
            });
            this.map = new Map({
                target: 'map',
                layers: [this.layer],
                view: this.view
            });
        };
        SymbiotaSpatialComponent.decorators = [
            { type: core.Component, args: [{
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
            { type: core.NgModule, args: [{
                        declarations: [SymbiotaSpatialComponent],
                        imports: [],
                        exports: [SymbiotaSpatialComponent],
                        bootstrap: [SymbiotaSpatialComponent]
                    },] }
        ];
        return SymbiotaSpatialModule;
    }());

    exports.SymbiotaSpatialComponent = SymbiotaSpatialComponent;
    exports.SymbiotaSpatialModule = SymbiotaSpatialModule;
    exports.SymbiotaSpatialService = SymbiotaSpatialService;

    Object.defineProperty(exports, '__esModule', { value: true });

}));
//# sourceMappingURL=symbiota-spatial.umd.js.map
