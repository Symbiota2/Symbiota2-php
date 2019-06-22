import {Component, OnInit} from '@angular/core';
import {Observable} from 'rxjs';

import {PluginComponentService} from 'symbiota-plugin';
import {PluginLinkService} from 'symbiota-plugin';
import {AuthService} from 'symbiota-auth';

@Component({
    selector: 'app-sitemap',
    templateUrl: './sitemap.component.html',
    styleUrls: ['./sitemap.component.css']
})
export class SitemapComponent implements OnInit {
    isLoggedIn$: Observable<boolean>;
    currentPermissions$: Observable<object>;

    generalLinksArr = [];
    portalAdminLinksArr = [];
    dataManagementLinksArr = [];

    generalComponentsArr = [];
    portalAdminComponentsArr = [];
    dataManagementComponentsArr = [];

    portalAdminLinks = [
        {'link_path': '/pluginadmin', 'link_text': 'Manage Plugins'}
    ];

    constructor(
        private linkService: PluginLinkService,
        private componentService: PluginComponentService,
        private authService: AuthService
    ) {
        this.generalLinksArr = Object.assign([], this.linkService.getOutletLinks('sitemap-general'));
        this.generalLinksArr.sort((a, b) => a.link_text.localeCompare(b.link_text));

        this.portalAdminLinksArr = Object.assign([], this.linkService.getOutletLinks('sitemap-portal-admin'));
        this.portalAdminLinksArr = this.portalAdminLinksArr.concat(this.portalAdminLinks);
        this.portalAdminLinksArr.sort((a, b) => a.link_text.localeCompare(b.link_text));

        this.dataManagementLinksArr = Object.assign([], this.linkService.getOutletLinks('sitemap-data-management'));
        this.dataManagementLinksArr.sort((a, b) => a.link_text.localeCompare(b.link_text));

        this.generalComponentsArr = Object.assign([], this.componentService.getOutletComponents('sitemap-general'));
        this.generalComponentsArr.sort((a, b) => a.index - b.index);

        this.portalAdminComponentsArr = Object.assign([], this.componentService.getOutletComponents('sitemap-portal-admin'));
        this.portalAdminComponentsArr.sort((a, b) => a.index - b.index);

        this.dataManagementComponentsArr = Object.assign([], this.componentService.getOutletComponents('sitemap-data-management'));
        this.dataManagementComponentsArr.sort((a, b) => a.index - b.index);
    }

    ngOnInit() {
        this.isLoggedIn$ = this.authService.isAuthenticated$;
        this.currentPermissions$ = this.authService.userPermissions$;
    }
}
