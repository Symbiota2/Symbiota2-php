import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { LoginService } from "./login.service";
import { AuthenticationService } from '../../shared/authentication';
import { FormValidationService } from "../../shared/form-validation";
import { NotificationService } from '../../shared/notification';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  loginForm: FormGroup;
  loginData = {username:'', password:''};
  message = '';
  errMsgArr = [];

  constructor(
    private loginService: LoginService,
    private authService: AuthenticationService,
    private router: Router,
    private formValidationService: FormValidationService,
    private notificationService: NotificationService
  ) {}

  ngOnInit() {
    this.loginForm = new FormGroup({
      'username': new FormControl(null, [Validators.required]),
      'password': new FormControl(null, [Validators.required]),
      'remember': new FormControl(null)
    });

  }

  public login() {
    this.authService.login(this.loginData).subscribe((value) => {
      this.loginService.getMe().subscribe((value) => {
        localStorage.setItem('userInfo', JSON.stringify(value.data));
        //console.log(JSON.parse(localStorage.getItem('userInfo')).name);
        this.notificationService.onSuccess('Welcome...'+JSON.parse(localStorage.getItem('userInfo')).name);
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
}
