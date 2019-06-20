import {Component, OnInit} from '@angular/core';

import {EditProfileComponent} from '../edit-profile/edit-profile.component';

import {PluginTabService} from 'symbiota-plugin';

@Component({
    selector: 'app-user-profile',
    templateUrl: './user-profile.component.html',
    styleUrls: ['./user-profile.component.css']
})
export class UserProfileComponent implements OnInit {

    tabsArr = [];

    editTab = {
        'tab_text': 'User Profile',
        'index': 5,
        'component': EditProfileComponent
    };

    constructor(
        private tabsService: PluginTabService,
    ) {
        this.tabsArr = this.tabsService.getOutletTabs('user-profile');
        this.tabsArr.push(this.editTab);
        this.tabsArr.sort((a, b) => a.index - b.index);
    }

    ngOnInit() {
    }

}
