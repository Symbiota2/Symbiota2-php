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
    method: string;
    allPluginsEnabled = true;
    allPluginsDisabled = true;
    alterDatabase = false;
    enablePluginArr = [];
    disablePluginArr = [];
    uninstalledPluginArr = [];
    requiredPluginArr = [];
    dependentPluginArr = [];
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
        this.installedPlugins.forEach((plugin) => {
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
                plugin.class = 'registered';
            } else {
                if (plugin.source === 'upload') {
                    plugin.class = 'upload';
                } else {
                    plugin.class = 'unregistered';
                }
            }
            plugin.updateAvailable = updateAvailable;
        });
    }

    resetGlobals() {
        this.alterDatabase = false;
        this.enablePluginArr = Object.assign([], []);
        this.disablePluginArr = Object.assign([], []);
        this.uninstalledPluginArr = Object.assign([], []);
        this.requiredPluginArr = Object.assign([], []);
        this.dependentPluginArr = Object.assign([], []);
    }

    onEnableAll() {
        this.resetGlobals();
        this.method = 'enable';
        this.enablePluginArr = Object.assign([], this.getAllPlugins());
        this.validateEnablePlugins();
    }

    onDisableAll() {
        this.resetGlobals();
        this.method = 'disable';
        this.disablePluginArr = Object.assign([], this.getAllPlugins());
        this.validateDisablePlugins();
    }

    onEnableUpdatePlugin(plugin: string, method: string) {
        this.resetGlobals();
        this.method = method;
        this.enablePluginArr.push(plugin);
        this.validateEnablePlugins();
    }

    onDisableDeletePlugin(plugin: string, method: string) {
        this.resetGlobals();
        this.method = method;
        this.disablePluginArr.push(plugin);
        this.validateDisablePlugins();
    }

    validateEnablePlugins() {
        this.enablePluginArr.forEach((plugin) => {
            const enablePlugin = this.installedPlugins.find(x => x.name === plugin);
            if (enablePlugin.database_extension) {
                this.alterDatabase = true;
            }
            this.setRequiredPluginsArr(plugin);
        });
        if (this.uninstalledPluginArr.length > 0) {
            const uninstallStr = this.uninstalledPluginArr.join();
            this.alertService.showErrorSnackbar(
                'The following plugins are required, but are not installed: ' + uninstallStr,
                '',
                5000
            );
        } else if (this.alterDatabase) {
            this.showAlterDatabaseWarning();
        } else if (this.requiredPluginArr.length > 0 && this.method === 'enable') {
            this.showRequiredPluginDialog();
        } else if (this.method === 'enable') {
            this.enablePlugins();
        } else {
            this.updatePlugins();
        }
    }

    validateDisablePlugins() {
        this.disablePluginArr.forEach((plugin) => {
            const disablePlugin = this.installedPlugins.find(x => x.name === plugin);
            if (disablePlugin.database_extension) {
                this.alterDatabase = true;
            }
            this.setDependentPluginsArr(plugin);
        });
        if (this.alterDatabase) {
            this.showAlterDatabaseWarning();
        } else if (this.dependentPluginArr.length > 0) {
            this.showDependentPluginDialog();
        } else if (this.method === 'disable') {
            this.disablePlugins();
        } else {
            this.deletePlugins();
        }
    }

    showAlterDatabaseWarning() {
        const dialogRef = this.dialog.open(PluginDependencyDialogComponent, {
            width: '450px'
        });

        dialogRef.afterClosed().subscribe(result => {
            if (result) {
                if (this.requiredPluginArr.length > 0 && this.method === 'enable') {
                    this.showRequiredPluginDialog();
                } else if (this.method === 'enable') {
                    this.enablePlugins();
                } else if (this.method === 'update') {
                    this.updatePlugins();
                } else if (this.dependentPluginArr.length > 0) {
                    this.showDependentPluginDialog();
                } else if (this.method === 'disable') {
                    this.disablePlugins();
                } else if (this.method === 'delete') {
                    this.deletePlugins();
                }
            }
        });
    }

    showRequiredPluginDialog() {
        const depNameArr = [];
        this.requiredPluginArr.forEach((dep) => {
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
                this.requiredPluginArr.forEach((dep) => {
                    this.enablePluginArr.push(dep.name);
                });
                this.enablePlugins();
            }
        });
    }

    showDependentPluginDialog() {
        const depNameArr = [];
        let actionText: string;
        if (this.method === 'disable') {
            actionText = 'disable';
        } else {
            actionText = 'delete';
        }
        this.dependentPluginArr.forEach((dep) => {
            depNameArr.push(dep.title);
        });
        const dialogRef = this.dialog.open(PluginDependencyDialogComponent, {
            width: '450px',
            data: {
                openText: 'This plugin is required for the following other plugins that are currently enabled',
                dependencies: depNameArr,
                action: actionText
            }
        });

        dialogRef.afterClosed().subscribe(result => {
            if (result) {
                this.dependentPluginArr.forEach((dep) => {
                    this.disablePluginArr.push(dep.name);
                });
                this.disablePlugins();
            }
        });
    }

    getAllPlugins() {
        const returnArr = [];
        this.installedPlugins.forEach((plugin) => {
            returnArr.push(plugin.name);
        });
        return returnArr;
    }

    setDependentPluginsArr(pluginName: string) {
        this.installedPlugins.forEach((plugin) => {
            if (plugin.dependencies && plugin.enabled) {
                plugin.dependencies.forEach((dep) => {
                    if (dep === pluginName) {
                        this.dependentPluginArr.push({name: plugin.name, title: plugin.title});
                    }
                });
            }
        });
    }

    setRequiredPluginsArr(pluginName: string) {
        const enablePlugin = this.installedPlugins.find(x => x.name === pluginName);
        if (enablePlugin.dependencies) {
            enablePlugin.dependencies.forEach((dep) => {
                const depPlugin = this.installedPlugins.find(x => x.name === dep);
                if (!depPlugin) {
                    this.uninstalledPluginArr.push(dep);
                } else if (!depPlugin.enabled && (this.enablePluginArr.indexOf(dep.name) === -1)) {
                    this.requiredPluginArr.push({name: depPlugin.name, title: depPlugin.title});
                }
            });
        }
    }

    disablePlugins() {
        this.spinnerService.show();
        this.disablePluginArr.forEach((plugin) => {
            this.http.post('/api/disableplugin', {'plugin': plugin}).subscribe(
                () => {
                    this.alertService.showSnackbar(
                        plugin + ' ' + 'has been disabled',
                        '',
                        5000
                    );
                    const pluginIndex = this.disablePluginArr.findIndex(i => i === plugin);
                    this.disablePluginArr.splice(pluginIndex, 1);
                    if (this.disablePluginArr.length === 0) {
                        location.reload();
                    }
                 }
            );
        });
    }

    enablePlugins() {
        this.spinnerService.show();
        this.enablePluginArr.forEach((plugin) => {
            this.http.post('/api/enableplugin', {'plugin': plugin}).subscribe(
                () => {
                    this.alertService.showSnackbar(
                        plugin + ' ' + 'has been enabled',
                        '',
                        5000
                    );
                    const pluginIndex = this.enablePluginArr.findIndex(i => i === plugin);
                    this.enablePluginArr.splice(pluginIndex, 1);
                    if (this.enablePluginArr.length === 0) {
                        location.reload();
                    }
                }
            );
        });
    }

    updatePlugins() {
        let url: string;
        let body: object;
        this.spinnerService.show();
        this.enablePluginArr.forEach((plugin) => {
            const updatePluginSource = this.installedPlugins.find(x => x.name === plugin);
            if (updatePluginSource === 'local') {
                url = '/api/installlocalplugin';
                body = {'pluginname': plugin};
            } else {
                url = '/api/updateplugin';
                body = {'uploadurl': updatePluginSource};
            }
            this.http.post(url, body).subscribe(
                () => {
                    this.alertService.showSnackbar(
                        plugin + ' ' + 'has been updated',
                        '',
                        5000
                    );
                    const pluginIndex = this.enablePluginArr.findIndex(i => i === plugin);
                    this.enablePluginArr.splice(pluginIndex, 1);
                    if (this.enablePluginArr.length === 0) {
                        location.reload();
                    }
                }
            );
        });
    }

    deletePlugins() {
        this.spinnerService.show();
        this.disablePluginArr.forEach((plugin) => {
            this.http.post('/api/deleteplugin', {'plugin': plugin}).subscribe(
                () => {
                    this.alertService.showSnackbar(
                        plugin + ' ' + 'has been deleted',
                        '',
                        5000
                    );
                    const pluginIndex = this.disablePluginArr.findIndex(i => i === plugin);
                    this.disablePluginArr.splice(pluginIndex, 1);
                    if (this.disablePluginArr.length === 0) {
                        location.reload();
                    }
                }
            );
        });
    }

}
