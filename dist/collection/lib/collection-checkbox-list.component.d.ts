import { AfterViewInit } from '@angular/core';
import { SelectionModel } from '@angular/cdk/collections';
import { FlatTreeControl } from '@angular/cdk/tree';
import { MatTreeFlatDataSource, MatTreeFlattener } from '@angular/material/tree';
import { BehaviorSubject } from 'rxjs';
import { CollectionListService } from './collection-list.service';
export declare class DataNode {
    name: string;
    collid: number;
    children: DataNode[];
}
export declare class DataFlatNode {
    name: string;
    collid: number;
    level: number;
    expandable: boolean;
}
export declare class CollectionsListData {
    private collectionListService;
    dataChange: BehaviorSubject<DataNode[]>;
    constructor(collectionListService: CollectionListService);
    initialize(collections: any): void;
    buildFileTree(obj: object, level: number): DataNode[];
}
export declare class CollectionCheckboxListComponent implements AfterViewInit {
    private database;
    tree: any;
    flatNodeMap: Map<DataFlatNode, DataNode>;
    nestedNodeMap: Map<DataNode, DataFlatNode>;
    treeControl: FlatTreeControl<DataFlatNode>;
    treeFlattener: MatTreeFlattener<DataNode, DataFlatNode>;
    dataSource: MatTreeFlatDataSource<DataNode, DataFlatNode>;
    checklistSelection: SelectionModel<DataFlatNode>;
    constructor(database: CollectionsListData);
    getLevel: (node: DataFlatNode) => number;
    isExpandable: (node: DataFlatNode) => boolean;
    getChildren: (node: DataNode) => DataNode[];
    hasChild: (_: number, _nodeData: DataFlatNode) => boolean;
    transformer: (node: DataNode, level: number) => DataFlatNode;
    descendantsAllSelected(node: DataFlatNode): boolean;
    descendantsPartiallySelected(node: DataFlatNode): boolean;
    todoItemSelectionToggle(node: DataFlatNode): void;
    ngAfterViewInit(): void;
}
