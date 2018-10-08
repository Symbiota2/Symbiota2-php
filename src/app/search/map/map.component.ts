import { Component, OnInit } from '@angular/core';

import Map from 'ol/Map.js';
import XYZ from 'ol/source/XYZ.js';
import {Heatmap as HeatmapLayer, Tile as TileLayer} from 'ol/layer.js';
import VectorLayer from 'ol/layer/Vector.js';
import {Cluster, OSM, Vector as VectorSource} from 'ol/source.js';
import { fromLonLat } from 'ol/proj.js';
import View from 'ol/View.js';
import PropertyCluster from '../../../assets/js/PropertyCluster.js';
import {
  AtlasManager,
  Circle as CircleStyle,
  Fill as FillStyle,
  Stroke as StrokeStyle,
  RegularShape,
  Style
} from 'ol/style.js';
import Overlay from 'ol/Overlay.js';


@Component({
  selector: 'app-map',
  templateUrl: './map.component.html',
  styleUrls: ['./map.component.css']
})
export class MapComponent implements OnInit {

  map: Map;
  source: XYZ;
  layer: TileLayer;
  view: View;

  constructor() {
  }

  ngOnInit() {
    this.source = new XYZ({
      // Tiles from Mapbox (Light)
      url: 'https://api.tiles.mapbox.com/v4/mapbox.light/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
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
  }
}
