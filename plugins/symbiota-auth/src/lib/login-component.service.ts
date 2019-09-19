import {Injectable} from '@angular/core';
import {MatDialog} from '@angular/material';

import {LoginComponent} from './login/login.component';

@Injectable({
    providedIn: 'root'
})
export class LoginComponentService {
    private loginDialog: any;

    constructor(
        public dialog: MatDialog
    ) {}

    openLoginDialog(redirect = '') {
        this.loginDialog = this.dialog.open(LoginComponent, {
            width: '475px',
            data: {redirect: redirect}
        });
    }
}
