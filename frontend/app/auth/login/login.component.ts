import {Component, OnInit, OnDestroy} from '@angular/core';
import {NgForm} from '@angular/forms';
import {MatDialogRef} from '@angular/material';

import {AuthService} from '../auth.service';
import {UserService} from '../user.service';
import {SpinnerOverlayService} from '../../shared/spinner-overlay.service';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent {
    maintainLoginValue = 0;
    show = false;

    constructor(
        public dialogRef: MatDialogRef<LoginComponent>,
        private userService: UserService,
        private authService: AuthService,
        private spinnerService: SpinnerOverlayService
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
            this.maintainLoginValue
        );
    }

    onRetrieveLogin(form: NgForm) {
        if (!form.value.email) {
            form.controls['email'].setErrors({'incorrect': true});
            return;
        }
        this.dialogRef.close();
        this.spinnerService.show();
        this.userService.retrieveLogin(
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
        this.userService.resetPassword(
            form.value.username
        );
    }

    closeLogin() {
        this.dialogRef.close();
    }

    toggleRetrieveLogin() {
        this.show = !this.show;
    }

    setMaintainLogin(event) {
        if (event.checked === true) {
            this.maintainLoginValue = 1;
        } else {
            this.maintainLoginValue = 0;
        }
    }
}
