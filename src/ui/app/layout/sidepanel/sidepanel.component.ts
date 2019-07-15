import {Component, EventEmitter, Output, Input} from '@angular/core';
import {Router, NavigationEnd, ActivationEnd} from '@angular/router';
import {BehaviorSubject, Observable} from 'rxjs';

import {SidepanelLinksComponent} from '../sidepanel-links/sidepanel-links.component';
import {VectorToolsTabComponent} from '../../spatial/vector-tools-tab/vector-tools-tab.component';
import {LayoutComponent} from '../layout/layout.component';

import {PluginTabService} from 'symbiota-plugin';
import {Layer} from '../../../../../plugins/symbiota-spatial/src/lib/layer.model';
import {map} from 'rxjs/operators';

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
    tabsArrSubject = new BehaviorSubject<any[]>([]);
    tabsArr$: Observable<any[]> = this.tabsArrSubject.asObservable().pipe(
        map(arr => arr)
    );

    linksTab = {
        'tab_text': 'Links',
        'index': 5,
        'component': SidepanelLinksComponent
    };

    vectorTab = {
        'tab_text': 'Vector',
        'index': 20,
        'component': VectorToolsTabComponent
    };

    constructor(
        private tabsService: PluginTabService,
        private router: Router,
        private layoutComponent: LayoutComponent
    ) {
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
                    this.addTabToTabsArr(this.vectorTab);
                }
            }
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
