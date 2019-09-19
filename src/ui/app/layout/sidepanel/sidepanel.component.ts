import {Component, EventEmitter, Output, Input} from '@angular/core';
import {Router, NavigationEnd, ActivationEnd} from '@angular/router';
import {BehaviorSubject, Observable} from 'rxjs';
import {map} from 'rxjs/operators';
import {TranslateService} from '@ngx-translate/core';

import {SidepanelLinksComponent} from '../sidepanel-links/sidepanel-links.component';
import {VectorToolsTabComponent} from 'symbiota-spatial';
import {PointToolsTabComponent} from 'symbiota-spatial';
import {LayoutComponent} from '../layout/layout.component';

import {PluginTabService} from 'symbiota-plugin';
import {ConfigurationService} from 'symbiota-shared';

@Component({
    selector: 'sidepanel-outlet',
    templateUrl: './sidepanel.component.html',
    styleUrls: ['./sidepanel.component.css']
})
export class SidepanelComponent {
    @Input() fullWindow: boolean;
    @Output() sidenavToggle = new EventEmitter<void>();

    tabsArr = [];
    domain: string;
    link_tab_text: string;
    vector_tools_tab_text: string;
    point_tools_tab_text: string;
    tabsArrSubject = new BehaviorSubject<any[]>([]);
    tabsArr$: Observable<any[]> = this.tabsArrSubject.asObservable().pipe(
        map(arr => arr)
    );

    linksTab = {
        'tab_text': this.link_tab_text,
        'index': 5,
        'component': SidepanelLinksComponent
    };

    vectorToolsTab = {
        'tab_text': this.vector_tools_tab_text,
        'index': 10,
        'component': VectorToolsTabComponent
    };

    pointToolsTab = {
        'tab_text': this.point_tools_tab_text,
        'index': 20,
        'component': PointToolsTabComponent
    };

    constructor(
        private tabsService: PluginTabService,
        private router: Router,
        private layoutComponent: LayoutComponent,
        private translate: TranslateService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(value => {
            this.translate.use(value);
            setTimeout(() => {
                this.setTranslations();
            }, 100);
        });
        this.router.events.subscribe((val) => {
            if (val instanceof NavigationEnd) {
                if (this.layoutComponent.sidenavOpenState) {
                    this.toggleSidenav();
                }
                const currentUrl = this.router.url.toString();
                const currentDomain = currentUrl.split('/')[1];
                const outletId = 'sidenav-' + currentDomain;
                this.tabsService.getOutletTabs(outletId).forEach((tab, index) => {
                    this.addTabToTabsArr(tab);
                });
                this.addTabToTabsArr(this.linksTab);
            }
            if (val instanceof ActivationEnd) {
                if (val.snapshot.routeConfig.path !== this.domain) {
                    this.domain = val.snapshot.routeConfig.path;
                    this.clearTabsArr();
                }
                if (val.snapshot.data.spatial) {
                    this.addTabToTabsArr(this.vectorToolsTab);
                    this.addTabToTabsArr(this.pointToolsTab);
                }
            }
        });
    }

    setTranslations() {
        this.translate.get('core.layout.sidepanel.link_tab_text').subscribe((res: string) => {
            this.link_tab_text = res;
            this.linksTab.tab_text = res;
        });
        this.translate.get('core.layout.sidepanel.vector_tools_tab_text').subscribe((res: string) => {
            this.vector_tools_tab_text = res;
            this.vectorToolsTab.tab_text = res;
        });
        this.translate.get('core.layout.sidepanel.point_tools_tab_text').subscribe((res: string) => {
            this.point_tools_tab_text = res;
            this.pointToolsTab.tab_text = res;
        });
    }

    addTabToTabsArr(tab: any) {
        const currentArr = this.tabsArrSubject.value;
        const updatedArr = [...currentArr, tab];
        updatedArr.sort((a, b) => a.index - b.index);
        this.tabsArrSubject.next(updatedArr);
    }

    clearTabsArr() {
        this.tabsArrSubject.next([]);
    }

    toggleSidenav() {
        this.sidenavToggle.emit();
    }
}
