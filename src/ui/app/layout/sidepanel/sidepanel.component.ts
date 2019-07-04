import {Component, EventEmitter, Output, Input} from '@angular/core';
import {Router, NavigationEnd} from '@angular/router';

import {SidepanelLinksComponent} from '../sidepanel-links/sidepanel-links.component';
import {LayoutComponent} from '../layout/layout.component';

import {PluginTabService} from 'symbiota-plugin';

@Component({
    selector: 'sidepanel-outlet',
    templateUrl: './sidepanel.component.html',
    styleUrls: ['./sidepanel.component.css']
})
export class SidepanelComponent {
    @Input() fullWindow: boolean;
    @Output() sidenavToggle = new EventEmitter<void>();

    tabsArr = [];

    linksTab = {
        'tab_text': 'Links',
        'index': 5,
        'component': SidepanelLinksComponent
    };

    constructor(
        private tabsService: PluginTabService,
        private router: Router,
        private layoutComponent: LayoutComponent
    ) {
        this.router.events.subscribe((val) => {
            if (val instanceof NavigationEnd) {
                if (this.layoutComponent.sidenavOpenState) {
                    this.toggleSidenav();
                }
                const currentUrl = this.router.url.toString();
                const currentDomain = currentUrl.split('/')[1];
                const outletId = 'sidenav-' + currentDomain;
                this.tabsArr = Object.assign([], this.tabsService.getOutletTabs(outletId));
                this.tabsArr.push(this.linksTab);
                this.tabsArr.sort((a, b) => a.index - b.index);
            }
        });
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }
}
