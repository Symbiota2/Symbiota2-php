import {Component, Inject} from '@angular/core';
import {MatDialogRef, MAT_DIALOG_DATA} from '@angular/material';

import {AuthService} from '../../auth/auth.service';

export interface LoginData {
    username: string;
    password: string;
}

@Component({
    selector: 'app-session-expire-warning-dialog',
    templateUrl: './session-expire-warning-dialog.component.html',
    styleUrls: ['./session-expire-warning-dialog.component.css']
})
export class SessionExpireWarningDialogComponent {

    constructor(
        public dialogRef: MatDialogRef<SessionExpireWarningDialogComponent>,
        private authService: AuthService,
        @Inject(MAT_DIALOG_DATA) private data: LoginData
    ) {
    }

    onYesClick(): void {
        this.authService.login(
            this.data.username,
            this.data.password,
            0,
            ''
        );
        this.dialogRef.close();
    }

    onNoClick(): void {
        this.dialogRef.close();
        this.authService.logout();
    }
}
