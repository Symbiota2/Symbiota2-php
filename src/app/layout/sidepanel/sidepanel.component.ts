import {Component, OnInit, EventEmitter, Output} from '@angular/core';
import {Observable} from 'rxjs';
import {Store} from '@ngrx/store';

@Component({
    selector: 'sidepanel-outlet',
    templateUrl: './sidepanel.component.html',
    styleUrls: ['./sidepanel.component.css']
})
export class SidepanelComponent implements OnInit {
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
        this.toggleSidenav();
    }
}
