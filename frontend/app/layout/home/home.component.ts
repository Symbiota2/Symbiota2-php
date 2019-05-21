import {Component, OnInit} from '@angular/core';

import {ConfigurationService} from '../../configuration.service';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {

    title = '';

    constructor(config: ConfigurationService) {
        this.title = config.data.DEFAULT_TITLE;
    }

    ngOnInit() {
    }

}
