import {Component, OnInit} from '@angular/core';
import {Observable} from 'rxjs';

import {PluginLoaderService} from '../plugin-loader.service';
import {PluginInstallerService} from '../plugin-installer.service';

import {AvailablePluginData} from '../available-plugin-data.model';

@Component({
    selector: 'app-plugin-admin',
    templateUrl: './plugin-admin.component.html',
    styleUrls: ['./plugin-admin.component.css']
})
export class PluginAdminComponent implements OnInit {
    availablePlugins$: Observable<AvailablePluginData[]>;
    installedPlugins: any;

    constructor(
        private pluginLoader: PluginLoaderService,
        private pluginInstaller: PluginInstallerService
    ) {
    }

    ngOnInit() {
        this.installedPlugins = this.pluginLoader.pluginData;
        this.availablePlugins$ = this.pluginInstaller.pluginList$;
    }

}
