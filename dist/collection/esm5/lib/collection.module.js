/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
import { NgModule } from '@angular/core';
import { MatTreeModule, MatCheckboxModule, MatIconModule, MatButtonModule } from '@angular/material';
import { FlexLayoutModule } from '@angular/flex-layout';
import { ReactiveFormsModule } from '@angular/forms';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { CollectionListService } from './collection-list.service';
import { CollectionCheckboxListComponent } from './collection-checkbox-list.component';
var ɵ0 = [{
        name: 'collection-collection-checkbox-list',
        component: CollectionCheckboxListComponent
    }];
var CollectionModule = /** @class */ (function () {
    function CollectionModule() {
    }
    CollectionModule.decorators = [
        { type: NgModule, args: [{
                    declarations: [
                        CollectionCheckboxListComponent
                    ],
                    imports: [
                        MatTreeModule,
                        MatCheckboxModule,
                        MatIconModule,
                        MatButtonModule,
                        FlexLayoutModule,
                        ReactiveFormsModule,
                        FormsModule,
                        CommonModule
                    ],
                    exports: [
                        CollectionCheckboxListComponent
                    ],
                    entryComponents: [
                        CollectionCheckboxListComponent
                    ],
                    providers: [
                        CollectionListService,
                        {
                            provide: 'collection-checkbox-list',
                            useValue: ɵ0,
                            multi: true
                        }
                    ]
                },] }
    ];
    return CollectionModule;
}());
export { CollectionModule };
export { ɵ0 };
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiY29sbGVjdGlvbi5tb2R1bGUuanMiLCJzb3VyY2VSb290Ijoibmc6Ly9jb2xsZWN0aW9uLyIsInNvdXJjZXMiOlsibGliL2NvbGxlY3Rpb24ubW9kdWxlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7QUFBQSxPQUFPLEVBQUMsUUFBUSxFQUFDLE1BQU0sZUFBZSxDQUFDO0FBQ3ZDLE9BQU8sRUFBQyxhQUFhLEVBQUUsaUJBQWlCLEVBQUUsYUFBYSxFQUFFLGVBQWUsRUFBQyxNQUFNLG1CQUFtQixDQUFDO0FBQ25HLE9BQU8sRUFBQyxnQkFBZ0IsRUFBQyxNQUFNLHNCQUFzQixDQUFDO0FBQ3RELE9BQU8sRUFBQyxtQkFBbUIsRUFBQyxNQUFNLGdCQUFnQixDQUFDO0FBQ25ELE9BQU8sRUFBQyxXQUFXLEVBQUMsTUFBTSxnQkFBZ0IsQ0FBQztBQUMzQyxPQUFPLEVBQUMsWUFBWSxFQUFDLE1BQU0saUJBQWlCLENBQUM7QUFFN0MsT0FBTyxFQUFDLHFCQUFxQixFQUFDLE1BQU0sMkJBQTJCLENBQUM7QUFFaEUsT0FBTyxFQUFDLCtCQUErQixFQUFDLE1BQU0sc0NBQXNDLENBQUM7U0EwQi9ELENBQUM7UUFDUCxJQUFJLEVBQUUscUNBQXFDO1FBQzNDLFNBQVMsRUFBRSwrQkFBK0I7S0FDN0MsQ0FBQztBQTNCZDtJQUFBO0lBaUNBLENBQUM7O2dCQWpDQSxRQUFRLFNBQUM7b0JBQ04sWUFBWSxFQUFFO3dCQUNWLCtCQUErQjtxQkFDbEM7b0JBQ0QsT0FBTyxFQUFFO3dCQUNMLGFBQWE7d0JBQ2IsaUJBQWlCO3dCQUNqQixhQUFhO3dCQUNiLGVBQWU7d0JBQ2YsZ0JBQWdCO3dCQUNoQixtQkFBbUI7d0JBQ25CLFdBQVc7d0JBQ1gsWUFBWTtxQkFDZjtvQkFDRCxPQUFPLEVBQUU7d0JBQ0wsK0JBQStCO3FCQUNsQztvQkFDRCxlQUFlLEVBQUU7d0JBQ2IsK0JBQStCO3FCQUNsQztvQkFDRCxTQUFTLEVBQUU7d0JBQ1AscUJBQXFCO3dCQUNyQjs0QkFDSSxPQUFPLEVBQUUsMEJBQTBCOzRCQUNuQyxRQUFRLElBR047NEJBQ0YsS0FBSyxFQUFFLElBQUk7eUJBQ2Q7cUJBQ0o7aUJBQ0o7O0lBRUQsdUJBQUM7Q0FBQSxBQWpDRCxJQWlDQztTQURZLGdCQUFnQiIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7TmdNb2R1bGV9IGZyb20gJ0Bhbmd1bGFyL2NvcmUnO1xuaW1wb3J0IHtNYXRUcmVlTW9kdWxlLCBNYXRDaGVja2JveE1vZHVsZSwgTWF0SWNvbk1vZHVsZSwgTWF0QnV0dG9uTW9kdWxlfSBmcm9tICdAYW5ndWxhci9tYXRlcmlhbCc7XG5pbXBvcnQge0ZsZXhMYXlvdXRNb2R1bGV9IGZyb20gJ0Bhbmd1bGFyL2ZsZXgtbGF5b3V0JztcbmltcG9ydCB7UmVhY3RpdmVGb3Jtc01vZHVsZX0gZnJvbSAnQGFuZ3VsYXIvZm9ybXMnO1xuaW1wb3J0IHtGb3Jtc01vZHVsZX0gZnJvbSAnQGFuZ3VsYXIvZm9ybXMnO1xuaW1wb3J0IHtDb21tb25Nb2R1bGV9IGZyb20gJ0Bhbmd1bGFyL2NvbW1vbic7XG5cbmltcG9ydCB7Q29sbGVjdGlvbkxpc3RTZXJ2aWNlfSBmcm9tICcuL2NvbGxlY3Rpb24tbGlzdC5zZXJ2aWNlJztcblxuaW1wb3J0IHtDb2xsZWN0aW9uQ2hlY2tib3hMaXN0Q29tcG9uZW50fSBmcm9tICcuL2NvbGxlY3Rpb24tY2hlY2tib3gtbGlzdC5jb21wb25lbnQnO1xuXG5ATmdNb2R1bGUoe1xuICAgIGRlY2xhcmF0aW9uczogW1xuICAgICAgICBDb2xsZWN0aW9uQ2hlY2tib3hMaXN0Q29tcG9uZW50XG4gICAgXSxcbiAgICBpbXBvcnRzOiBbXG4gICAgICAgIE1hdFRyZWVNb2R1bGUsXG4gICAgICAgIE1hdENoZWNrYm94TW9kdWxlLFxuICAgICAgICBNYXRJY29uTW9kdWxlLFxuICAgICAgICBNYXRCdXR0b25Nb2R1bGUsXG4gICAgICAgIEZsZXhMYXlvdXRNb2R1bGUsXG4gICAgICAgIFJlYWN0aXZlRm9ybXNNb2R1bGUsXG4gICAgICAgIEZvcm1zTW9kdWxlLFxuICAgICAgICBDb21tb25Nb2R1bGVcbiAgICBdLFxuICAgIGV4cG9ydHM6IFtcbiAgICAgICAgQ29sbGVjdGlvbkNoZWNrYm94TGlzdENvbXBvbmVudFxuICAgIF0sXG4gICAgZW50cnlDb21wb25lbnRzOiBbXG4gICAgICAgIENvbGxlY3Rpb25DaGVja2JveExpc3RDb21wb25lbnRcbiAgICBdLFxuICAgIHByb3ZpZGVyczogW1xuICAgICAgICBDb2xsZWN0aW9uTGlzdFNlcnZpY2UsXG4gICAgICAgIHtcbiAgICAgICAgICAgIHByb3ZpZGU6ICdjb2xsZWN0aW9uLWNoZWNrYm94LWxpc3QnLFxuICAgICAgICAgICAgdXNlVmFsdWU6IFt7XG4gICAgICAgICAgICAgICAgbmFtZTogJ2NvbGxlY3Rpb24tY29sbGVjdGlvbi1jaGVja2JveC1saXN0JyxcbiAgICAgICAgICAgICAgICBjb21wb25lbnQ6IENvbGxlY3Rpb25DaGVja2JveExpc3RDb21wb25lbnRcbiAgICAgICAgICAgIH1dLFxuICAgICAgICAgICAgbXVsdGk6IHRydWVcbiAgICAgICAgfVxuICAgIF1cbn0pXG5leHBvcnQgY2xhc3MgQ29sbGVjdGlvbk1vZHVsZSB7XG59XG4iXX0=