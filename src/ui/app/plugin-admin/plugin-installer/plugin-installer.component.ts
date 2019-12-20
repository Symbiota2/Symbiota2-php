import {Component, ViewChild, ElementRef} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {MatDialog} from '@angular/material/dialog';
import {TranslateService} from '@ngx-translate/core';

import {PluginLoaderService} from 'symbiota-plugin-loader';
import {SpinnerOverlayService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {AuthService} from 'symbiota-auth';
import {ConfigurationService} from 'symbiota-shared';

import {AvailablePlugin} from '../available-plugin.model';

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
    pluginUploadFile: any;
    pluginUploadFileName: string;
    pluginUploadFormDisabled = true;
    accessPermissions = [
        'SuperAdmin'
    ];
    successResponse = '';
    errorResponse = [
        'Plugin successfully installed',
        'ERROR: Cannot download plugin',
        'ERROR: Cannot extract zip archive',
        'ERROR: Zip archive does not contain plugin config file',
        'ERROR: Invalid plugin config file'
    ];

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
        this.translate.get('core.user.service.create_confirmation').subscribe((res: string) => {
            // this.create_confirmation = res;
        });
        this.translate.get('core.user.service.create_error').subscribe((res: string) => {
            // this.create_error = res;
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
        if(url.substr(url.length - 4) === ".zip") {
            this.removeFile();
            this.pluginUploadUrl = url;
        } else {
            this.pluginUploadUrl = null;
            this.alertService.showErrorSnackbar(
                'The url you entered is not for a .zip file',
                '',
                5000
            );
        }
        this.validatePluginUploadForm();
    }

    verifyPluginFile(event) {
        this.pluginUploadFile = event.target.files[0];
        this.pluginUploadFileName = event.target.files[0].name;
        if(this.pluginUploadFileName.substr(this.pluginUploadFileName.length - 4) === ".zip") {
            this.pluginUploadUrl = null;
        } else {
            this.removeFile();
            this.alertService.showErrorSnackbar(
                'The file you selected is not a zip file',
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
        this.pluginUploadUrl = registeredPlugin.source;
        this.installPlugin();
    }

    installPlugin() {
        if(this.pluginUploadUrl) {
            this.installPluginByUrl();
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

    processResponse(res) {
        if(res > 0) {
            /*this.alertService.showErrorSnackbar(
                this.responseArr[res],
                '',
                5000
            );*/
            this.pluginUploadUrl = null;
            this.pluginUploadFile = null;
            this.pluginUploadFileName = null;
            this.fileUpload.nativeElement.value = null;
            this.spinnerService.hide();
        } else {
            /*this.alertService.showSnackbar(
                this.responseArr[res],
                '',
                5000
            );*/
            location.reload();
        }
    }
}
