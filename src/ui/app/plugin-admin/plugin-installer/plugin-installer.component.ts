import {Component} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {MatDialog} from '@angular/material/dialog';

import {PluginDependencyDialogComponent} from '../plugin-dependency-dialog/plugin-dependency-dialog.component';

import {PluginLoaderService} from 'symbiota-plugin-loader';
import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {AuthService} from 'symbiota-auth';

import {AvailablePlugin} from '../available-plugin.model';

@Component({
    selector: 'app-plugin-installer',
    templateUrl: './plugin-installer.component.html',
    styleUrls: ['./plugin-installer.component.css'],
})
export class PluginInstallerComponent {
    availablePlugins: any;
    installedPlugins: any;
    accessPermissions = [
        'SuperAdmin'
    ];

    constructor(
        private pluginLoader: PluginLoaderService,
        private spinnerService: SpinnerOverlayService,
        private alertService: AlertService,
        private authService: AuthService,
        private http: HttpClient,
        public dialog: MatDialog
    ) {
        this.authService.validateAccess(this.accessPermissions);
        this.spinnerService.show();
        http.get<AvailablePlugin[]>('/api/pluginregistry').subscribe(
            pluginList => {
                this.availablePlugins = Object.assign([], pluginList);
                this.installedPlugins = this.pluginLoader.pluginData;
                pluginList.forEach((plugin, index) => {
                    if (this.installedPlugins.filter(r => r.name === plugin.name).length > 0) {
                        const pluginIndex = this.availablePlugins.findIndex(i => i.name === plugin.name);
                        this.availablePlugins.splice(pluginIndex, 1);
                    }
                });
                this.availablePlugins.sort((a, b) => a.title.localeCompare(b.title));
                this.spinnerService.hide();
            }
        );
    }

    onInstallPlugin(plugin: string) {

    }
}
