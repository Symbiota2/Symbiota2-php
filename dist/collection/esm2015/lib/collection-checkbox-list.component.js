/**
 * @fileoverview added by tsickle
 * @suppress {checkTypes,extraRequire,missingOverride,missingReturn,unusedPrivateMembers,uselessCode} checked by tsc
 */
import { Component, Injectable, ViewChild } from '@angular/core';
import { SelectionModel } from '@angular/cdk/collections';
import { FlatTreeControl } from '@angular/cdk/tree';
import { MatTreeFlatDataSource, MatTreeFlattener } from '@angular/material/tree';
import { BehaviorSubject } from 'rxjs';
import { CollectionListService } from './collection-list.service';
export class DataNode {
}
if (false) {
    /** @type {?} */
    DataNode.prototype.name;
    /** @type {?} */
    DataNode.prototype.collid;
    /** @type {?} */
    DataNode.prototype.children;
}
export class DataFlatNode {
}
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
export class CollectionsListData {
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
if (false) {
    /** @type {?} */
    CollectionsListData.prototype.dataChange;
    /**
     * @type {?}
     * @private
     */
    CollectionsListData.prototype.collectionListService;
}
export class CollectionCheckboxListComponent {
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
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiY29sbGVjdGlvbi1jaGVja2JveC1saXN0LmNvbXBvbmVudC5qcyIsInNvdXJjZVJvb3QiOiJuZzovL2NvbGxlY3Rpb24vIiwic291cmNlcyI6WyJsaWIvY29sbGVjdGlvbi1jaGVja2JveC1saXN0LmNvbXBvbmVudC50cyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiOzs7O0FBQUEsT0FBTyxFQUFnQixTQUFTLEVBQUUsVUFBVSxFQUFFLFNBQVMsRUFBQyxNQUFNLGVBQWUsQ0FBQztBQUM5RSxPQUFPLEVBQUMsY0FBYyxFQUFDLE1BQU0sMEJBQTBCLENBQUM7QUFDeEQsT0FBTyxFQUFDLGVBQWUsRUFBQyxNQUFNLG1CQUFtQixDQUFDO0FBQ2xELE9BQU8sRUFBQyxxQkFBcUIsRUFBRSxnQkFBZ0IsRUFBQyxNQUFNLHdCQUF3QixDQUFDO0FBQy9FLE9BQU8sRUFBQyxlQUFlLEVBQUMsTUFBTSxNQUFNLENBQUM7QUFDckMsT0FBTyxFQUFDLHFCQUFxQixFQUFDLE1BQU0sMkJBQTJCLENBQUM7QUFFaEUsTUFBTSxPQUFPLFFBQVE7Q0FJcEI7OztJQUhHLHdCQUFhOztJQUNiLDBCQUFlOztJQUNmLDRCQUFxQjs7QUFHekIsTUFBTSxPQUFPLFlBQVk7Q0FLeEI7OztJQUpHLDRCQUFhOztJQUNiLDhCQUFlOztJQUNmLDZCQUFjOztJQUNkLGtDQUFvQjs7QUFJeEIsTUFBTSxPQUFPLG1CQUFtQjs7OztJQUc1QixZQUNZLHFCQUE0QztRQUE1QywwQkFBcUIsR0FBckIscUJBQXFCLENBQXVCO1FBSHhELGVBQVUsR0FBRyxJQUFJLGVBQWUsQ0FBYSxFQUFFLENBQUMsQ0FBQztRQUs3QyxJQUFJLENBQUMsVUFBVSxDQUFDLElBQUksQ0FBQyxxQkFBcUIsQ0FBQyxjQUFjLEVBQUUsQ0FBQyxDQUFDO0lBQ2pFLENBQUM7Ozs7O0lBRUQsVUFBVSxDQUFDLFdBQVc7O2NBQ1osSUFBSSxHQUFHLElBQUksQ0FBQyxhQUFhLENBQUMsV0FBVyxFQUFFLENBQUMsQ0FBQztRQUMvQyxJQUFJ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OztJQUU5Qyx1REFBdUQ7O0lBRXZELHNEQUE0RDs7SUFFNUQsbURBQXdFOztJQUV4RSxzREFZQzs7Ozs7SUEvQlcsbURBQXFDIiwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IHtBZnRlclZpZXdJbml0LCBDb21wb25lbnQsIEluamVjdGFibGUsIFZpZXdDaGlsZH0gZnJvbSAnQGFuZ3VsYXIvY29yZSc7XG5pbXBvcnQge1NlbGVjdGlvbk1vZGVsfSBmcm9tICdAYW5ndWxhci9jZGsvY29sbGVjdGlvbnMnO1xuaW1wb3J0IHtGbGF0VHJlZUNvbnRyb2x9IGZyb20gJ0Bhbmd1bGFyL2Nkay90cmVlJztcbmltcG9ydCB7TWF0VHJlZUZsYXREYXRhU291cmNlLCBNYXRUcmVlRmxhdHRlbmVyfSBmcm9tICdAYW5ndWxhci9tYXRlcmlhbC90cmVlJztcbmltcG9ydCB7QmVoYXZpb3JTdWJqZWN0fSBmcm9tICdyeGpzJztcbmltcG9ydCB7Q29sbGVjdGlvbkxpc3RTZXJ2aWNlfSBmcm9tICcuL2NvbGxlY3Rpb24tbGlzdC5zZXJ2aWNlJztcblxuZXhwb3J0IGNsYXNzIERhdGFOb2RlIHtcbiAgICBuYW1lOiBzdHJpbmc7XG4gICAgY29sbGlkOiBudW1iZXI7XG4gICAgY2hpbGRyZW46IERhdGFOb2RlW107XG59XG5cbmV4cG9ydCBjbGFzcyBEYXRhRmxhdE5vZGUge1xuICAgIG5hbWU6IHN0cmluZztcbiAgICBjb2xsaWQ6IG51bWJlcjtcbiAgICBsZXZlbDogbnVtYmVyO1xuICAgIGV4cGFuZGFibGU6IGJvb2xlYW47XG59XG5cbkBJbmplY3RhYmxlKClcbmV4cG9ydCBjbGFzcyBDb2xsZWN0aW9uc0xpc3REYXRhIHtcbiAgICBkYXRhQ2hhbmdlID0gbmV3IEJlaGF2aW9yU3ViamVjdDxEYXRhTm9kZVtdPihbXSk7XG5cbiAgICBjb25zdHJ1Y3RvcihcbiAgICAgICAgcHJpdmF0ZSBjb2xsZWN0aW9uTGlzdFNlcnZpY2U6IENvbGxlY3Rpb25MaXN0U2VydmljZVxuICAgICkge1xuICAgICAgICB0aGlzLmluaXRpYWxpemUodGhpcy5jb2xsZWN0aW9uTGlzdFNlcnZpY2UuZ2V0Q29sbGVjdGlvbnMoKSk7XG4gICAgfVxuXG4gICAgaW5pdGlhbGl6ZShjb2xsZWN0aW9ucykge1xuICAgICAgICBjb25zdCBkYXRhID0gdGhpcy5idWlsZEZpbGVUcmVlKGNvbGxlY3Rpb25zLCAwKTtcbiAgICAgICAgdGhpcy5kYXRhQ2hhbmdlLm5leHQoZGF0YSk7XG4gICAgfVxuXG4gICAgYnVpbGRGaWxlVHJlZShvYmo6IG9iamVjdCwgbGV2ZWw6IG51bWJlcik6IERhdGFOb2RlW10ge1xuICAgICAgICByZXR1cm4gT2JqZWN0LmtleXMob2JqKS5yZWR1Y2U8RGF0YU5vZGVbXT4oKGFjY3VtdWxhdG9yLCBrZXkpID0+IHtcbiAgICAgICAgICAgIGxldCB2YWx1ZTtcbiAgICAgICAgICAgIGNvbnN0IG5vZGUgPSBuZXcgRGF0YU5vZGUoKTtcbiAgICAgICAgICAgIGlmIChvYmpba2V5XS5jb2xsbmFtZSkge1xuICAgICAgICAgICAgICAgIHZhbHVlID0gb2JqW2tleV07XG4gICAgICAgICAgICAgICAgbm9kZS5uYW1lID0gb2JqW2tleV0uY29sbG5hbWU7XG4gICAgICAgICAgICAgICAgbm9kZS5jb2xsaWQgPSBvYmpba2V5XS5jb2xsaWQ7XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICAgIGlmIChrZXkgPT09ICdyb290Jykge1xuICAgICAgICAgICAgICAgICAgICB2YWx1ZSA9IG9ialtrZXldO1xuICAgICAgICAgICAgICAgICAgICBub2RlLm5hbWUgPSBrZXk7XG4gICAgICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgICAgICAgdmFsdWUgPSBvYmpba2V5XS5jb2xsZWN0aW9ucztcbiAgICAgICAgICAgICAgICAgICAgbm9kZS5uYW1lID0gb2JqW2tleV0ubmFtZTtcbiAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgbm9kZS5jaGlsZHJlbiA9IHRoaXMuYnVpbGRGaWxlVHJlZSh2YWx1ZSwgbGV2ZWwgKyAxKTtcbiAgICAgICAgICAgIH1cblxuICAgICAgICAgICAgcmV0dXJuIGFjY3VtdWxhdG9yLmNvbmNhdChub2RlKTtcbiAgICAgICAgfSwgW10pO1xuICAgIH1cbn1cblxuQENvbXBvbmVudCh7XG4gICAgc2VsZWN0b3I6ICdjb2xsZWN0aW9uLWNoZWNrYm94LWxpc3QnLFxuICAgIHRlbXBsYXRlVXJsOiAnLi9jb2xsZWN0aW9uLWNoZWNrYm94LWxpc3QuY29tcG9uZW50Lmh0bWwnLFxuICAgIHN0eWxlVXJsczogWycuL2NvbGxlY3Rpb24tY2hlY2tib3gtbGlzdC5jb21wb25lbnQuY3NzJ10sXG4gICAgcHJvdmlkZXJzOiBbQ29sbGVjdGlvbnNMaXN0RGF0YV1cbn0pXG5leHBvcnQgY2xhc3MgQ29sbGVjdGlvbkNoZWNrYm94TGlzdENvbXBvbmVudCBpbXBsZW1lbnRzIEFmdGVyVmlld0luaXQge1xuXG4gICAgQFZpZXdDaGlsZCgnY29sbHRyZWUnLCB7c3RhdGljOiBmYWxzZX0pIHRyZWU7XG5cbiAgICBmbGF0Tm9kZU1hcCA9IG5ldyBNYXA8RGF0YUZsYXROb2RlLCBEYXRhTm9kZT4oKTtcblxuICAgIG5lc3RlZE5vZGVNYXAgPSBuZXcgTWFwPERhdGFOb2RlLCBEYXRhRmxhdE5vZGU+KCk7XG5cbiAgICB0cmVlQ29udHJvbDogRmxhdFRyZWVDb250cm9sPERhdGFGbGF0Tm9kZT47XG5cbiAgICB0cmVlRmxhdHRlbmVyOiBNYXRUcmVlRmxhdHRlbmVyPERhdGFOb2RlLCBEYXRhRmxhdE5vZGU+O1xuXG4gICAgZGF0YVNvdXJjZTogTWF0VHJlZUZsYXREYXRhU291cmNlPERhdGFOb2RlLCBEYXRhRmxhdE5vZGU+O1xuXG4gICAgY2hlY2tsaXN0U2VsZWN0aW9uID0gbmV3IFNlbGVjdGlvbk1vZGVsPERhdGFGbGF0Tm9kZT4odHJ1ZSAvKiBtdWx0aXBsZSAqLyk7XG5cbiAgICBjb25zdHJ1Y3Rvcihwcml2YXRlIGRhdGFiYXNlOiBDb2xsZWN0aW9uc0xpc3REYXRhKSB7XG4gICAgICAgIHRoaXMudHJlZUZsYXR0ZW5lciA9IG5ldyBNYXRUcmVlRmxhdHRlbmVyKHRoaXMudHJhbnNmb3JtZXIsIHRoaXMuZ2V0TGV2ZWwsXG4gICAgICAgICAgICB0aGlzLmlzRXhwYW5kYWJsZSwgdGhpcy5nZXRDaGlsZHJlbik7XG4gICAgICAgIHRoaXMudHJlZUNvbnRyb2wgPSBuZXcgRmxhdFRyZWVDb250cm9sPERhdGFGbGF0Tm9kZT4odGhpcy5nZXRMZXZlbCwgdGhpcy5pc0V4cGFuZGFibGUpO1xuICAgICAgICB0aGlzLmRhdGFTb3VyY2UgPSBuZXcgTWF0VHJlZUZsYXREYXRhU291cmNlKHRoaXMudHJlZUNvbnRyb2wsIHRoaXMudHJlZUZsYXR0ZW5lcik7XG5cbiAgICAgICAgZGF0YWJhc2UuZGF0YUNoYW5nZS5zdWJzY3JpYmUoZGF0YSA9PiB7XG4gICAgICAgICAgICB0aGlzLmRhdGFTb3VyY2UuZGF0YSA9IGRhdGE7XG4gICAgICAgIH0pO1xuICAgIH1cblxuICAgIGdldExldmVsID0gKG5vZGU6IERhdGFGbGF0Tm9kZSkgPT4gbm9kZS5sZXZlbDtcblxuICAgIGlzRXhwYW5kYWJsZSA9IChub2RlOiBEYXRhRmxhdE5vZGUpID0+IG5vZGUuZXhwYW5kYWJsZTtcblxuICAgIGdldENoaWxkcmVuID0gKG5vZGU6IERhdGFOb2RlKTogRGF0YU5vZGVbXSA9PiBub2RlLmNoaWxkcmVuO1xuXG4gICAgaGFzQ2hpbGQgPSAoXzogbnVtYmVyLCBfbm9kZURhdGE6IERhdGFGbGF0Tm9kZSkgPT4gX25vZGVEYXRhLmV4cGFuZGFibGU7XG5cbiAgICB0cmFuc2Zvcm1lciA9IChub2RlOiBEYXRhTm9kZSwgbGV2ZWw6IG51bWJlcikgPT4ge1xuICAgICAgICBjb25zdCBleGlzdGluZ05vZGUgPSB0aGlzLm5lc3RlZE5vZGVNYXAuZ2V0KG5vZGUpO1xuICAgICAgICBjb25zdCBmbGF0Tm9kZSA9IGV4aXN0aW5nTm9kZSAmJiBleGlzdGluZ05vZGUubmFtZSA9PT0gbm9kZS5uYW1lXG4gICAgICAgICAgICA/IGV4aXN0aW5nTm9kZVxuICAgICAgICAgICAgOiBuZXcgRGF0YUZsYXROb2RlKCk7XG4gICAgICAgIGZsYXROb2RlLm5hbWUgPSBub2RlLm5hbWU7XG4gICAgICAgIGZsYXROb2RlLmNvbGxpZCA9IG5vZGUuY29sbGlkO1xuICAgICAgICBmbGF0Tm9kZS5sZXZlbCA9IGxldmVsO1xuICAgICAgICBmbGF0Tm9kZS5leHBhbmRhYmxlID0gISFub2RlLmNoaWxkcmVuO1xuICAgICAgICB0aGlzLmZsYXROb2RlTWFwLnNldChmbGF0Tm9kZSwgbm9kZSk7XG4gICAgICAgIHRoaXMubmVzdGVkTm9kZU1hcC5zZXQobm9kZSwgZmxhdE5vZGUpO1xuICAgICAgICByZXR1cm4gZmxhdE5vZGU7XG4gICAgfVxuXG4gICAgZGVzY2VuZGFudHNBbGxTZWxlY3RlZChub2RlOiBEYXRhRmxhdE5vZGUpOiBib29sZWFuIHtcbiAgICAgICAgY29uc3QgZGVzY2VuZGFudHMgPSB0aGlzLnRyZWVDb250cm9sLmdldERlc2NlbmRhbnRzKG5vZGUpO1xuICAgICAgICByZXR1cm4gZGVzY2VuZGFudHMuZXZlcnkoY2hpbGQgPT4gdGhpcy5jaGVja2xpc3RTZWxlY3Rpb24uaXNTZWxlY3RlZChjaGlsZCkpO1xuICAgIH1cblxuICAgIGRlc2NlbmRhbnRzUGFydGlhbGx5U2VsZWN0ZWQobm9kZTogRGF0YUZsYXROb2RlKTogYm9vbGVhbiB7XG4gICAgICAgIGNvbnN0IGRlc2NlbmRhbnRzID0gdGhpcy50cmVlQ29udHJvbC5nZXREZXNjZW5kYW50cyhub2RlKTtcbiAgICAgICAgY29uc3QgcmVzdWx0ID0gZGVzY2VuZGFudHMuc29tZShjaGlsZCA9PiB0aGlzLmNoZWNrbGlzdFNlbGVjdGlvbi5pc1NlbGVjdGVkKGNoaWxkKSk7XG4gICAgICAgIHJldHVybiByZXN1bHQgJiYgIXRoaXMuZGVzY2VuZGFudHNBbGxTZWxlY3RlZChub2RlKTtcbiAgICB9XG5cbiAgICB0b2RvSXRlbVNlbGVjdGlvblRvZ2dsZShub2RlOiBEYXRhRmxhdE5vZGUpOiB2b2lkIHtcbiAgICAgICAgdGhpcy5jaGVja2xpc3RTZWxlY3Rpb24udG9nZ2xlKG5vZGUpO1xuICAgICAgICBjb25zdCBkZXNjZW5kYW50cyA9IHRoaXMudHJlZUNvbnRyb2wuZ2V0RGVzY2VuZGFudHMobm9kZSk7XG4gICAgICAgIHRoaXMuY2hlY2tsaXN0U2VsZWN0aW9uLmlzU2VsZWN0ZWQobm9kZSlcbiAgICAgICAgICAgID8gdGhpcy5jaGVja2xpc3RTZWxlY3Rpb24uc2VsZWN0KC4uLmRlc2NlbmRhbnRzKVxuICAgICAgICAgICAgOiB0aGlzLmNoZWNrbGlzdFNlbGVjdGlvbi5kZXNlbGVjdCguLi5kZXNjZW5kYW50cyk7XG4gICAgfVxuXG4gICAgbmdBZnRlclZpZXdJbml0KCkge1xuICAgICAgICB0aGlzLnRyZWVDb250cm9sLmV4cGFuZCh0aGlzLnRyZWUudHJlZUNvbnRyb2wuZGF0YU5vZGVzWzBdKTtcbiAgICB9XG5cbn1cbiJdfQ==