import {
    Component,
    OnInit,
    AfterViewInit,
    OnDestroy,
    Injector,
    ViewChild,
    ViewContainerRef,
    Compiler,
    ComponentRef,
    Input, Output, EventEmitter
} from '@angular/core';
import {ActivatedRoute} from '@angular/router';

declare const SystemJS: any;

@Component({
    selector: 'app-plugin-outlet',
    templateUrl: './plugin-outlet.component.html',
    styleUrls: ['./plugin-outlet.component.css']
})
export class PluginOutletComponent implements OnInit, AfterViewInit, OnDestroy {
    @ViewChild('content',  { read: ViewContainerRef, static: false }) content: ViewContainerRef;
    @Input() file: string;
    @Input() module: string;
    @Input() provider: string;
    @Input() params: any;
    @Input() child = false;
    @Output() changeEmitter = new EventEmitter<any>();

    component: ComponentRef<any>;

    constructor(
        private route: ActivatedRoute,
        private injector: Injector,
        private compiler: Compiler
    ) {}

    ngOnInit() {
        if (!this.child) {
            this.file = this.route.snapshot.data.file;
            this.module = this.route.snapshot.data.module;
            this.provider = this.route.snapshot.data.provider;
            if (this.route.snapshot.data.params) {
                this.params = this.route.snapshot.data.params;
            }
        }
    }

    ngAfterViewInit() {
        this.loadComponent();
    }

    private async loadComponent() {
        const module = await SystemJS.import('assets/js/plugins/' + this.file);
        const moduleFactory = this.compiler.compileModuleSync<any>(module[this.module]);
        const moduleRef = moduleFactory.create(this.injector);
        const componentProvider = moduleRef.injector.get(this.provider);
        const componentFactory = moduleRef.componentFactoryResolver.resolveComponentFactory<any>(
            componentProvider[0][0].component
        );

        this.component = this.content.createComponent(componentFactory);
        this.component.instance.params = this.params;
        if (this.component.instance.changeEmitter) {
            this.component.instance.changeEmitter.subscribe((data) => {
                this.changeEmitter.emit(data);
            });
        }
    }

    ngOnDestroy() {
        if (this.component) {
            this.component.destroy();
            this.component = null;
        }
    }
}
