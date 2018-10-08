import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from "@angular/forms";
import { Observable } from "rxjs/internal/Observable";
import { map } from "rxjs/operators";
import { Store } from "@ngrx/store";

import { AuthService } from "../auth.service";
import { UIService } from '../../shared/ui.service';
import * as fromRoot from '../../app.reducer';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css']
})
export class LoginComponent implements OnInit {
  loginForm: FormGroup;
  isLoading$: Observable<boolean>;

  constructor(
    private authService: AuthService,
    private uiService: UIService,
    private store: Store<fromRoot.State>
  ) {}

  ngOnInit() {
    this.isLoading$ = this.store.select(fromRoot.getIsLoading);
    this.loginForm = new FormGroup({
      'login': new FormControl(null, [Validators.required]),
      'password': new FormControl(null, [Validators.required]),
      'remember': new FormControl(null)
    });

  }

  onSubmit() {
    this.authService.login({
      login: this.loginForm.value.login,
      password: this.loginForm.value.password
    });
  }

}
