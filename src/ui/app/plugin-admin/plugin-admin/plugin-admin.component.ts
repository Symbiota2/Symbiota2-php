import {Component} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {MatDialog} from '@angular/material/dialog';
import {TranslateService} from '@ngx-translate/core';

import {PluginDependencyDialogComponent} from '../plugin-dependency-dialog/plugin-dependency-dialog.component';
import {AlterDatabaseWarningDialogComponent} from '../alter-database-warning-dialog/alter-database-warning-dialog.component';

import {PluginLoaderService} from 'symbiota-plugin-loader';
import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {AuthService} from 'symbiota-auth';
import {ConfigurationService} from 'symbiota-shared';

import {AvailablePlugin} from '../available-plugin.model';

@Component({
    selector: 'app-plugin-admin',
    templateUrl: './plugin-admin.component.html',
    styleUrls: ['./plugin-admin.component.css']
})
export class PluginAdminComponent {
    availablePlugins = [];
    installedPlugins = [];
    all = false;
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
    reqNotInstalledText: string;
    disabledPluginsReqText: string;
    enableActionText: string;
    disableActionText: string;
    deleteActionText: string;
    reqByOtherEnabledText: string;
    hasBeenEnabledText: string;
    hasBeenDisabledText: string;
    hasBeenUpdatedText: string;
    hasBeenDeletedText: string;
    errorUpdatingDatabaseText: string;

    constructor(
        private pluginLoader: PluginLoaderService,
        private spinnerService: SpinnerOverlayService,
        private alertService: AlertService,
        private authService: AuthService,
        private translate: TranslateService,
        private configService: ConfigurationService,
        private http: HttpClient,
        public dialog: MatDialog
    ) {
        this.authService.validateAccess(this.accessPermissions);
        this.spinnerService.show();
        http.get<AvailablePlugin[]>('/api/pluginregistry').subscribe(
            pluginList => {
                this.availablePlugins = pluginList;
                this.installedPlugins = Object.assign([], this.pluginLoader.pluginData);
                this.installedPlugins.sort((a, b) => a.title.localeCompare(b.title));
                this.primePluginData();
            }
        );
        this.configService.selectedLanguageValue.subscribe(value => {
            this.setTranslations();
        });
    }

    setTranslations() {
        this.translate.get('core.plugin_admin.plugin_admin.req_not_installed_text').subscribe((res: string) => {
            this.reqNotInstalledText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.disabled_plugins_req_text').subscribe((res: string) => {
            this.disabledPluginsReqText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.enable_action_text').subscribe((res: string) => {
            this.enableActionText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.disable_action_text').subscribe((res: string) => {
            this.disableActionText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.delete_action_text').subscribe((res: string) => {
            this.deleteActionText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.req_by_other_enabled_text').subscribe((res: string) => {
            this.reqByOtherEnabledText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.has_been_enabled_text').subscribe((res: string) => {
            this.hasBeenEnabledText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.has_been_disabled_text').subscribe((res: string) => {
            this.hasBeenDisabledText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.has_been_updated_text').subscribe((res: string) => {
            this.hasBeenUpdatedText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.has_been_deleted_text').subscribe((res: string) => {
            this.hasBeenDeletedText = res;
        });
        this.translate.get('core.plugin_admin.plugin_admin.error_updating_database_text').subscribe((res: string) => {
            this.errorUpdatingDatabaseText = res;
        });
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
        this.spinnerService.hide();
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
        this.enablePluginArr = this.getAllPlugins();
        this.all = true;
        this.validateEnablePlugins();
    }

