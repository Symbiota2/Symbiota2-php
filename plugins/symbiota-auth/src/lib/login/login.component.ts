import {Component, Inject} from '@angular/core';
import {NgForm} from '@angular/forms';
import {Router} from "@angular/router";
import {MatDialogRef, MAT_DIALOG_DATA} from '@angular/material';

import {AuthService} from '../auth.service';
import {SpinnerOverlayService} from 'symbiota-shared';

export interface RedirectData {
    redirect: string;
}

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent {
    maintainLoginValue = 0;
    show = false;

    constructor(
        @Inject(MAT_DIALOG_DATA) public data: RedirectData,
        public dialogRef: MatDialogRef<LoginComponent>,
        private authService: AuthService,
        private spinnerService: SpinnerOverlayService,
        private router: Router
    ) {}

    onLogin(form: NgForm) {
        if (!form.value.username) {
            form.controls['username'].setErrors({'incorrect': true});
            return;
        }
        if (!form.value.password) {
            form.controls['password'].setErrors({'incorrect': true});
            return;
        }
        this.dialogRef.close();
        this.spinnerService.show();
        this.authService.login(
            form.value.username,
            form.value.password,
            this.maintainLoginValue,
            this.data.redirect
        );
    }

    onRetrieveLogin(form: NgForm) {
        if (!form.value.email) {
            form.controls['email'].setErrors({'incorrect': true});
            return;
        }
        this.dialogRef.close();
        this.spinnerService.show();
        this.authService.retrieveLogin(
            form.value.email
        );
    }

    onResetPassword(form: NgForm) {
        if (!form.value.username) {
            form.controls['username'].setErrors({'incorrect': true});
            return;
        }
        this.dialogRef.close();
        this.spinnerService.show();
        this.authService.resetPassword(
            form.value.username
        );
    }

    closeLogin() {
        this.dialogRef.close();
    }

    toggleRetrieveLogin() {
        this.show = !this.show;
    }

    noAccount() {
        this.dialogRef.close();
        this.router.navigate(['/signup']);
    }

    setMaintainLogin(event) {
        if (event.checked === true) {
            this.maintainLoginValue = 1;
        } else {
            this.maintainLoginValue = 0;
        }
    }
}
