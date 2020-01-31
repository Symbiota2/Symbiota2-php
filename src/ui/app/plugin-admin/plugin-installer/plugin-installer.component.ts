import {Component, ViewChild, ElementRef} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {MatDialog} from '@angular/material/dialog';
import {TranslateService} from '@ngx-translate/core';

import {PluginLoaderService} from 'symbiota-plugin-loader';
import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {AuthService} from 'symbiota-auth';
import {ConfigurationService} from 'symbiota-shared';

import {AvailablePlugin} from '../interfaces/available-plugin.interface';

@Component({
    selector: 'app-plugin-installer',
    templateUrl: './plugin-installer.component.html',
    styleUrls: ['./plugin-installer.component.css'],
})
export class PluginInstallerComponent {
    @ViewChild('fileUpload',  { read: ElementRef, static: false }) fileUpload: ElementRef;
    availablePlugins: any;
    installedPlugins: any;
    pluginUploadUrl: string;
    pluginUploadName: string;
    pluginUploadFile: any;
    pluginUploadFileName: string;
    pluginUploadFormDisabled = true;
    registered = false;
    accessPermissions = [
        'SuperAdmin'
    ];
    successResponse = '';
    errorResponse = {};

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
                this.availablePlugins = Object.assign([], pluginList);
                this.installedPlugins = this.pluginLoader.pluginData;
                pluginList.forEach((plugin) => {
                    if (this.installedPlugins.filter(r => r.name === plugin.name).length > 0) {
                        const pluginIndex = this.availablePlugins.findIndex(i => i.name === plugin.name);
                        this.availablePlugins.splice(pluginIndex, 1);
                    }
                });
                this.availablePlugins.sort((a, b) => a.title.localeCompare(b.title));
                this.spinnerService.hide();
            }
        );
        this.configService.selectedLanguageValue.subscribe(value => {
            this.setTranslations();
        });
    }

    setTranslations() {
        this.translate.get('core.plugin_admin.plugin-installer.install_success_response').subscribe((res: string) => {
            this.successResponse = res;
        });
        this.translate.get('core.plugin_admin.plugin-installer.install_error_response1').subscribe((res: string) => {
            this.errorResponse['errorRes1'] = res;
        });
        this.translate.get('core.plugin_admin.plugin-installer.install_error_response2').subscribe((res: string) => {
            this.errorResponse['errorRes2'] = res;
        });
        this.translate.get('core.plugin_admin.plugin-installer.install_error_response3').subscribe((res: string) => {
            this.errorResponse['errorRes3'] = res;
        });
        this.translate.get('core.plugin_admin.plugin-installer.install_error_response4').subscribe((res: string) => {
            this.errorResponse['errorRes4'] = res;
        });
        this.translate.get('core.plugin_admin.plugin-installer.install_error_response5').subscribe((res: string) => {
            this.errorResponse['errorRes5'] = res;
        });
        this.translate.get('core.plugin_admin.plugin-installer.install_error_response6').subscribe((res: string) => {
            this.errorResponse['errorRes6'] = res;
        });
    }

    onFileUploadClick() {
        this.fileUpload.nativeElement.click();
    }

    removeFile() {
        this.pluginUploadFile = null;
        this.pluginUploadFileName = null;
        this.fileUpload.nativeElement.value = null;
        this.validatePluginUploadForm();
    }

    verifyPluginUrl(event) {
        const url = event.target.value;
        if (url.substr(url.length - 4) === ".zip") {
            this.removeFile();
            this.pluginUploadUrl = url;
        } else {
            this.pluginUploadUrl = null;
            this.alertService.showErrorSnackbar(
                this.errorResponse['errorRes5'],
                '',
                5000
            );
        }
        this.validatePluginUploadForm();
    }

    verifyPluginFile(event) {
        this.pluginUploadFile = event.target.files[0];
        this.pluginUploadFileName = event.target.files[0].name;
        if (this.pluginUploadFileName.substr(this.pluginUploadFileName.length - 4) === ".zip") {
            this.pluginUploadUrl = null;
        } else {
            this.removeFile();
            this.alertService.showErrorSnackbar(
                this.errorResponse['errorRes6'],
                '',
                5000
            );
        }
        this.validatePluginUploadForm();
    }

    validatePluginUploadForm() {
        this.pluginUploadFormDisabled = !(this.pluginUploadUrl || this.pluginUploadFileName);
    }

    onInstallRegisteredPlugin(pluginName: string) {
        const registeredPlugin = this.availablePlugins.find(x => x.name === pluginName);
        this.pluginUploadName = pluginName;
        this.pluginUploadUrl = registeredPlugin.source;
        this.registered = true;
        this.installPlugin();
    }

    installPlugin() {
        if (this.pluginUploadUrl) {
            if (this.pluginUploadUrl !== 'local') {
                this.installPluginByUrl();
            } else {
                this.installLocalPlugin();
            }
        }

        if(this.pluginUploadFile) {
            this.installPluginByFile();
        }
    }

    installPluginByFile() {
        const formData = new FormData();
        this.spinnerService.show();
        formData.append('uploadfile', this.pluginUploadFile);
        this.http.post<any>('/api/installpluginfile', formData).subscribe(
            (res) => {
                this.processResponse(res);
            }
        );
    }

    installPluginByUrl() {
        this.spinnerService.show();
        this.http.post<any>('/api/installpluginurl', {'uploadurl': this.pluginUploadUrl}).subscribe(
            (res) => {
                this.processResponse(res);
            }
        );
    }

    installLocalPlugin() {
        this.spinnerService.show();
        this.http.post<any>('/api/installlocalplugin', {'pluginname': this.pluginUploadName}).subscribe(
            (res) => {
                this.processResponse(res);
            }
        );
    }

    processResponse(res) {
        if(res > 0) {
            const responseLabel = 'errorRes' + res;
            this.alertService.showErrorSnackbar(
                this.errorResponse[responseLabel],
                '',
                5000
            );
        } else {
            this.alertService.showSnackbar(
                this.successResponse,
                '',
                5000
            );
            if (this.registered) {
                const pluginIndex = this.availablePlugins.findIndex(i => i.name === this.pluginUploadName);
                this.availablePlugins.splice(pluginIndex, 1);
            }
        }
        this.pluginUploadUrl = null;
        this.pluginUploadFile = null;
        this.pluginUploadFileName = null;
        this.fileUpload.nativeElement.value = null;
        this.registered = false;
        this.pluginLoader.initialize();
        this.spinnerService.hide();
    }
}
