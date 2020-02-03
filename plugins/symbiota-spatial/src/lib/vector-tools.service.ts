import {Injectable} from '@angular/core';
import {polygon, multiPolygon, point, lineString, featureCollection} from '@turf/helpers';
import area from '@turf/area';
import simplify from '@turf/simplify';
import buffer from '@turf/buffer';
import difference from '@turf/difference';
import intersect from '@turf/intersect';
import union from '@turf/union';
import concave from '@turf/concave';
import convex from '@turf/convex';
import circle from '@turf/circle';
import {getDistance as haversineDistance} from 'ol/sphere';

@Injectable({
    providedIn: 'root'
})
export class VectorToolsService {

    constructor() {}

    writeMySQLWktString(type, geocoords) {
        let wktStr = '';
        let coordStr = '';
        if (type === 'Polygon') {
            for (const i in geocoords) {
                if (geocoords[i]) {
                    coordStr += '(';
                    for (const c in geocoords[i]) {
                        if (geocoords[i][c]) {
                            const lat = geocoords[i][c][1];
                            const long = geocoords[i][c][0];
                            coordStr += lat + ' ' + long + ',';
                        }
                    }
                    coordStr = coordStr.substring(0,coordStr.length-1);
                    coordStr += '),';
                }
            }
            coordStr = coordStr.substring(0, (coordStr.length - 1));
            wktStr = 'POLYGON(' + coordStr + ')';
        } else if (type === 'MultiPolygon') {
            for (const i in geocoords) {
                if (geocoords[i]) {
                    coordStr += '(';
                    for (const r in geocoords[i]) {
                        if (geocoords[i][r]) {
                            coordStr += '(';
                            for (const c in geocoords[i][r]) {
                                if (geocoords[i][r][c]) {
                                    const lat = geocoords[i][r][c][1];
                                    const long = geocoords[i][r][c][0];
                                    coordStr += lat + ' ' + long + ',';
                                }
                            }
                            coordStr = coordStr.substring(0,coordStr.length-1);
                            coordStr += '),';
                        }
                    }
                    coordStr = coordStr.substring(0,coordStr.length-1);
                    coordStr += '),';
                }
            }
            coordStr = coordStr.substring(0, (coordStr.length - 1));
            wktStr = 'MULTIPOLYGON(' + coordStr + ')';
        }

        return wktStr;
    }

    getTurfFeature(geoType: string, coordinates: []) {
        if (geoType === 'MultiPolygon') {
            return multiPolygon(coordinates);
        } else if (geoType === 'Polygon') {
            return polygon(coordinates);
        } else if (geoType === 'Point') {
            return point(coordinates);
        } else if (geoType === 'LineString') {
            return lineString(coordinates);
        }
    }

    getTurfFeatureCollection(featureArr: any[]) {
        return featureCollection(featureArr);
    }

    getTurfCircle(center: [], groundRadius: number) {
        const ciroptions = {steps: 200};
        return circle(center, groundRadius, ciroptions);
    }

    getFeatureArea(feature: any) {
        const areaCalc = area(feature);
        return (areaCalc / 1000 / 1000);
    }

    getSimplifiedFeature(feature: any) {
        const options = {tolerance: 0.001, highQuality: true};
        return simplify(feature, options);
    }

    getBufferFeature(feature: any, bufferSize: number) {
        return buffer(feature, bufferSize);
    }

    getDifferenceFeature(feature1: any, feature2: any) {
        return difference(feature1, feature2);
    }

    getIntersectFeature(feature1: any, feature2: any) {
        return intersect(feature1, feature2);
    }

    getUnionFeature(feature1: any, feature2: any) {
        return union(feature1, feature2);
    }

    getConcavePolyFeature(featureArr, maxEdge: number) {
        const options = {maxEdge: maxEdge};
        return concave(featureArr, options);
    }

    getConvexPolyFeature(featureArr) {
        return convex(featureArr);
    }

    getWGS84CirclePoly(center, radius) {
        const edgeCoordinate = [center[0] + radius, center[1]];
        let groundRadius = haversineDistance(center, edgeCoordinate);
        groundRadius = groundRadius / 1000;
        return this.getTurfCircle(center, groundRadius);
    }
}
