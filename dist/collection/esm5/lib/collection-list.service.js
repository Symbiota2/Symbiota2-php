/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
import { Injectable } from '@angular/core';
import * as i0 from "@angular/core";
var CollectionListService = /** @class */ (function () {
    function CollectionListService() {
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
    CollectionListService.prototype.getCollections = /**
     * @return {?}
     */
    function () {
        return this.collections;
    };
    CollectionListService.decorators = [
        { type: Injectable, args: [{
                    providedIn: 'root'
                },] }
    ];
    /** @nocollapse */ CollectionListService.ngInjectableDef = i0.ɵɵdefineInjectable({ factory: function CollectionListService_Factory() { return new CollectionListService(); }, token: CollectionListService, providedIn: "root" });
    return CollectionListService;
}());
export { CollectionListService };
if (false) {
    /**
     * @type {?}
     * @private
     */
    CollectionListService.prototype.collections;
}
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiY29sbGVjdGlvbi1saXN0LnNlcnZpY2UuanMiLCJzb3VyY2VSb290Ijoibmc6Ly9jb2xsZWN0aW9uLyIsInNvdXJjZXMiOlsibGliL2NvbGxlY3Rpb24tbGlzdC5zZXJ2aWNlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7QUFBQSxPQUFPLEVBQUMsVUFBVSxFQUFDLE1BQU0sZUFBZSxDQUFDOztBQUd6QztJQUFBO1FBSVksZ0JBQVcsR0FBVztZQUMxQixJQUFJLEVBQUU7Z0JBQ0YsQ0FBQyxFQUFFO29CQUNDLElBQUksRUFBRSxXQUFXO29CQUNqQixXQUFXLEVBQUU7d0JBQ1QsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQzt3QkFDdkQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLGFBQWEsRUFBQzt3QkFDMUQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQztxQkFDMUQ7aUJBQ0o7Z0JBQ0QsQ0FBQyxFQUFFO29CQUNDLElBQUksRUFBRSxXQUFXO29CQUNqQixXQUFXLEVBQUU7d0JBQ1QsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQzt3QkFDdkQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLGFBQWEsRUFBQzt3QkFDMUQsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQztxQkFDMUQ7aUJBQ0o7Z0JBQ0QsQ0FBQyxFQUFFO29CQUNDLElBQUksRUFBRSxnQkFBZ0I7b0JBQ3RCLFdBQVcsRUFBRTt3QkFDVCxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsVUFBVSxFQUFDO3dCQUN2RCxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsYUFBYSxFQUFDO3dCQUMxRCxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsVUFBVSxFQUFDO3FCQUMxRDtpQkFDSjtnQkFDRCxLQUFLLEVBQUUsRUFBQyxNQUFNLEVBQUUsRUFBRSxFQUFFLFFBQVEsRUFBRSxTQUFTLEVBQUUsUUFBUSxFQUFFLFVBQVUsRUFBQztnQkFDOUQsS0FBSyxFQUFFLEVBQUMsTUFBTSxFQUFFLEVBQUUsRUFBRSxRQUFRLEVBQUUsU0FBUyxFQUFFLFFBQVEsRUFBRSxVQUFVLEVBQUM7Z0JBQzlELEtBQUssRUFBRSxFQUFDLE1BQU0sRUFBRSxFQUFFLEVBQUUsUUFBUSxFQUFFLFNBQVMsRUFBRSxRQUFRLEVBQUUsVUFBVSxFQUFDO2FBQ2pFO1NBQ0osQ0FBQztLQUtMOzs7O0lBSEcsOENBQWM7OztJQUFkO1FBQ0ksT0FBTyxJQUFJLENBQUMsV0FBVyxDQUFDO0lBQzVCLENBQUM7O2dCQXRDSixVQUFVLFNBQUM7b0JBQ1IsVUFBVSxFQUFFLE1BQU07aUJBQ3JCOzs7Z0NBTEQ7Q0EwQ0MsQUF2Q0QsSUF1Q0M7U0FwQ1kscUJBQXFCOzs7Ozs7SUFDOUIsNENBOEJFIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IHtJbmplY3RhYmxlfSBmcm9tICdAYW5ndWxhci9jb3JlJztcbmltcG9ydCB7Q29sbGVjdGlvbkxpc3REYXRhfSBmcm9tICcuL2NvbGxlY3Rpb24tbGlzdC1kYXRhLm1vZGVsJztcblxuQEluamVjdGFibGUoe1xuICAgIHByb3ZpZGVkSW46ICdyb290J1xufSlcbmV4cG9ydCBjbGFzcyBDb2xsZWN0aW9uTGlzdFNlcnZpY2Uge1xuICAgIHByaXZhdGUgY29sbGVjdGlvbnM6IG9iamVjdCA9IHtcbiAgICAgICAgcm9vdDoge1xuICAgICAgICAgICAgMToge1xuICAgICAgICAgICAgICAgIG5hbWU6ICdTb3V0aHdlc3QnLFxuICAgICAgICAgICAgICAgIGNvbGxlY3Rpb25zOiBbXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDEwLCBjb2xsbmFtZTogJ0NvbGwgMTAnLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ30sXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDExLCBjb2xsbmFtZTogJ0NvbGwgMTEnLCBjb2xsdHlwZTogJ29ic2VydmF0aW9uJ30sXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDEyLCBjb2xsbmFtZTogJ0NvbGwgMTInLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ31cbiAgICAgICAgICAgICAgICBdXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgMjoge1xuICAgICAgICAgICAgICAgIG5hbWU6ICdOb3J0aHdlc3QnLFxuICAgICAgICAgICAgICAgIGNvbGxlY3Rpb25zOiBbXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDIwLCBjb2xsbmFtZTogJ0NvbGwgMjAnLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ30sXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDIxLCBjb2xsbmFtZTogJ0NvbGwgMjEnLCBjb2xsdHlwZTogJ29ic2VydmF0aW9uJ30sXG4gICAgICAgICAgICAgICAgICAgIHtjb2xsaWQ6IDIyLCBjb2xsbmFtZTogJ0NvbGwgMjInLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ31cbiAgICAgICAgICAgICAgICBdXG4gICAgICAgICAgICB9LFxuICAgICAgICAgICAgMzoge1xuICAgICAgICAgICAgICAgIG5hbWU6ICdSb2NreSBNb3VudGFpbicsXG4gICAgICAgICAgICAgICAgY29sbGVjdGlvbnM6IFtcbiAgICAgICAgICAgICAgICAgICAge2NvbGxpZDogMzAsIGNvbGxuYW1lOiAnQ29sbCAzMCcsIGNvbGx0eXBlOiAnc3BlY2ltZW4nfSxcbiAgICAgICAgICAgICAgICAgICAge2NvbGxpZDogMzEsIGNvbGxuYW1lOiAnQ29sbCAzMScsIGNvbGx0eXBlOiAnb2JzZXJ2YXRpb24nfSxcbiAgICAgICAgICAgICAgICAgICAge2NvbGxpZDogMzIsIGNvbGxuYW1lOiAnQ29sbCAzMicsIGNvbGx0eXBlOiAnc3BlY2ltZW4nfVxuICAgICAgICAgICAgICAgIF1cbiAgICAgICAgICAgIH0sXG4gICAgICAgICAgICBjb2w0MDoge2NvbGxpZDogNDAsIGNvbGxuYW1lOiAnQ29sbCA0MCcsIGNvbGx0eXBlOiAnc3BlY2ltZW4nfSxcbiAgICAgICAgICAgIGNvbDQxOiB7Y29sbGlkOiA0MSwgY29sbG5hbWU6ICdDb2xsIDQxJywgY29sbHR5cGU6ICdzcGVjaW1lbid9LFxuICAgICAgICAgICAgY29sNDI6IHtjb2xsaWQ6IDQyLCBjb2xsbmFtZTogJ0NvbGwgNDInLCBjb2xsdHlwZTogJ3NwZWNpbWVuJ31cbiAgICAgICAgfVxuICAgIH07XG5cbiAgICBnZXRDb2xsZWN0aW9ucygpIHtcbiAgICAgICAgcmV0dXJuIHRoaXMuY29sbGVjdGlvbnM7XG4gICAgfVxufVxuIl19