    onDisableAll() {
        this.resetGlobals();
        this.method = 'disable';
        this.disablePluginArr = this.getAllPlugins();
        this.all = true;
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
            if (enablePlugin.enabled || (this.method === 'enable' && !enablePlugin.enabled)) {
                if (enablePlugin.database_extension) {
                    this.alterDatabase = true;
                }
                this.setRequiredPluginsArr(plugin);
            }
        });
        if (this.uninstalledPluginArr.length > 0) {
            const uninstallStr = this.uninstalledPluginArr.join();
            this.alertService.showErrorSnackbar(
                this.reqNotInstalledText + ' ' + uninstallStr,
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
            if (disablePlugin.enabled) {
                if (disablePlugin.database_extension) {
                    this.alterDatabase = true;
                }
                this.setDependentPluginsArr(plugin);
            }
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
        const dialogRef = this.dialog.open(AlterDatabaseWarningDialogComponent, {
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
                openText: this.disabledPluginsReqText,
                dependencies: depNameArr,
                action: this.enableActionText
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
            actionText = this.disableActionText;
        } else {
            actionText = this.deleteActionText;
        }
        this.dependentPluginArr.forEach((dep) => {
            depNameArr.push(dep.title);
        });
        const dialogRef = this.dialog.open(PluginDependencyDialogComponent, {
            width: '450px',
            data: {
                openText: this.reqByOtherEnabledText,
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
            if ('dependencies' in plugin && plugin.enabled) {
                plugin.dependencies.forEach((dep) => {
                    if (dep === pluginName && (this.disablePluginArr.indexOf(dep) === -1)) {
                        this.dependentPluginArr.push({name: plugin.name, title: plugin.title});
                    }
                });
            }
        });
    }

    setRequiredPluginsArr(pluginName: string) {
        const enablePlugin = this.installedPlugins.find(x => x.name === pluginName);
        if ('dependencies' in enablePlugin) {
            enablePlugin.dependencies.forEach((dep) => {
                const depPlugin = this.installedPlugins.find(x => x.name === dep);
                if (!depPlugin) {
                    this.uninstalledPluginArr.push(dep);
                } else if (!depPlugin.enabled && (this.enablePluginArr.indexOf(dep) === -1)) {
                    this.requiredPluginArr.push({name: depPlugin.name, title: depPlugin.title});
                }
            });
        }
    }

    disablePlugins() {
        this.spinnerService.show();
        if (!this.all) {
            this.disablePluginArr.forEach((plugin) => {
                this.http.post('/api/disableplugin', {'plugin': plugin}).subscribe(
                    () => {
                        this.alertService.showSnackbar(
                            plugin + ' ' + this.hasBeenDisabledText,
                            '',
                            5000
                        );
                        const pluginIndex = this.disablePluginArr.findIndex(i => i === plugin);
                        this.disablePluginArr.splice(pluginIndex, 1);
                        if (this.disablePluginArr.length === 0) {
                            if (this.alterDatabase) {
                                this.http.get<boolean>('/api/updatedatabase').subscribe(
                                    (res) => {
                                        if (res) {
                                            location.reload();
                                        } else {
                                            this.alertService.showErrorSnackbar(
                                                this.errorUpdatingDatabaseText,
                                                '',
                                                5000
                                            );
                                            this.spinnerService.hide();
                                        }
                                    }
                                );
                            } else {
                                location.reload();
                            }
                        }
                    }
                );
            });
        } else {
            this.http.get('/api/disablepluginall').subscribe(
                () => {
                    if (this.alterDatabase) {
                        this.http.get<boolean>('/api/updatedatabase').subscribe(
                            (res) => {
                                if (res) {
                                    location.reload();
                                } else {
                                    this.alertService.showErrorSnackbar(
                                        this.errorUpdatingDatabaseText,
                                        '',
                                        5000
                                    );
                                    this.spinnerService.hide();
                                }
                            }
                        );
                    } else {
                        location.reload();
                    }
                }
            );
        }
    }

    enablePlugins() {
        this.spinnerService.show();
        if (!this.all) {
            this.enablePluginArr.forEach((plugin) => {
                this.http.post('/api/enableplugin', {'plugin': plugin}).subscribe(
                    () => {
                        this.alertService.showSnackbar(
                            plugin + ' ' + this.hasBeenEnabledText,
                            '',
                            5000
                        );
                        console.log(plugin);
                        const pluginIndex = this.enablePluginArr.findIndex(i => i === plugin);
                        this.enablePluginArr.splice(pluginIndex, 1);
                        if (this.enablePluginArr.length === 0) {
                            if (this.alterDatabase) {
                                this.http.get<boolean>('/api/updatedatabase').subscribe(
                                    (res) => {
                                        if (res) {
                                            location.reload();
                                        } else {
                                            this.alertService.showErrorSnackbar(
                                                this.errorUpdatingDatabaseText,
                                                '',
                                                5000
                                            );
                                            this.spinnerService.hide();
                                        }
                                    }
                                );
                            } else {
                                location.reload();
                            }
                        }
                    }
                );
            });
        } else {
            this.http.get('/api/enablepluginall').subscribe(
                () => {
                    if (this.alterDatabase) {
                        this.http.get<boolean>('/api/updatedatabase').subscribe(
                            (res) => {
                                if (res) {
                                    location.reload();
                                } else {
                                    this.alertService.showErrorSnackbar(
                                        this.errorUpdatingDatabaseText,
                                        '',
                                        5000
                                    );
                                    this.spinnerService.hide();
                                }
                            }
                        );
                    } else {
                        location.reload();
                    }
                }
            );
        }
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
                        plugin + ' ' + this.hasBeenUpdatedText,
                        '',
                        5000
                    );
                    const pluginIndex = this.enablePluginArr.findIndex(i => i === plugin);
                    this.enablePluginArr.splice(pluginIndex, 1);
                    if (this.enablePluginArr.length === 0) {
                        if (this.alterDatabase) {
                            this.http.get<boolean>('/api/updatedatabase').subscribe(
                                (res) => {
                                    if (res) {
                                        location.reload();
                                    } else {
                                        this.alertService.showErrorSnackbar(
                                            this.errorUpdatingDatabaseText,
                                            '',
                                            5000
                                        );
                                        this.spinnerService.hide();
                                    }
                                }
                            );
                        } else {
                            location.reload();
                        }
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
                        plugin + ' ' + this.hasBeenDeletedText,
                        '',
                        5000
                    );
                    const pluginIndex = this.disablePluginArr.findIndex(i => i === plugin);
                    this.disablePluginArr.splice(pluginIndex, 1);
                    if (this.disablePluginArr.length === 0) {
                        if (this.alterDatabase) {
                            this.http.get<boolean>('/api/updatedatabase').subscribe(
                                (res) => {
                                    if (res) {
                                        location.reload();
                                    } else {
                                        this.alertService.showErrorSnackbar(
                                            this.errorUpdatingDatabaseText,
                                            '',
                                            5000
                                        );
                                        this.spinnerService.hide();
                                    }
                                }
                            );
                        } else {
                            location.reload();
                        }
                    }
                }
            );
        });
    }

}
