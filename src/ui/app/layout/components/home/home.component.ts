import {Component} from '@angular/core';

import {ConfigurationService} from 'symbiota-shared';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css']
})
export class HomeComponent {
    title = '';

    constructor(
        configService: ConfigurationService
    ) {
        this.title = (configService.data ? configService.data.DEFAULT_TITLE : '');
    }
}
