import {Component} from '@angular/core';

import {ConfigurationService} from 'symbiota-shared';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css']
})
export class HomeComponent {
    title = '';

    constructor(config: ConfigurationService) {
        this.title = (config.data.DEFAULT_TITLE ? config.data.DEFAULT_TITLE : '');
    }
}
