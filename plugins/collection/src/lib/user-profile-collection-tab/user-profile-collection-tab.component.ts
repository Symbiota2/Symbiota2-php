import {Component, OnInit, Input} from '@angular/core';

@Component({
    selector: 'collection-user-profile-collection-tab',
    templateUrl: './user-profile-collection-tab.component.html',
    styleUrls: ['./user-profile-collection-tab.component.css']
})
export class UserProfileCollectionTabComponent implements OnInit {

    @Input()
    params: any;

    constructor() {
    }

    ngOnInit() {
    }

}
