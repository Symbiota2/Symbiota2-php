/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
import * as tslib_1 from "tslib";
import { Component, Injectable, ViewChild } from '@angular/core';
import { SelectionModel } from '@angular/cdk/collections';
import { FlatTreeControl } from '@angular/cdk/tree';
import { MatTreeFlatDataSource, MatTreeFlattener } from '@angular/material/tree';
import { BehaviorSubject } from 'rxjs';
import { CollectionListService } from './collection-list.service';
var DataNode = /** @class */ (function () {
    function DataNode() {
    }
    return DataNode;
}());
export { DataNode };
if (false) {
    /** @type {?} */
    DataNode.prototype.name;
    /** @type {?} */
    DataNode.prototype.collid;
    /** @type {?} */
    DataNode.prototype.children;
}
var DataFlatNode = /** @class */ (function () {
    function DataFlatNode() {
    }
    return DataFlatNode;
}());
export { DataFlatNode };
if (false) {
    /** @type {?} */
    DataFlatNode.prototype.name;
    /** @type {?} */
    DataFlatNode.prototype.collid;
    /** @type {?} */
    DataFlatNode.prototype.level;
    /** @type {?} */
    DataFlatNode.prototype.expandable;
}
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
export { CollectionsListData };
if (false) {
    /** @type {?} */
    CollectionsListData.prototype.dataChange;
    /**
     * @type {?}
     * @private
     */
    CollectionsListData.prototype.collectionListService;
}
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
            ? (_a = this.checklistSelection).select.apply(_a, tslib_1.__spread(descendants)) : (_b = this.checklistSelection).deselect.apply(_b, tslib_1.__spread(descendants));
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
export { CollectionCheckboxListComponent };
if (false) {
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.tree;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.flatNodeMap;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.nestedNodeMap;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.treeControl;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.treeFlattener;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.dataSource;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.checklistSelection;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.getLevel;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.isExpandable;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.getChildren;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.hasChild;
    /** @type {?} */
    CollectionCheckboxListComponent.prototype.transformer;
    /**
     * @type {?}
     * @private
     */
    CollectionCheckboxListComponent.prototype.database;
}
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiY29sbGVjdGlvbi1jaGVja2JveC1saXN0LmNvbXBvbmVudC5qcyIsInNvdXJjZVJvb3QiOiJuZzovL2NvbGxlY3Rpb24vIiwic291cmNlcyI6WyJsaWIvY29sbGVjdGlvbi1jaGVja2JveC1saXN0LmNvbXBvbmVudC50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7OztBQUFBLE9BQU8sRUFBZ0IsU0FBUyxFQUFFLFVBQVUsRUFBRSxTQUFTLEVBQUMsTUFBTSxlQUFlLENBQUM7QUFDOUUsT0FBTyxFQUFDLGNBQWMsRUFBQyxNQUFNLDBCQUEwQixDQUFDO0FBQ3hELE9BQU8sRUFBQyxlQUFlLEVBQUMsTUFBTSxtQkFBbUIsQ0FBQztBQUNsRCxPQUFPLEVBQUMscUJBQXFCLEVBQUUsZ0JBQWdCLEVBQUMsTUFBTSx3QkFBd0IsQ0FBQztBQUMvRSxPQUFPLEVBQUMsZUFBZSxFQUFDLE1BQU0sTUFBTSxDQUFDO0FBQ3JDLE9BQU8sRUFBQyxxQkFBcUIsRUFBQyxNQUFNLDJCQUEyQixDQUFDO0FBRWhFO0lBQUE7SUFJQSxDQUFDO0lBQUQsZUFBQztBQUFELENBQUMsQUFKRCxJQUlDOzs7O0lBSEcsd0JBQWE7O0lBQ2IsMEJBQWU7O0lBQ2YsNEJBQXFCOztBQUd6QjtJQUFBO0lBS0EsQ0FBQztJQUFELG1CQUFDO0FBQUQsQ0FBQyxBQUxELElBS0M7Ozs7SUFKRyw0QkFBYTs7SUFDYiw4QkFBZTs7SUFDZiw2QkFBYzs7SUFDZCxrQ0FBb0I7O0FBR3hCO0lBSUksNkJBQ1kscUJBQTRDO1FBQTVDLDBCQUFxQixHQUFyQixxQkFBcUIsQ0FBdUI7UUFIeEQsZUFBVSxHQUFHLElBQUksZUFBZSxDQUFhLEVBQUUsQ0FBQyxDQUFDO1FBSzdDLElBQUksQ0FBQyxVQUFVLENBQUMsSUFBSSxDQUFDLHFCQUFxQixDQUFDLGNBQWMsRUFBRSxDQUFDLENBQUM7SUFDakUsQ0FBQzs7Ozs7SUFFRCx3Q0FBVTs7OztJQUFWLFVBQVcsV0FBVzs7WUFDWixJQUFJLEdBQUcsSUFBSSxDQUFD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bUIsQ0FBQzs7aUJBQ25DOzs7O2dCQWlCaUMsbUJBQW1COzs7dUJBZGhELFNBQVMsU0FBQyxVQUFVLEVBQUUsRUFBQyxNQUFNLEVBQUUsS0FBSyxFQUFDOztJQXNFMUMsc0NBQUM7Q0FBQSxBQTlFRCxJQThFQztTQXhFWSwrQkFBK0I7OztJQUV4QywrQ0FBNkM7O0lBRTdDLHNEQUFnRDs7SUFFaEQsd0RBQWtEOztJQUVsRCxzREFBMkM7O0lBRTNDLHdEQUF3RDs7SUFFeEQscURBQTBEOztJQUUxRCw2REFBMkU7O0lBYTNFLG1EQUE4Qzs7SUFFOUMsdURBQXVEOztJQUV2RCxzREFBNEQ7O0lBRTVELG1EQUF3RTs7SUFFeEUsc0RBWUM7Ozs7O0lBL0JXLG1EQUFxQyIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCB7QWZ0ZXJWaWV3SW5pdCwgQ29tcG9uZW50LCBJbmplY3RhYmxlLCBWaWV3Q2hpbGR9IGZyb20gJ0Bhbmd1bGFyL2NvcmUnO1xuaW1wb3J0IHtTZWxlY3Rpb25Nb2RlbH0gZnJvbSAnQGFuZ3VsYXIvY2RrL2NvbGxlY3Rpb25zJztcbmltcG9ydCB7RmxhdFRyZWVDb250cm9sfSBmcm9tICdAYW5ndWxhci9jZGsvdHJlZSc7XG5pbXBvcnQge01hdFRyZWVGbGF0RGF0YVNvdXJjZSwgTWF0VHJlZUZsYXR0ZW5lcn0gZnJvbSAnQGFuZ3VsYXIvbWF0ZXJpYWwvdHJlZSc7XG5pbXBvcnQge0JlaGF2aW9yU3ViamVjdH0gZnJvbSAncnhqcyc7XG5pbXBvcnQge0NvbGxlY3Rpb25MaXN0U2VydmljZX0gZnJvbSAnLi9jb2xsZWN0aW9uLWxpc3Quc2VydmljZSc7XG5cbmV4cG9ydCBjbGFzcyBEYXRhTm9kZSB7XG4gICAgbmFtZTogc3RyaW5nO1xuICAgIGNvbGxpZDogbnVtYmVyO1xuICAgIGNoaWxkcmVuOiBEYXRhTm9kZVtdO1xufVxuXG5leHBvcnQgY2xhc3MgRGF0YUZsYXROb2RlIHtcbiAgICBuYW1lOiBzdHJpbmc7XG4gICAgY29sbGlkOiBudW1iZXI7XG4gICAgbGV2ZWw6IG51bWJlcjtcbiAgICBleHBhbmRhYmxlOiBib29sZWFuO1xufVxuXG5ASW5qZWN0YWJsZSgpXG5leHBvcnQgY2xhc3MgQ29sbGVjdGlvbnNMaXN0RGF0YSB7XG4gICAgZGF0YUNoYW5nZSA9IG5ldyBCZWhhdmlvclN1YmplY3Q8RGF0YU5vZGVbXT4oW10pO1xuXG4gICAgY29uc3RydWN0b3IoXG4gICAgICAgIHByaXZhdGUgY29sbGVjdGlvbkxpc3RTZXJ2aWNlOiBDb2xsZWN0aW9uTGlzdFNlcnZpY2VcbiAgICApIHtcbiAgICAgICAgdGhpcy5pbml0aWFsaXplKHRoaXMuY29sbGVjdGlvbkxpc3RTZXJ2aWNlLmdldENvbGxlY3Rpb25zKCkpO1xuICAgIH1cblxuICAgIGluaXRpYWxpemUoY29sbGVjdGlvbnMpIHtcbiAgICAgICAgY29uc3QgZGF0YSA9IHRoaXMuYnVpbGRGaWxlVHJlZShjb2xsZWN0aW9ucywgMCk7XG4gICAgICAgIHRoaXMuZGF0YUNoYW5nZS5uZXh0KGRhdGEpO1xuICAgIH1cblxuICAgIGJ1aWxkRmlsZVRyZWUob2JqOiBvYmplY3QsIGxldmVsOiBudW1iZXIpOiBEYXRhTm9kZVtdIHtcbiAgICAgICAgcmV0dXJuIE9iamVjdC5rZXlzKG9iaikucmVkdWNlPERhdGFOb2RlW10+KChhY2N1bXVsYXRvciwga2V5KSA9PiB7XG4gICAgICAgICAgICBsZXQgdmFsdWU7XG4gICAgICAgICAgICBjb25zdCBub2RlID0gbmV3IERhdGFOb2RlKCk7XG4gICAgICAgICAgICBpZiAob2JqW2tleV0uY29sbG5hbWUpIHtcbiAgICAgICAgICAgICAgICB2YWx1ZSA9IG9ialtrZXldO1xuICAgICAgICAgICAgICAgIG5vZGUubmFtZSA9IG9ialtrZXldLmNvbGxuYW1lO1xuICAgICAgICAgICAgICAgIG5vZGUuY29sbGlkID0gb2JqW2tleV0uY29sbGlkO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICBpZiAoa2V5ID09PSAncm9vdCcpIHtcbiAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBvYmpba2V5XTtcbiAgICAgICAgICAgICAgICAgICAgbm9kZS5uYW1lID0ga2V5O1xuICAgICAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgICAgICAgIHZhbHVlID0gb2JqW2tleV0uY29sbGVjdGlvbnM7XG4gICAgICAgICAgICAgICAgICAgIG5vZGUubmFtZSA9IG9ialtrZXldLm5hbWU7XG4gICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIG5vZGUuY2hpbGRyZW4gPSB0aGlzLmJ1aWxkRmlsZVRyZWUodmFsdWUsIGxldmVsICsgMSk7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIHJldHVybiBhY2N1bXVsYXRvci5jb25jYXQobm9kZSk7XG4gICAgICAgIH0sIFtdKTtcbiAgICB9XG59XG5cbkBDb21wb25lbnQoe1xuICAgIHNlbGVjdG9yOiAnY29sbGVjdGlvbi1jaGVja2JveC1saXN0JyxcbiAgICB0ZW1wbGF0ZVVybDogJy4vY29sbGVjdGlvbi1jaGVja2JveC1saXN0LmNvbXBvbmVudC5odG1sJyxcbiAgICBzdHlsZVVybHM6IFsnLi9jb2xsZWN0aW9uLWNoZWNrYm94LWxpc3QuY29tcG9uZW50LmNzcyddLFxuICAgIHByb3ZpZGVyczogW0NvbGxlY3Rpb25zTGlzdERhdGFdXG59KVxuZXhwb3J0IGNsYXNzIENvbGxlY3Rpb25DaGVja2JveExpc3RDb21wb25lbnQgaW1wbGVtZW50cyBBZnRlclZpZXdJbml0IHtcblxuICAgIEBWaWV3Q2hpbGQoJ2NvbGx0cmVlJywge3N0YXRpYzogZmFsc2V9KSB0cmVlO1xuXG4gICAgZmxhdE5vZGVNYXAgPSBuZXcgTWFwPERhdGFGbGF0Tm9kZSwgRGF0YU5vZGU+KCk7XG5cbiAgICBuZXN0ZWROb2RlTWFwID0gbmV3IE1hcDxEYXRhTm9kZSwgRGF0YUZsYXROb2RlPigpO1xuXG4gICAgdHJlZUNvbnRyb2w6IEZsYXRUcmVlQ29udHJvbDxEYXRhRmxhdE5vZGU+O1xuXG4gICAgdHJlZUZsYXR0ZW5lcjogTWF0VHJlZUZsYXR0ZW5lcjxEYXRhTm9kZSwgRGF0YUZsYXROb2RlPjtcblxuICAgIGRhdGFTb3VyY2U6IE1hdFRyZWVGbGF0RGF0YVNvdXJjZTxEYXRhTm9kZSwgRGF0YUZsYXROb2RlPjtcblxuICAgIGNoZWNrbGlzdFNlbGVjdGlvbiA9IG5ldyBTZWxlY3Rpb25Nb2RlbDxEYXRhRmxhdE5vZGU+KHRydWUgLyogbXVsdGlwbGUgKi8pO1xuXG4gICAgY29uc3RydWN0b3IocHJpdmF0ZSBkYXRhYmFzZTogQ29sbGVjdGlvbnNMaXN0RGF0YSkge1xuICAgICAgICB0aGlzLnRyZWVGbGF0dGVuZXIgPSBuZXcgTWF0VHJlZUZsYXR0ZW5lcih0aGlzLnRyYW5zZm9ybWVyLCB0aGlzLmdldExldmVsLFxuICAgICAgICAgICAgdGhpcy5pc0V4cGFuZGFibGUsIHRoaXMuZ2V0Q2hpbGRyZW4pO1xuICAgICAgICB0aGlzLnRyZWVDb250cm9sID0gbmV3IEZsYXRUcmVlQ29udHJvbDxEYXRhRmxhdE5vZGU+KHRoaXMuZ2V0TGV2ZWwsIHRoaXMuaXNFeHBhbmRhYmxlKTtcbiAgICAgICAgdGhpcy5kYXRhU291cmNlID0gbmV3IE1hdFRyZWVGbGF0RGF0YVNvdXJjZSh0aGlzLnRyZWVDb250cm9sLCB0aGlzLnRyZWVGbGF0dGVuZXIpO1xuXG4gICAgICAgIGRhdGFiYXNlLmRhdGFDaGFuZ2Uuc3Vic2NyaWJlKGRhdGEgPT4ge1xuICAgICAgICAgICAgdGhpcy5kYXRhU291cmNlLmRhdGEgPSBkYXRhO1xuICAgICAgICB9KTtcbiAgICB9XG5cbiAgICBnZXRMZXZlbCA9IChub2RlOiBEYXRhRmxhdE5vZGUpID0+IG5vZGUubGV2ZWw7XG5cbiAgICBpc0V4cGFuZGFibGUgPSAobm9kZTogRGF0YUZsYXROb2RlKSA9PiBub2RlLmV4cGFuZGFibGU7XG5cbiAgICBnZXRDaGlsZHJlbiA9IChub2RlOiBEYXRhTm9kZSk6IERhdGFOb2RlW10gPT4gbm9kZS5jaGlsZHJlbjtcblxuICAgIGhhc0NoaWxkID0gKF86IG51bWJlciwgX25vZGVEYXRhOiBEYXRhRmxhdE5vZGUpID0+IF9ub2RlRGF0YS5leHBhbmRhYmxlO1xuXG4gICAgdHJhbnNmb3JtZXIgPSAobm9kZTogRGF0YU5vZGUsIGxldmVsOiBudW1iZXIpID0+IHtcbiAgICAgICAgY29uc3QgZXhpc3RpbmdOb2RlID0gdGhpcy5uZXN0ZWROb2RlTWFwLmdldChub2RlKTtcbiAgICAgICAgY29uc3QgZmxhdE5vZGUgPSBleGlzdGluZ05vZGUgJiYgZXhpc3RpbmdOb2RlLm5hbWUgPT09IG5vZGUubmFtZVxuICAgICAgICAgICAgPyBleGlzdGluZ05vZGVcbiAgICAgICAgICAgIDogbmV3IERhdGFGbGF0Tm9kZSgpO1xuICAgICAgICBmbGF0Tm9kZS5uYW1lID0gbm9kZS5uYW1lO1xuICAgICAgICBmbGF0Tm9kZS5jb2xsaWQgPSBub2RlLmNvbGxpZDtcbiAgICAgICAgZmxhdE5vZGUubGV2ZWwgPSBsZXZlbDtcbiAgICAgICAgZmxhdE5vZGUuZXhwYW5kYWJsZSA9ICEhbm9kZS5jaGlsZHJlbjtcbiAgICAgICAgdGhpcy5mbGF0Tm9kZU1hcC5zZXQoZmxhdE5vZGUsIG5vZGUpO1xuICAgICAgICB0aGlzLm5lc3RlZE5vZGVNYXAuc2V0KG5vZGUsIGZsYXROb2RlKTtcbiAgICAgICAgcmV0dXJuIGZsYXROb2RlO1xuICAgIH1cblxuICAgIGRlc2NlbmRhbnRzQWxsU2VsZWN0ZWQobm9kZTogRGF0YUZsYXROb2RlKTogYm9vbGVhbiB7XG4gICAgICAgIGNvbnN0IGRlc2NlbmRhbnRzID0gdGhpcy50cmVlQ29udHJvbC5nZXREZXNjZW5kYW50cyhub2RlKTtcbiAgICAgICAgcmV0dXJuIGRlc2NlbmRhbnRzLmV2ZXJ5KGNoaWxkID0+IHRoaXMuY2hlY2tsaXN0U2VsZWN0aW9uLmlzU2VsZWN0ZWQoY2hpbGQpKTtcbiAgICB9XG5cbiAgICBkZXNjZW5kYW50c1BhcnRpYWxseVNlbGVjdGVkKG5vZGU6IERhdGFGbGF0Tm9kZSk6IGJvb2xlYW4ge1xuICAgICAgICBjb25zdCBkZXNjZW5kYW50cyA9IHRoaXMudHJlZUNvbnRyb2wuZ2V0RGVzY2VuZGFudHMobm9kZSk7XG4gICAgICAgIGNvbnN0IHJlc3VsdCA9IGRlc2NlbmRhbnRzLnNvbWUoY2hpbGQgPT4gdGhpcy5jaGVja2xpc3RTZWxlY3Rpb24uaXNTZWxlY3RlZChjaGlsZCkpO1xuICAgICAgICByZXR1cm4gcmVzdWx0ICYmICF0aGlzLmRlc2NlbmRhbnRzQWxsU2VsZWN0ZWQobm9kZSk7XG4gICAgfVxuXG4gICAgdG9kb0l0ZW1TZWxlY3Rpb25Ub2dnbGUobm9kZTogRGF0YUZsYXROb2RlKTogdm9pZCB7XG4gICAgICAgIHRoaXMuY2hlY2tsaXN0U2VsZWN0aW9uLnRvZ2dsZShub2RlKTtcbiAgICAgICAgY29uc3QgZGVzY2VuZGFudHMgPSB0aGlzLnRyZWVDb250cm9sLmdldERlc2NlbmRhbnRzKG5vZGUpO1xuICAgICAgICB0aGlzLmNoZWNrbGlzdFNlbGVjdGlvbi5pc1NlbGVjdGVkKG5vZGUpXG4gICAgICAgICAgICA/IHRoaXMuY2hlY2tsaXN0U2VsZWN0aW9uLnNlbGVjdCguLi5kZXNjZW5kYW50cylcbiAgICAgICAgICAgIDogdGhpcy5jaGVja2xpc3RTZWxlY3Rpb24uZGVzZWxlY3QoLi4uZGVzY2VuZGFudHMpO1xuICAgIH1cblxuICAgIG5nQWZ0ZXJWaWV3SW5pdCgpIHtcbiAgICAgICAgdGhpcy50cmVlQ29udHJvbC5leHBhbmQodGhpcy50cmVlLnRyZWVDb250cm9sLmRhdGFOb2Rlc1swXSk7XG4gICAgfVxuXG59XG4iXX0=