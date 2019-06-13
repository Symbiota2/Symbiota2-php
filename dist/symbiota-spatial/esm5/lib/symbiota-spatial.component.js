/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
import { Component } from '@angular/core';
import Map from 'ol/Map.js';
import XYZ from 'ol/source/XYZ.js';
import { Tile as TileLayer } from 'ol/layer.js';
import { fromLonLat } from 'ol/proj.js';
import View from 'ol/View.js';
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
        this.layer = new TileLayer({
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
export { SymbiotaSpatialComponent };
if (false) {
    /** @type {?} */
    SymbiotaSpatialComponent.prototype.map;
    /** @type {?} */
    SymbiotaSpatialComponent.prototype.source;
    /** @type {?} */
    SymbiotaSpatialComponent.prototype.layer;
    /** @type {?} */
    SymbiotaSpatialComponent.prototype.view;
}
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic3ltYmlvdGEtc3BhdGlhbC5jb21wb25lbnQuanMiLCJzb3VyY2VSb290Ijoibmc6Ly9zeW1iaW90YS1zcGF0aWFsLyIsInNvdXJjZXMiOlsibGliL3N5bWJpb3RhLXNwYXRpYWwuY29tcG9uZW50LnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7QUFBQSxPQUFPLEVBQUMsU0FBUyxFQUFTLE1BQU0sZUFBZSxDQUFDO0FBRWhELE9BQU8sR0FBRyxNQUFNLFdBQVcsQ0FBQztBQUM1QixPQUFPLEdBQUcsTUFBTSxrQkFBa0IsQ0FBQztBQUNuQyxPQUFPLEVBQTBCLElBQUksSUFBSSxTQUFTLEVBQUMsTUFBTSxhQUFhLENBQUM7QUFHdkUsT0FBTyxFQUFDLFVBQVUsRUFBQyxNQUFNLFlBQVksQ0FBQztBQUN0QyxPQUFPLElBQUksTUFBTSxZQUFZLENBQUM7QUFZOUI7SUFjSTtJQUNBLENBQUM7Ozs7SUFFRCwyQ0FBUTs7O0lBQVI7UUFDSSxJQUFJLENBQUMsTUFBTSxHQUFHLElBQUksR0FBRyxDQUFDOztZQUVsQixHQUFHLEVBQUUsK0RBQStEO2dCQUNoRSx1R0FBdUc7U0FDOUcsQ0FBQyxDQUFDO1FBRUgsSUFBSSxDQUFDLEtBQUssR0FBRyxJQUFJLFNBQVMsQ0FBQztZQUN2QixNQUFNLEVBQUUsSUFBSSxDQUFDLE1BQU07U0FDdEIsQ0FBQyxDQUFDO1FBRUgsSUFBSSxDQUFDLElBQUksR0FBRyxJQUFJLElBQUksQ0FBQztZQUNqQixNQUFNLEVBQUUsVUFBVSxDQUFDLENBQUMsQ0FBQyxTQUFTLEVBQUUsUUFBUSxDQUFDLENBQUM7WUFDMUMsSUFBSSxFQUFFLENBQUM7U0FDVixDQUFDLENBQUM7UUFFSCxJQUFJLENBQUMsR0FBRyxHQUFHLElBQUksR0FBRyxDQUFDO1lBQ2YsTUFBTSxFQUFFLEtBQUs7WUFDYixNQUFNLEVBQUUsQ0FBQyxJQUFJLENBQUMsS0FBSyxDQUFDO1lBQ3BCLElBQUksRUFBRSxJQUFJLENBQUMsSUFBSTtTQUNsQixDQUFDLENBQUM7SUFDUCxDQUFDOztnQkF0Q0osU0FBUyxTQUFDO29CQUNQLFFBQVEsRUFBRSxtQ0FBbUM7b0JBQzdDLFFBQVEsRUFBRSxzREFFVDs7aUJBRUo7Ozs7SUFrQ0QsK0JBQUM7Q0FBQSxBQXhDRCxJQXdDQztTQWpDWSx3QkFBd0I7OztJQUVqQyx1Q0FBUzs7SUFDVCwwQ0FBWTs7SUFDWix5Q0FBaUI7O0lBQ2pCLHdDQUFXIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IHtDb21wb25lbnQsIE9uSW5pdH0gZnJvbSAnQGFuZ3VsYXIvY29yZSc7XG5cbmltcG9ydCBNYXAgZnJvbSAnb2wvTWFwLmpzJztcbmltcG9ydCBYWVogZnJvbSAnb2wvc291cmNlL1hZWi5qcyc7XG5pbXBvcnQge0hlYXRtYXAgYXMgSGVhdG1hcExheWVyLCBUaWxlIGFzIFRpbGVMYXllcn0gZnJvbSAnb2wvbGF5ZXIuanMnO1xuaW1wb3J0IFZlY3RvckxheWVyIGZyb20gJ29sL2xheWVyL1ZlY3Rvci5qcyc7XG5pbXBvcnQge0NsdXN0ZXIsIE9TTSwgVmVjdG9yIGFzIFZlY3RvclNvdXJjZX0gZnJvbSAnb2wvc291cmNlLmpzJztcbmltcG9ydCB7ZnJvbUxvbkxhdH0gZnJvbSAnb2wvcHJvai5qcyc7XG5pbXBvcnQgVmlldyBmcm9tICdvbC9WaWV3LmpzJztcbmltcG9ydCBQcm9wZXJ0eUNsdXN0ZXIgZnJvbSAnLi4vLi4vLi4vLi4vc3JjL3VpL2Fzc2V0cy9qcy9saWJyYXJpZXMvUHJvcGVydHlDbHVzdGVyLmpzJztcbmltcG9ydCB7XG4gICAgQXRsYXNNYW5hZ2VyLFxuICAgIENpcmNsZSBhcyBDaXJjbGVTdHlsZSxcbiAgICBGaWxsIGFzIEZpbGxTdHlsZSxcbiAgICBTdHJva2UgYXMgU3Ryb2tlU3R5bGUsXG4gICAgUmVndWxhclNoYXBlLFxuICAgIFN0eWxlXG59IGZyb20gJ29sL3N0eWxlLmpzJztcbmltcG9ydCBPdmVybGF5IGZyb20gJ29sL092ZXJsYXkuanMnO1xuXG5AQ29tcG9uZW50KHtcbiAgICBzZWxlY3RvcjogJ3N5bWJpb3RhLXNwYXRpYWwtc3ltYmlvdGEtc3BhdGlhbCcsXG4gICAgdGVtcGxhdGU6IGBcbiAgICAgICAgPGRpdiBpZD1cIm1hcFwiIGNsYXNzPVwibWFwXCI+PC9kaXY+XG4gICAgYCxcbiAgICBzdHlsZVVybHM6IFsnLi9zeW1iaW90YS1zcGF0aWFsLmNvbXBvbmVudC5jc3MnXVxufSlcbmV4cG9ydCBjbGFzcyBTeW1iaW90YVNwYXRpYWxDb21wb25lbnQgaW1wbGVtZW50cyBPbkluaXQge1xuXG4gICAgbWFwOiBNYXA7XG4gICAgc291cmNlOiBYWVo7XG4gICAgbGF5ZXI6IFRpbGVMYXllcjtcbiAgICB2aWV3OiBWaWV3O1xuXG4gICAgY29uc3RydWN0b3IoKSB7XG4gICAgfVxuXG4gICAgbmdPbkluaXQoKSB7XG4gICAgICAgIHRoaXMuc291cmNlID0gbmV3IFhZWih7XG4gICAgICAgICAgICAvLyBUaWxlcyBmcm9tIE1hcGJveCAoTGlnaHQpXG4gICAgICAgICAgICB1cmw6ICdodHRwczovL2FwaS50aWxlcy5tYXBib3guY29tL3Y0L21hcGJveC5saWdodC97en0ve3h9L3t5fS5wbmc/JyArXG4gICAgICAgICAgICAgICAgJ2FjY2Vzc190b2tlbj1way5leUoxSWpvaWJXRndZbTk0SWl3aVlTSTZJbU5wZWpZNE5YVnljVEEyZW1ZeWNYQm5kSFJxY21aM04zZ2lmUS5ySmNGSUcyMTRBcmlJU0xiQjZCNWF3J1xuICAgICAgICB9KTtcblxuICAgICAgICB0aGlzLmxheWVyID0gbmV3IFRpbGVMYXllcih7XG4gICAgICAgICAgICBzb3VyY2U6IHRoaXMuc291cmNlXG4gICAgICAgIH0pO1xuXG4gICAgICAgIHRoaXMudmlldyA9IG5ldyBWaWV3KHtcbiAgICAgICAgICAgIGNlbnRlcjogZnJvbUxvbkxhdChbLTExMC45MDcxMywgMzIuMjE5NzZdKSxcbiAgICAgICAgICAgIHpvb206IDgsXG4gICAgICAgIH0pO1xuXG4gICAgICAgIHRoaXMubWFwID0gbmV3IE1hcCh7XG4gICAgICAgICAgICB0YXJnZXQ6ICdtYXAnLFxuICAgICAgICAgICAgbGF5ZXJzOiBbdGhpcy5sYXllcl0sXG4gICAgICAgICAgICB2aWV3OiB0aGlzLnZpZXdcbiAgICAgICAgfSk7XG4gICAgfVxuXG59XG4iXX0=