import {Component, OnInit, OnDestroy} from '@angular/core';
import {NgForm} from '@angular/forms';
import {Subscription} from 'rxjs';

import {AuthService} from '../auth.service';
import {SpinnerOverlayService} from '../../shared/spinner-overlay.service';

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent {
    maintainLoginValue = 0;

    constructor(public authService: AuthService, public spinnerService: SpinnerOverlayService) {}

    onLogin(form: NgForm) {
        if (form.invalid) {
            return;
        }
        this.spinnerService.show();
        this.authService.login(form.value.username, form.value.password, this.maintainLoginValue);
    }

    setMaintainLogin(event) {
        if (event.checked === true) {
            this.maintainLoginValue = 1;
        } else {
            this.maintainLoginValue = 0;
        }
    }
}
