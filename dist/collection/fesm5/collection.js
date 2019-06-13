import { Injectable, ɵɵdefineInjectable, Component, ViewChild, NgModule } from '@angular/core';
import { __spread } from 'tslib';
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
var CollectionListService = /** @class */ (function () {
    function CollectionListService() {
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
    CollectionListService.prototype.getCollections = /**
     * @return {?}
     */
    function () {
        return this.collections;
    };
    CollectionListService.decorators = [
        { type: Injectable, args: [{
                    providedIn: 'root'
                },] }
    ];
    /** @nocollapse */ CollectionListService.ngInjectableDef = ɵɵdefineInjectable({ factory: function CollectionListService_Factory() { return new CollectionListService(); }, token: CollectionListService, providedIn: "root" });
    return CollectionListService;
}());

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var DataNode = /** @class */ (function () {
    function DataNode() {
    }
    return DataNode;
}());
var DataFlatNode = /** @class */ (function () {
    function DataFlatNode() {
    }
    return DataFlatNode;
}());
var CollectionsListData = /** @class */ (function () {
    function CollectionsListData(collectionListService) {
        this.collectionListService = collectionListService;
        this.dataChange = new BehaviorSubject([]);
        this.initialize(this.collectionListService.getCollections());
    }
    /**
     * @param {?} collections
     * @return {?}
     */
    CollectionsListData.prototype.initialize = /**
     * @param {?} collections
     * @return {?}
     */
    function (collections) {
        /** @type {?} */
        var data = this.buildFileTree(collections, 0);
        this.dataChange.next(data);
    };
    /**
     * @param {?} obj
     * @param {?} level
     * @return {?}
     */
    CollectionsListData.prototype.buildFileTree = /**
     * @param {?} obj
     * @param {?} level
     * @return {?}
     */
    function (obj, level) {
        var _this = this;
        return Object.keys(obj).reduce((/**
         * @param {?} accumulator
         * @param {?} key
         * @return {?}
         */
        function (accumulator, key) {
            /** @type {?} */
            var value;
            /** @type {?} */
            var node = new DataNode();
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
                node.children = _this.buildFileTree(value, level + 1);
            }
            return accumulator.concat(node);
        }), []);
    };
    CollectionsListData.decorators = [
        { type: Injectable }
    ];
    /** @nocollapse */
    CollectionsListData.ctorParameters = function () { return [
        { type: CollectionListService }
    ]; };
    return CollectionsListData;
}());
var CollectionCheckboxListComponent = /** @class */ (function () {
    function CollectionCheckboxListComponent(database) {
        var _this = this;
        this.database = database;
        this.flatNodeMap = new Map();
        this.nestedNodeMap = new Map();
        this.checklistSelection = new SelectionModel(true /* multiple */);
        this.getLevel = (/**
         * @param {?} node
         * @return {?}
         */
        function (node) { return node.level; });
        this.isExpandable = (/**
         * @param {?} node
         * @return {?}
         */
        function (node) { return node.expandable; });
        this.getChildren = (/**
         * @param {?} node
         * @return {?}
         */
        function (node) { return node.children; });
        this.hasChild = (/**
         * @param {?} _
         * @param {?} _nodeData
         * @return {?}
         */
        function (_, _nodeData) { return _nodeData.expandable; });
        this.transformer = (/**
         * @param {?} node
         * @param {?} level
         * @return {?}
         */
        function (node, level) {
            /** @type {?} */
            var existingNode = _this.nestedNodeMap.get(node);
            /** @type {?} */
            var flatNode = existingNode && existingNode.name === node.name
                ? existingNode
                : new DataFlatNode();
            flatNode.name = node.name;
            flatNode.collid = node.collid;
            flatNode.level = level;
            flatNode.expandable = !!node.children;
            _this.flatNodeMap.set(flatNode, node);
            _this.nestedNodeMap.set(node, flatNode);
            return flatNode;
        });
        this.treeFlattener = new MatTreeFlattener(this.transformer, this.getLevel, this.isExpandable, this.getChildren);
        this.treeControl = new FlatTreeControl(this.getLevel, this.isExpandable);
        this.dataSource = new MatTreeFlatDataSource(this.treeControl, this.treeFlattener);
        database.dataChange.subscribe((/**
         * @param {?} data
         * @return {?}
         */
        function (data) {
            _this.dataSource.data = data;
        }));
    }
    /**
     * @param {?} node
     * @return {?}
     */
    CollectionCheckboxListComponent.prototype.descendantsAllSelected = /**
     * @param {?} node
     * @return {?}
     */
    function (node) {
        var _this = this;
        /** @type {?} */
        var descendants = this.treeControl.getDescendants(node);
        return descendants.every((/**
         * @param {?} child
         * @return {?}
         */
        function (child) { return _this.checklistSelection.isSelected(child); }));
    };
    /**
     * @param {?} node
     * @return {?}
     */
    CollectionCheckboxListComponent.prototype.descendantsPartiallySelected = /**
     * @param {?} node
     * @return {?}
     */
    function (node) {
        var _this = this;
        /** @type {?} */
        var descendants = this.treeControl.getDescendants(node);
        /** @type {?} */
        var result = descendants.some((/**
         * @param {?} child
         * @return {?}
         */
        function (child) { return _this.checklistSelection.isSelected(child); }));
        return result && !this.descendantsAllSelected(node);
    };
    /**
     * @param {?} node
     * @return {?}
     */
    CollectionCheckboxListComponent.prototype.todoItemSelectionToggle = /**
     * @param {?} node
     * @return {?}
     */
    function (node) {
        var _a, _b;
        this.checklistSelection.toggle(node);
        /** @type {?} */
        var descendants = this.treeControl.getDescendants(node);
        this.checklistSelection.isSelected(node)
            ? (_a = this.checklistSelection).select.apply(_a, __spread(descendants)) : (_b = this.checklistSelection).deselect.apply(_b, __spread(descendants));
    };
    /**
     * @return {?}
     */
    CollectionCheckboxListComponent.prototype.ngAfterViewInit = /**
     * @return {?}
     */
    function () {
        this.treeControl.expand(this.tree.treeControl.dataNodes[0]);
    };
    CollectionCheckboxListComponent.decorators = [
        { type: Component, args: [{
                    selector: 'collection-checkbox-list',
                    template: "<mat-tree #colltree [dataSource]=\"dataSource\" [treeControl]=\"treeControl\">\n    <mat-tree-node *matTreeNodeDef=\"let node\" matTreeNodeToggle matTreeNodePadding>\n        <button mat-icon-button disabled></button>\n        <mat-checkbox class=\"checklist-leaf-node\"\n                      [checked]=\"checklistSelection.isSelected(node)\"\n                      (change)=\"checklistSelection.toggle(node);\">{{node.name}}\n        </mat-checkbox>\n    </mat-tree-node>\n\n    <mat-tree-node *matTreeNodeDef=\"let node; when: hasChild\" matTreeNodePadding>\n        <button mat-icon-button matTreeNodeToggle\n                [attr.aria-label]=\"'toggle ' + node.filename\" *ngIf=\"treeControl.getLevel(node) > 0\">\n            <mat-icon class=\"mat-icon-rtl-mirror\">\n                {{treeControl.isExpanded(node) ? 'expand_more' : 'chevron_right'}}\n            </mat-icon>\n        </button>\n        <button mat-icon-button disabled *ngIf=\"treeControl.getLevel(node) === 0\"></button>\n        <mat-checkbox [checked]=\"descendantsAllSelected(node)\"\n                      [indeterminate]=\"descendantsPartiallySelected(node)\"\n                      (change)=\"todoItemSelectionToggle(node)\" *ngIf=\"treeControl.getLevel(node) > 0\">\n            {{node.name}}\n        </mat-checkbox>\n        <mat-checkbox [checked]=\"descendantsAllSelected(node)\"\n                      [indeterminate]=\"descendantsPartiallySelected(node)\"\n                      (change)=\"todoItemSelectionToggle(node)\" *ngIf=\"treeControl.getLevel(node) === 0\">\n            Select all\n        </mat-checkbox>\n    </mat-tree-node>\n</mat-tree>\n",
                    providers: [CollectionsListData],
                    styles: [".mat-list-icon{color:rgba(0,0,0,.54)}"]
                }] }
    ];
    /** @nocollapse */
    CollectionCheckboxListComponent.ctorParameters = function () { return [
        { type: CollectionsListData }
    ]; };
    CollectionCheckboxListComponent.propDecorators = {
        tree: [{ type: ViewChild, args: ['colltree', { static: false },] }]
    };
    return CollectionCheckboxListComponent;
}());

/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
var ɵ0 = [{
        name: 'collection-collection-checkbox-list',
        component: CollectionCheckboxListComponent
    }];
var CollectionModule = /** @class */ (function () {
    function CollectionModule() {
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
    return CollectionModule;
}());

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
