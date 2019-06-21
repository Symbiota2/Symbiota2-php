import {Component, EventEmitter, Output} from '@angular/core';

@Component({
    selector: 'header-outlet',
    templateUrl: './header.component.html',
    styleUrls: ['./header.component.css']
})
export class HeaderComponent {
    @Output() sidenavToggle = new EventEmitter<void>();

    toggleSidenav() {
        this.sidenavToggle.emit();
    }

}
