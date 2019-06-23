import {Injectable} from '@angular/core';

import OlMap from 'ol/Map';
import OlView from 'ol/View';

@Injectable({
    providedIn: 'root'
})
export class MapProviderService {

    createMap(): OlMap {
        return new OlMap({
            target: 'map',
            view: new OlView({
                center: [0, 0],
                zoom: 1,
                projection: 'EPSG:3857'
            })
        });
    }
}
