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
const ɵ0 = [{
        name: 'collection-collection-checkbox-list',
        component: CollectionCheckboxListComponent
    }];
export class CollectionModule {
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
export { ɵ0 };
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiY29sbGVjdGlvbi5tb2R1bGUuanMiLCJzb3VyY2VSb290Ijoibmc6Ly9jb2xsZWN0aW9uLyIsInNvdXJjZXMiOlsibGliL2NvbGxlY3Rpb24ubW9kdWxlLnRzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7QUFBQSxPQUFPLEVBQUMsUUFBUSxFQUFDLE1BQU0sZUFBZSxDQUFDO0FBQ3ZDLE9BQU8sRUFBQyxhQUFhLEVBQUUsaUJBQWlCLEVBQUUsYUFBYSxFQUFFLGVBQWUsRUFBQyxNQUFNLG1CQUFtQixDQUFDO0FBQ25HLE9BQU8sRUFBQyxnQkFBZ0IsRUFBQyxNQUFNLHNCQUFzQixDQUFDO0FBQ3RELE9BQU8sRUFBQyxtQkFBbUIsRUFBQyxNQUFNLGdCQUFnQixDQUFDO0FBQ25ELE9BQU8sRUFBQyxXQUFXLEVBQUMsTUFBTSxnQkFBZ0IsQ0FBQztBQUMzQyxPQUFPLEVBQUMsWUFBWSxFQUFDLE1BQU0saUJBQWlCLENBQUM7QUFFN0MsT0FBTyxFQUFDLHFCQUFxQixFQUFDLE1BQU0sMkJBQTJCLENBQUM7QUFFaEUsT0FBTyxFQUFDLCtCQUErQixFQUFDLE1BQU0sc0NBQXNDLENBQUM7V0EwQi9ELENBQUM7UUFDUCxJQUFJLEVBQUUscUNBQXFDO1FBQzNDLFNBQVMsRUFBRSwrQkFBK0I7S0FDN0MsQ0FBQztBQUtkLE1BQU0sT0FBTyxnQkFBZ0I7OztZQWhDNUIsUUFBUSxTQUFDO2dCQUNOLFlBQVksRUFBRTtvQkFDViwrQkFBK0I7aUJBQ2xDO2dCQUNELE9BQU8sRUFBRTtvQkFDTCxhQUFhO29CQUNiLGlCQUFpQjtvQkFDakIsYUFBYTtvQkFDYixlQUFlO29CQUNmLGdCQUFnQjtvQkFDaEIsbUJBQW1CO29CQUNuQixXQUFXO29CQUNYLFlBQVk7aUJBQ2Y7Z0JBQ0QsT0FBTyxFQUFFO29CQUNMLCtCQUErQjtpQkFDbEM7Z0JBQ0QsZUFBZSxFQUFFO29CQUNiLCtCQUErQjtpQkFDbEM7Z0JBQ0QsU0FBUyxFQUFFO29CQUNQLHFCQUFxQjtvQkFDckI7d0JBQ0ksT0FBTyxFQUFFLDBCQUEwQjt3QkFDbkMsUUFBUSxJQUdOO3dCQUNGLEtBQUssRUFBRSxJQUFJO3FCQUNkO2lCQUNKO2FBQ0oiLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQge05nTW9kdWxlfSBmcm9tICdAYW5ndWxhci9jb3JlJztcbmltcG9ydCB7TWF0VHJlZU1vZHVsZSwgTWF0Q2hlY2tib3hNb2R1bGUsIE1hdEljb25Nb2R1bGUsIE1hdEJ1dHRvbk1vZHVsZX0gZnJvbSAnQGFuZ3VsYXIvbWF0ZXJpYWwnO1xuaW1wb3J0IHtGbGV4TGF5b3V0TW9kdWxlfSBmcm9tICdAYW5ndWxhci9mbGV4LWxheW91dCc7XG5pbXBvcnQge1JlYWN0aXZlRm9ybXNNb2R1bGV9IGZyb20gJ0Bhbmd1bGFyL2Zvcm1zJztcbmltcG9ydCB7Rm9ybXNNb2R1bGV9IGZyb20gJ0Bhbmd1bGFyL2Zvcm1zJztcbmltcG9ydCB7Q29tbW9uTW9kdWxlfSBmcm9tICdAYW5ndWxhci9jb21tb24nO1xuXG5pbXBvcnQge0NvbGxlY3Rpb25MaXN0U2VydmljZX0gZnJvbSAnLi9jb2xsZWN0aW9uLWxpc3Quc2VydmljZSc7XG5cbmltcG9ydCB7Q29sbGVjdGlvbkNoZWNrYm94TGlzdENvbXBvbmVudH0gZnJvbSAnLi9jb2xsZWN0aW9uLWNoZWNrYm94LWxpc3QuY29tcG9uZW50JztcblxuQE5nTW9kdWxlKHtcbiAgICBkZWNsYXJhdGlvbnM6IFtcbiAgICAgICAgQ29sbGVjdGlvbkNoZWNrYm94TGlzdENvbXBvbmVudFxuICAgIF0sXG4gICAgaW1wb3J0czogW1xuICAgICAgICBNYXRUcmVlTW9kdWxlLFxuICAgICAgICBNYXRDaGVja2JveE1vZHVsZSxcbiAgICAgICAgTWF0SWNvbk1vZHVsZSxcbiAgICAgICAgTWF0QnV0dG9uTW9kdWxlLFxuICAgICAgICBGbGV4TGF5b3V0TW9kdWxlLFxuICAgICAgICBSZWFjdGl2ZUZvcm1zTW9kdWxlLFxuICAgICAgICBGb3Jtc01vZHVsZSxcbiAgICAgICAgQ29tbW9uTW9kdWxlXG4gICAgXSxcbiAgICBleHBvcnRzOiBbXG4gICAgICAgIENvbGxlY3Rpb25DaGVja2JveExpc3RDb21wb25lbnRcbiAgICBdLFxuICAgIGVudHJ5Q29tcG9uZW50czogW1xuICAgICAgICBDb2xsZWN0aW9uQ2hlY2tib3hMaXN0Q29tcG9uZW50XG4gICAgXSxcbiAgICBwcm92aWRlcnM6IFtcbiAgICAgICAgQ29sbGVjdGlvbkxpc3RTZXJ2aWNlLFxuICAgICAgICB7XG4gICAgICAgICAgICBwcm92aWRlOiAnY29sbGVjdGlvbi1jaGVja2JveC1saXN0JyxcbiAgICAgICAgICAgIHVzZVZhbHVlOiBbe1xuICAgICAgICAgICAgICAgIG5hbWU6ICdjb2xsZWN0aW9uLWNvbGxlY3Rpb24tY2hlY2tib3gtbGlzdCcsXG4gICAgICAgICAgICAgICAgY29tcG9uZW50OiBDb2xsZWN0aW9uQ2hlY2tib3hMaXN0Q29tcG9uZW50XG4gICAgICAgICAgICB9XSxcbiAgICAgICAgICAgIG11bHRpOiB0cnVlXG4gICAgICAgIH1cbiAgICBdXG59KVxuZXhwb3J0IGNsYXNzIENvbGxlY3Rpb25Nb2R1bGUge1xufVxuIl19