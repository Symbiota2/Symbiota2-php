import { OnInit } from '@angular/core';
import Map from 'ol/Map.js';
import XYZ from 'ol/source/XYZ.js';
import { Tile as TileLayer } from 'ol/layer.js';
import View from 'ol/View.js';
export declare class SymbiotaSpatialComponent implements OnInit {
    map: Map;
    source: XYZ;
    layer: TileLayer;
    view: View;
    constructor();
    ngOnInit(): void;
}
