import {Component, OnInit, OnDestroy} from '@angular/core';
import {NgForm} from '@angular/forms';
import {Router} from '@angular/router';

import {AuthService} from '../auth.service';
import {SpinnerOverlayService} from '../../shared/spinner-overlay.service';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent {
    maintainLoginValue = 0;

    constructor(
        private authService: AuthService,
        private spinnerService: SpinnerOverlayService,
        private router: Router
    ) {}

    onLogin(form: NgForm) {
        if (form.invalid) {
            return;
        }
        this.spinnerService.show();
        this.authService.login(
            form.value.username,
            form.value.password,
            this.maintainLoginValue
        ).subscribe(
            () => {
                this.router.navigateByUrl('/');
            }
        );
    }

    setMaintainLogin(event) {
        if (event.checked === true) {
            this.maintainLoginValue = 1;
        } else {
            this.maintainLoginValue = 0;
        }
    }
}
