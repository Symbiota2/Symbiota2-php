import {Component, OnInit} from '@angular/core';

import {EditProfileComponent} from '../edit-profile/edit-profile.component';

import {PluginTabService} from '../../plugin/plugin-tab.service';
import {PluginLoaderService} from '../../plugin/plugin-loader.service';

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
        private pluginLoader: PluginLoaderService
    ) {
        const pluginTabs = this.tabsService.getOutletTabs('user-profile');
        pluginTabs.forEach((tab, index) => {
            const loadedModule = this.pluginLoader.pluginModules[tab.filename];
            const setTab = this.tabsService.setTab(loadedModule, tab);
            this.tabsArr.push(setTab);
        });
        this.tabsArr.push(this.editTab);
        this.tabsArr.sort((a, b) => a.index - b.index);
    }

    ngOnInit() {
    }

}
