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
    currentPermissions$: Observable<object>;

    generalLinksArr = [];
    portalAdminLinksArr = [];
    dataManagementLinksArr = [];

    generalComponentsArr = [];
    portalAdminComponentsArr = [];
    dataManagementComponentsArr = [];

    portalAdminLinks = [
        {
            'link_path': '/plugininstaller',
            'link_text_translation_key': 'core.layout.sitemap.install_plugins_link_text',
            'index': 1
        },
        {
            'link_path': '/pluginadmin',
            'link_text_translation_key': 'core.layout.sitemap.manage_plugins_link_text',
            'index': 2
        }
    ];

    constructor(
        private linkService: PluginLinkService,
        private componentService: PluginComponentService,
        private authService: AuthService
    ) {
        this.generalLinksArr = Object.assign([], this.linkService.getOutletLinks('sitemap-general'));
        this.generalLinksArr.sort((a, b) => a.index - b.index);

        this.portalAdminLinksArr = Object.assign([], this.linkService.getOutletLinks('sitemap-portal-admin'));
        this.portalAdminLinksArr = this.portalAdminLinksArr.concat(this.portalAdminLinks);
        this.portalAdminLinksArr.sort((a, b) => a.index - b.index);

        this.dataManagementLinksArr = Object.assign([], this.linkService.getOutletLinks('sitemap-data-management'));
        this.dataManagementLinksArr.sort((a, b) => a.index - b.index);

        this.generalComponentsArr = Object.assign([], this.componentService.getOutletComponents('sitemap-general'));
        this.generalComponentsArr.sort((a, b) => a.index - b.index);

        this.portalAdminComponentsArr = Object.assign([], this.componentService.getOutletComponents('sitemap-portal-admin'));
        this.portalAdminComponentsArr.sort((a, b) => a.index - b.index);

        this.dataManagementComponentsArr = Object.assign([], this.componentService.getOutletComponents('sitemap-data-management'));
        this.dataManagementComponentsArr.sort((a, b) => a.index - b.index);
    }

    ngOnInit() {
        this.currentPermissions$ = this.authService.userPermissions$;
    }
}
