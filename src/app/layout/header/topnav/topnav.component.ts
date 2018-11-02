import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Observable} from 'rxjs';
import {Store} from '@ngrx/store';

@Component({
    selector: 'header-topnav',
    templateUrl: './topnav.component.html',
    styleUrls: ['./topnav.component.css']
})
export class TopnavComponent implements OnInit {
    @Output() sidenavToggle = new EventEmitter<void>();
    isAuth$: Observable<boolean>;

    constructor() {
    }

    ngOnInit() {
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }

    onLogout() {

    }
}
