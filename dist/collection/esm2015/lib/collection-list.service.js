/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
import { Injectable } from '@angular/core';
import * as i0 from "@angular/core";
export class CollectionListService {
    constructor() {
        this.collections = {
            root: {
                1: {
                    name: 'Southwest',
                    collections: [
                        { collid: 10, collname: 'Coll 10', colltype: 'specimen' },
                        { collid: 11, collname: 'Coll 11', colltype: 'observation' },
                        { collid: 12, collname: 'Coll 12', colltype: 'specimen' }
                    ]
                },
                2: {
                    name: 'Northwest',
                    collections: [
                        { collid: 20, collname: 'Coll 20', colltype: 'specimen' },
                        { collid: 21, collname: 'Coll 21', colltype: 'observation' },
                        { collid: 22, collname: 'Coll 22', colltype: 'specimen' }
                    ]
                },
                3: {
                    name: 'Rocky Mountain',
                    collections: [
                        { collid: 30, collname: 'Coll 30', colltype: 'specimen' },
                        { collid: 31, collname: 'Coll 31', colltype: 'observation' },
                        { collid: 32, collname: 'Coll 32', colltype: 'specimen' }
                    ]
                },
                col40: { collid: 40, collname: 'Coll 40', colltype: 'specimen' },
                col41: { collid: 41, collname: 'Coll 41', colltype: 'specimen' },
                col42: { collid: 42, collname: 'Coll 42', colltype: 'specimen' }
            }
        };
    }
    /**
     * @return {?}
     */
    getCollections() {
        return this.collections;
    }
}
CollectionListService.decorators = [
    { type: Injectable, args: [{
                providedIn: 'root'
            },] }
];
/** @nocollapse */ CollectionListService.ngInjectableDef = i0.ɵɵdefineInjectable({ factory: function CollectionListService_Factory() { return new CollectionListService(); }, token: CollectionListService, providedIn: "root" });
if (false) {
    /**
     * @type {?}
     * @private
     */
    CollectionListService.prototype.collections;
}
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiY29sbGVjdGlvbi1saXN0LnNlcnZpY2UuanMiLCJzb3VyY2VSb290Ijoibmc6Ly9jb2xsZWN0aW9uLyIsInNvdXJjZXMiOlsibGliL2NvbGxlY3Rpb24tbGlzdC5zZXJ2aWNlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7QUFBQSxPQUFPLEVBQUMsVUFBVSxFQUFDLE1BQU0sZUFBZSxDQUFDOztBQU16QyxNQUFNLE9BQU8scUJBQXFCO0lBSGxDO1FBSVksZ0JBQVcsR0FBVztZQUMxQixJQUFJLEVBQUU7Z0JBQ0YsQ0FBQyxFQUFFO29CQUNDLElBQUksRUFBRSxXQUFXO29CQUNqQixXQUFXLEVBQUU7d0JBQ1QsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQzt3QkFDdkQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLGFBQWEsRUFBQzt3QkFDMUQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQztxQkFDMUQ7aUJBQ0o7Z0JBQ0QsQ0FBQyxFQUFFO29CQUNDLElBQUksRUFBRSxXQUFXO29CQUNqQixXQUFXLEVBQUU7d0JBQ1QsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQzt3QkFDdkQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLGFBQWEsRUFBQzt3QkFDMUQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQztxQkFDMUQ7aUJBQ0o7Z0JBQ0QsQ0FBQyxFQUFFO29CQUNDLElBQUksRUFBRSxnQkFBZ0I7b0JBQ3RCLFdBQVcsRUFBRTt3QkFDVCxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsVUFBVSxFQUFDO3dCQUN2RCxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsYUFBYSxFQUFDO3dCQUMxRCxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsVUFBVSxFQUFDO3FCQUMxRDtpQkFDSjtnQkFDRCxLQUFLLEVBQUUsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQztnQkFDOUQsS0FBSyxFQUFFLEVBQUMsTUFBTSxFQUFFLEVBQUUsRUFBRSxRQUFRLEVBQUUsU0FBUyxFQUFFLFFBQVEsRUFBRSxVQUFVLEVBQUM7Z0JBQzlELEtBQUssRUFBRSxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsVUFBVSxFQUFDO2FBQ2pFO1NBQ0osQ0FBQztLQUtMOzs7O0lBSEcsY0FBYztRQUNWLE9BQU8sSUFBSSxDQUFDLFdBQVcsQ0FBQztJQUM1QixDQUFDOzs7WUF0Q0osVUFBVSxTQUFDO2dCQUNSLFVBQVUsRUFBRSxNQUFNO2FBQ3JCOzs7Ozs7OztJQUVHLDRDQThCRSIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7SW5qZWN0YWJsZX0gZnJvbSAnQGFuZ3VsYXIvY29yZSc7XG5pbXBvcnQge0NvbGxlY3Rpb25MaXN0RGF0YX0gZnJvbSAnLi9jb2xsZWN0aW9uLWxpc3QtZGF0YS5tb2RlbCc7XG5cbkBJbmplY3RhYmxlKHtcbiAgICBwcm92aWRlZEluOiAncm9vdCdcbn0pXG5leHBvcnQgY2xhc3MgQ29sbGVjdGlvbkxpc3RTZXJ2aWNlIHtcbiAgICBwcml2YXRlIGNvbGxlY3Rpb25zOiBvYmplY3QgPSB7XG4gICAgICAgIHJvb3Q6IHtcbiAgICAgICAgICAgIDE6IHtcbiAgICAgICAgICAgICAgICBuYW1lOiAnU291dGh3ZXN0JyxcbiAgICAgICAgICAgICAgICBjb2xsZWN0aW9uczogW1xuICAgICAgICAgICAgICAgICAgICB7Y29sbGlkOiAxMCwgY29sbG5hbWU6ICdDb2xsIDEwJywgY29sbHR5cGU6ICdzcGVjaW1lbid9LFxuICAgICAgICAgICAgICAgICAgICB7Y29sbGlkOiAxMSwgY29sbG5hbWU6ICdDb2xsIDExJywgY29sbHR5cGU6ICdvYnNlcnZhdGlvbid9LFxuICAgICAgICAgICAgICAgICAgICB7Y29sbGlkOiAxMiwgY29sbG5hbWU6ICdDb2xsIDEyJywgY29sbHR5cGU6ICdzcGVjaW1lbid9XG4gICAgICAgICAgICAgICAgXVxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIDI6IHtcbiAgICAgICAgICAgICAgICBuYW1lOiAnTm9ydGh3ZXN0JyxcbiAgICAgICAgICAgICAgICBjb2xsZWN0aW9uczogW1xuICAgICAgICAgICAgICAgICAgICB7Y29sbGlkOiAyMCwgY29sbG5hbWU6ICdDb2xsIDIwJywgY29sbHR5cGU6ICdzcGVjaW1lbid9LFxuICAgICAgICAgICAgICAgICAgICB7Y29sbGlkOiAyMSwgY29sbG5hbWU6ICdDb2xsIDIxJywgY29sbHR5cGU6ICdvYnNlcnZhdGlvbid9LFxuICAgICAgICAgICAgICAgICAgICB7Y29sbGlkOiAyMiwgY29sbG5hbWU6ICdDb2xsIDIyJywgY29sbHR5cGU6ICdzcGVjaW1lbid9XG4gICAgICAgICAgICAgICAgXVxuICAgICAgICAgICAgfSxcbiAgICAgICAgICAgIDM6IHtcbiAgICAgICAgICAgICAgICBuYW1lOiAnUm9ja3kgTW91bnRhaW4nLFxuICAgICAgICAgICAgICAgIGNvbGxlY3Rpb25zOiBbXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDMwLCBjb2xsbmFtZTogJ0NvbGwgMzAnLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ30sXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDMxLCBjb2xsbmFtZTogJ0NvbGwgMzEnLCBjb2xsdHlwZTogJ29ic2VydmF0aW9uJ30sXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDMyLCBjb2xsbmFtZTogJ0NvbGwgMzInLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ31cbiAgICAgICAgICAgICAgICBdXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgY29sNDA6IHtjb2xsaWQ6IDQwLCBjb2xsbmFtZTogJ0NvbGwgNDAnLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ30sXG4gICAgICAgICAgICBjb2w0MToge2NvbGxpZDogNDEsIGNvbGxuYW1lOiAnQ29sbCA0MScsIGNvbGx0eXBlOiAnc3BlY2ltZW4nfSxcbiAgICAgICAgICAgIGNvbDQyOiB7Y29sbGlkOiA0MiwgY29sbG5hbWU6ICdDb2xsIDQyJywgY29sbHR5cGU6ICdzcGVjaW1lbid9XG4gICAgICAgIH1cbiAgICB9O1xuXG4gICAgZ2V0Q29sbGVjdGlvbnMoKSB7XG4gICAgICAgIHJldHVybiB0aGlzLmNvbGxlY3Rpb25zO1xuICAgIH1cbn1cbiJdfQ==