import {Component, ViewChild, ElementRef} from '@angular/core';
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

    onInstallPlugin(plugin: string) {

    }
}
