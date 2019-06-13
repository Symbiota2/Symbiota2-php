import { Injectable, ɵɵdefineInjectable, Component, ViewChild, NgModule } from '@angular/core';
import { SelectionModel } from '@angular/cdk/collections';
import { FlatTreeControl } from '@angular/cdk/tree';
import { MatTreeFlattener, MatTreeFlatDataSource } from '@angular/material/tree';
import { BehaviorSubject } from 'rxjs';
import { MatTreeModule, MatCheckboxModule, MatIconModule, MatButtonModule } from '@angular/material';
import { FlexLayoutModule } from '@angular/flex-layout';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
class CollectionListService {
    constructor() {
        this.collections = {
            root: {
                1: {
                    name: 'Southwest',
                    collections: [
                        { collid: 10, collname: 'Coll 10', colltype: 'specimen' },
                        { collid: 11, collname: 'Coll 11', colltype: 'observation' },
                        { collid: 12, collname: 'Coll 12', colltype: 'specimen' }
                    ]
                },
                2: {
                    name: 'Northwest',
                    collections: [
                        { collid: 20, collname: 'Coll 20', colltype: 'specimen' },
                        { collid: 21, collname: 'Coll 21', colltype: 'observation' },
                        { collid: 22, collname: 'Coll 22', colltype: 'specimen' }
                    ]
                },
                3: {
                    name: 'Rocky Mountain',
                    collections: [
                        { collid: 30, collname: 'Coll 30', colltype: 'specimen' },
                        { collid: 31, collname: 'Coll 31', colltype: 'observation' },
                        { collid: 32, collname: 'Coll 32', colltype: 'specimen' }
                    ]
                },
                col40: { collid: 40, collname: 'Coll 40', colltype: 'specimen' },
                col41: { collid: 41, collname: 'Coll 41', colltype: 'specimen' },
                col42: { collid: 42, collname: 'Coll 42', colltype: 'specimen' }
            }
        };
    }
    /**
     * @return {?}
     */
    getCollections() {
        return this.collections;
    }
}
CollectionListService.decorators = [
    { type: Injectable, args: [{
                providedIn: 'root'
            },] }
];
/** @nocollapse */ CollectionListService.ngInjectableDef = ɵɵdefineInjectable({ factory: function CollectionListService_Factory() { return new CollectionListService(); }, token: CollectionListService, providedIn: "root" });

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
class DataNode {
}
class DataFlatNode {
}
class CollectionsListData {
    /**
     * @param {?} collectionListService
     */
    constructor(collectionListService) {
        this.collectionListService = collectionListService;
        this.dataChange = new BehaviorSubject([]);
        this.initialize(this.collectionListService.getCollections());
    }
    /**
     * @param {?} collections
     * @return {?}
     */
    initialize(collections) {
        /** @type {?} */
        const data = this.buildFileTree(collections, 0);
        this.dataChange.next(data);
    }
    /**
     * @param {?} obj
     * @param {?} level
     * @return {?}
     */
    buildFileTree(obj, level) {
        return Object.keys(obj).reduce((/**
         * @param {?} accumulator
         * @param {?} key
         * @return {?}
         */
        (accumulator, key) => {
            /** @type {?} */
            let value;
            /** @type {?} */
            const node = new DataNode();
            if (obj[key].collname) {
                value = obj[key];
                node.name = obj[key].collname;
                node.collid = obj[key].collid;
            }
            else {
                if (key === 'root') {
                    value = obj[key];
                    node.name = key;
                }
                else {
                    value = obj[key].collections;
                    node.name = obj[key].name;
                }
                node.children = this.buildFileTree(value, level + 1);
            }
            return accumulator.concat(node);
        }), []);
    }
}
CollectionsListData.decorators = [
    { type: Injectable }
];
/** @nocollapse */
CollectionsListData.ctorParameters = () => [
    { type: CollectionListService }
];
class CollectionCheckboxListComponent {
    /**
     * @param {?} database
     */
    constructor(database) {
        this.database = database;
        this.flatNodeMap = new Map();
        this.nestedNodeMap = new Map();
        this.checklistSelection = new SelectionModel(true /* multiple */);
        this.getLevel = (/**
         * @param {?} node
         * @return {?}
         */
        (node) => node.level);
        this.isExpandable = (/**
         * @param {?} node
         * @return {?}
         */
        (node) => node.expandable);
        this.getChildren = (/**
         * @param {?} node
         * @return {?}
         */
        (node) => node.children);
        this.hasChild = (/**
         * @param {?} _
         * @param {?} _nodeData
         * @return {?}
         */
        (_, _nodeData) => _nodeData.expandable);
        this.transformer = (/**
         * @param {?} node
         * @param {?} level
         * @return {?}
         */
        (node, level) => {
            /** @type {?} */
            const existingNode = this.nestedNodeMap.get(node);
            /** @type {?} */
            const flatNode = existingNode && existingNode.name === node.name
                ? existingNode
                : new DataFlatNode();
            flatNode.name = node.name;
            flatNode.collid = node.collid;
            flatNode.level = level;
            flatNode.expandable = !!node.children;
            this.flatNodeMap.set(flatNode, node);
            this.nestedNodeMap.set(node, flatNode);
            return flatNode;
        });
        this.treeFlattener = new MatTreeFlattener(this.transformer, this.getLevel, this.isExpandable, this.getChildren);
        this.treeControl = new FlatTreeControl(this.getLevel, this.isExpandable);
        this.dataSource = new MatTreeFlatDataSource(this.treeControl, this.treeFlattener);
        database.dataChange.subscribe((/**
         * @param {?} data
         * @return {?}
         */
        data => {
            this.dataSource.data = data;
        }));
    }
    /**
     * @param {?} node
     * @return {?}
     */
    descendantsAllSelected(node) {
        /** @type {?} */
        const descendants = this.treeControl.getDescendants(node);
        return descendants.every((/**
         * @param {?} child
         * @return {?}
         */
        child => this.checklistSelection.isSelected(child)));
    }
    /**
     * @param {?} node
     * @return {?}
     */
    descendantsPartiallySelected(node) {
        /** @type {?} */
        const descendants = this.treeControl.getDescendants(node);
        /** @type {?} */
        const result = descendants.some((/**
         * @param {?} child
         * @return {?}
         */
        child => this.checklistSelection.isSelected(child)));
        return result && !this.descendantsAllSelected(node);
    }
    /**
     * @param {?} node
     * @return {?}
     */
    todoItemSelectionToggle(node) {
        this.checklistSelection.toggle(node);
        /** @type {?} */
        const descendants = this.treeControl.getDescendants(node);
        this.checklistSelection.isSelected(node)
            ? this.checklistSelection.select(...descendants)
            : this.checklistSelection.deselect(...descendants);
    }
    /**
     * @return {?}
     */
    ngAfterViewInit() {
        this.treeControl.expand(this.tree.treeControl.dataNodes[0]);
    }
}
CollectionCheckboxListComponent.decorators = [
    { type: Component, args: [{
                selector: 'collection-checkbox-list',
                template: "<mat-tree #colltree [dataSource]=\"dataSource\" [treeControl]=\"treeControl\">\n    <mat-tree-node *matTreeNodeDef=\"let node\" matTreeNodeToggle matTreeNodePadding>\n        <button mat-icon-button disabled></button>\n        <mat-checkbox class=\"checklist-leaf-node\"\n                      [checked]=\"checklistSelection.isSelected(node)\"\n                      (change)=\"checklistSelection.toggle(node);\">{{node.name}}\n        </mat-checkbox>\n    </mat-tree-node>\n\n    <mat-tree-node *matTreeNodeDef=\"let node; when: hasChild\" matTreeNodePadding>\n        <button mat-icon-button matTreeNodeToggle\n                [attr.aria-label]=\"'toggle ' + node.filename\" *ngIf=\"treeControl.getLevel(node) > 0\">\n            <mat-icon class=\"mat-icon-rtl-mirror\">\n                {{treeControl.isExpanded(node) ? 'expand_more' : 'chevron_right'}}\n            </mat-icon>\n        </button>\n        <button mat-icon-button disabled *ngIf=\"treeControl.getLevel(node) === 0\"></button>\n        <mat-checkbox [checked]=\"descendantsAllSelected(node)\"\n                      [indeterminate]=\"descendantsPartiallySelected(node)\"\n                      (change)=\"todoItemSelectionToggle(node)\" *ngIf=\"treeControl.getLevel(node) > 0\">\n            {{node.name}}\n        </mat-checkbox>\n        <mat-checkbox [checked]=\"descendantsAllSelected(node)\"\n                      [indeterminate]=\"descendantsPartiallySelected(node)\"\n                      (change)=\"todoItemSelectionToggle(node)\" *ngIf=\"treeControl.getLevel(node) === 0\">\n            Select all\n        </mat-checkbox>\n    </mat-tree-node>\n</mat-tree>\n",
                providers: [CollectionsListData],
                styles: [".mat-list-icon{color:rgba(0,0,0,.54)}"]
            }] }
];
/** @nocollapse */
CollectionCheckboxListComponent.ctorParameters = () => [
    { type: CollectionsListData }
];
CollectionCheckboxListComponent.propDecorators = {
    tree: [{ type: ViewChild, args: ['colltree', { static: false },] }]
};

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
const ɵ0 = [{
        name: 'collection-collection-checkbox-list',
        component: CollectionCheckboxListComponent
    }];
class CollectionModule {
}
CollectionModule.decorators = [
    { type: NgModule, args: [{
                declarations: [
                    CollectionCheckboxListComponent
                ],
                imports: [
                    MatTreeModule,
                    MatCheckboxModule,
                    MatIconModule,
                    MatButtonModule,
                    FlexLayoutModule,
                    ReactiveFormsModule,
                    FormsModule,
                    CommonModule
                ],
                exports: [
                    CollectionCheckboxListComponent
                ],
                entryComponents: [
                    CollectionCheckboxListComponent
                ],
                providers: [
                    CollectionListService,
                    {
                        provide: 'collection-checkbox-list',
                        useValue: ɵ0,
                        multi: true
                    }
                ]
            },] }
];

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */

export { CollectionCheckboxListComponent, CollectionListService, CollectionModule, CollectionsListData, DataFlatNode, DataNode };
//# sourceMappingURL=collection.js.map
