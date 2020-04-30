import {Component, Input} from '@angular/core';

import {UserDetail} from '../../interfaces/user.interface';

@Component({
    selector: 'app-user-detail',
    templateUrl: './user-detail.component.html',
    styleUrls: ['./user-detail.component.css'],
})
export class UserDetailComponent {
    @Input() user: UserDetail;
}
