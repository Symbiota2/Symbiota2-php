import {
    Component,
    OnInit,
    AfterViewInit,
    OnDestroy,
    Injector,
    ViewChild,
    ViewContainerRef,
    Compiler,
    ComponentRef
} from '@angular/core';
import { ActivatedRoute } from '@angular/router';

declare const SystemJS: any;

@Component({
    selector: 'app-plugin-outlet',
    template: `
    <div #content></div>
  `
})
export class PluginOutletComponent implements OnInit, AfterViewInit, OnDestroy {

    @ViewChild('content',  { read: ViewContainerRef, static: false })
    content: ViewContainerRef;

    private file: string;
    private module: string;
    private provider: string;
    component: ComponentRef<any>;

    constructor(
        private route: ActivatedRoute,
        private injector: Injector,
        private compiler: Compiler) {
    }

    ngOnInit() {
        this.file = this.route.snapshot.data.file;
        this.module = this.route.snapshot.data.module;
        this.provider = this.route.snapshot.data.provider;
    }

    ngAfterViewInit() {
        this.loadPlugins();
    }

    private async loadPlugins() {
        const module = await SystemJS.import('assets/js/plugins/' + this.file);
        const moduleFactory = await this.compiler.compileModuleAsync<any>(module[this.module]);
        const moduleRef = moduleFactory.create(this.injector);
        const componentProvider = moduleRef.injector.get(this.provider);
        const componentFactory = moduleRef.componentFactoryResolver.resolveComponentFactory<any>(
            componentProvider[0][0].component
        );

        this.component = this.content.createComponent(componentFactory);
    }

    ngOnDestroy() {
        if (this.component) {
            this.component.destroy();
            this.component = null;
        }
    }
}
