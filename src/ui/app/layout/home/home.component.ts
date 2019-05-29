import {Component, OnInit, Injector, ViewChild, ViewContainerRef} from '@angular/core';

import {ConfigurationService} from '../../configuration.service';
import {LoaderService} from '../../loader.service';

@Component({
    selector: 'app-home',
    templateUrl: './home.component.html',
    styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {
    @ViewChild('targetRef', { read: ViewContainerRef }) vcRef: ViewContainerRef;
    title = '';

    constructor(
        config: ConfigurationService,
        private injector: Injector,
        private pluginLoader: LoaderService
    ) {
        this.title = (config.data.DEFAULT_TITLE ? config.data.DEFAULT_TITLE : '');
    }

    ngOnInit() {
        this.loadPlugin('shared');
        this.loadPlugin('plugin1');
    }

    loadPlugin(pluginName: string) {
        this.pluginLoader.load(pluginName).then(moduleFactory => {
            const moduleRef = moduleFactory.create(this.injector);
            const entryComponent = (moduleFactory.moduleType as any).entry;
            if (entryComponent) {
                const compFactory = moduleRef.componentFactoryResolver.resolveComponentFactory(
                    entryComponent
                );
                this.vcRef.createComponent(compFactory);
            }
        });
    }

}
