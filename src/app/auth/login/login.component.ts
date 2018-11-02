import {Component, OnInit} from '@angular/core';
import {LoginService} from "../login.service";
import {AuthenticationService} from '../authentication.service';
import {FormValidationService} from "../../shared/form-validation/form-validation.service";
import {HttpClient} from "@angular/common/http";
import {Router} from "@angular/router";

@Component({
    selector: 'app-login',
    templateUrl: './login.component.html',
    styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
    public loginData = {
        username: null,
        password: null
    };

    public message = '';
    public errMsgArr = [];

    public error = null;

    constructor(
        private router: Router,
        private loginService: LoginService,
        private authService: AuthenticationService,
        private formValidationService: FormValidationService
    ) {
    }

    public login() {
        this.authService.login(this.loginData).subscribe((value) => {
            this.loginService.getUser().subscribe((value) => {
                localStorage.setItem('userInfo', JSON.stringify(value.data));
                console.log(JSON.parse(localStorage.getItem('userInfo')).username);
                //this.notificationService.onSuccess('Welcome...'+JSON.parse(localStorage.getItem('userInfo')).name);
                //this.router.navigateByUrl('book');
            });
        }, err => {
            if (err.status_code == 422) {
                this.errMsgArr = this.formValidationService.getErrors(err.errors);
            }
            else {
                this.errMsgArr = [err.error.message];
            }
        });
    }

    ngOnInit() {
    }
}
