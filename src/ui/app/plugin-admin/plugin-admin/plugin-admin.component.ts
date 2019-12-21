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
    selector: 'app-plugin-admin',
    templateUrl: './plugin-admin.component.html',
    styleUrls: ['./plugin-admin.component.css']
})
export class PluginAdminComponent {
    availablePlugins: any;
    installedPlugins: any;
    allPluginsEnabled = true;
    allPluginsDisabled = true;
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
                this.availablePlugins = pluginList;
                this.installedPlugins = this.pluginLoader.pluginData;
                this.installedPlugins.sort((a, b) => a.title.localeCompare(b.title));
                this.primePluginData();
                this.spinnerService.hide();
            }
        );
    }

    primePluginData() {
        this.installedPlugins.forEach((plugin, index) => {
            if (plugin.enabled) {
                this.allPluginsDisabled = false;
            } else {
                this.allPluginsEnabled = false;
            }

            let updateAvailable = false;
            const installedVersionArr = plugin.version.split('.');
            const currentPlugin = this.availablePlugins.find(x => x.name === plugin.name);
            if (currentPlugin) {
                const currentVersionArr = currentPlugin.version.split('.');
                if (Number(currentVersionArr[0]) > Number(installedVersionArr[0])) {
                    updateAvailable = true;
                }
                if (Number(currentVersionArr[1]) > Number(installedVersionArr[1])) {
                    updateAvailable = true;
                }
                if (Number(currentVersionArr[2]) > Number(installedVersionArr[2])) {
                    updateAvailable = true;
                }
            }
            plugin.updateAvailable = updateAvailable;
        });
    }

    onEnableAll() {
        const pluginArr = this.getAllPlugins();
        this.enablePlugins(pluginArr);
    }

    onDisableAll() {
        const pluginArr = this.getAllPlugins();
        this.disablePlugins(pluginArr);
    }

    onDisablePlugin(plugin: string) {
        const disableArr = [];
        disableArr.push(plugin);
        const depPluginArr = this.getDependentPlugins(plugin);
        if (depPluginArr.length > 0) {
            const depNameArr = [];
            depPluginArr.forEach((dep, index) => {
                depNameArr.push(dep.title);
            });
            const dialogRef = this.dialog.open(PluginDependencyDialogComponent, {
                width: '450px',
                data: {
                    openText: 'This plugin is required for the following other plugins that are currently enabled',
                    dependencies: depNameArr,
                    action: 'disable'
                }
            });

            dialogRef.afterClosed().subscribe(result => {
                if (result) {
                    depPluginArr.forEach((dep, index) => {
                        disableArr.push(dep.name);
                    });
                    this.disablePlugins(disableArr);
                }
            });
        } else {
            this.disablePlugins(disableArr);
        }
    }

    onEnablePlugin(plugin: string) {
        const enableArr = [];
        enableArr.push(plugin);
        const depPluginArr = this.getRequiredPlugins(plugin);
        if (depPluginArr.length > 0) {
            const depNameArr = [];
            depPluginArr.forEach((dep, index) => {
                depNameArr.push(dep.title);
            });
            const dialogRef = this.dialog.open(PluginDependencyDialogComponent, {
                width: '450px',
                data: {
                    openText: 'The following disabled plugins are required by this plugin',
                    dependencies: depNameArr,
                    action: 'enable'
                }
            });

            dialogRef.afterClosed().subscribe(result => {
                if (result) {
                    depPluginArr.forEach((dep, index) => {
                        enableArr.push(dep.name);
                    });
                    this.enablePlugins(enableArr);
                }
            });
        } else {
            this.enablePlugins(enableArr);
        }
    }

    onUpdatePlugin(plugin: string) {

    }

    onDeletePlugin(plugin: string) {
        const deleteArr = [];
        deleteArr.push(plugin);
        const depPluginArr = this.getDependentPlugins(plugin);
        if (depPluginArr.length > 0) {
            const depNameArr = [];
            depPluginArr.forEach((dep, index) => {
                depNameArr.push(dep.title);
            });
            const dialogRef = this.dialog.open(PluginDependencyDialogComponent, {
                width: '450px',
                data: {
                    openText: 'This plugin is required for the following other plugins that are currently enabled',
                    dependencies: depNameArr,
                    action: 'delete'
                }
            });

            dialogRef.afterClosed().subscribe(result => {
                if (result) {
                    depPluginArr.forEach((dep, index) => {
                        deleteArr.push(dep.name);
                    });
                    this.deletePlugins(deleteArr);
                }
            });
        } else {
            this.deletePlugins(deleteArr);
        }
    }

    getAllPlugins() {
        const returnArr = [];
        this.installedPlugins.forEach((plugin, index) => {
            returnArr.push(plugin.name);
        });
        return returnArr;
    }

    getDependentPlugins(pluginName: string) {
        const returnArr = [];
        this.installedPlugins.forEach((plugin, index) => {
            if (plugin.dependencies && plugin.enabled) {
                plugin.dependencies.forEach((dep, index2) => {
                    if (dep === pluginName) {
                        returnArr.push({name: plugin.name, title: plugin.title});
                    }
                });
            }
        });
        return returnArr;
    }

    getRequiredPlugins(pluginName: string) {
        const returnArr = [];
        const enablePlugin = this.installedPlugins.find(x => x.name === pluginName);
        if (enablePlugin.dependencies) {
            enablePlugin.dependencies.forEach((dep, index) => {
                const depPlugin = this.installedPlugins.find(x => x.name === dep);
                if (!depPlugin.enabled) {
                    returnArr.push({name: depPlugin.name, title: depPlugin.title});
                }
            });
        }
        return returnArr;
    }

    disablePlugins(pluginArr: string[]) {
        this.spinnerService.show();
        this.http.post('/api/disableplugins', {'plugins': pluginArr}).subscribe(
            (res) => {
                location.reload();
            }
        );
    }

    enablePlugins(pluginArr: string[]) {
        this.spinnerService.show();
        this.http.post('/api/enableplugins', {'plugins': pluginArr}).subscribe(
            (res) => {
                location.reload();
            }
        );
    }

    deletePlugins(pluginArr: string[]) {

    }

}
