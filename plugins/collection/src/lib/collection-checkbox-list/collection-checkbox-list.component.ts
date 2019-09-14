import {AfterViewInit, Component, Injectable, ViewChild} from '@angular/core';
import {SelectionModel} from '@angular/cdk/collections';
import {FlatTreeControl} from '@angular/cdk/tree';
import {MatTreeFlatDataSource, MatTreeFlattener} from '@angular/material/tree';
import {BehaviorSubject} from 'rxjs';
import {CollectionListService} from '../collection-list.service';

export class DataNode {
    name: string;
    collid: number;
    children: DataNode[];
}

export class DataFlatNode {
    name: string;
    collid: number;
    level: number;
    expandable: boolean;
}

@Injectable()
export class CollectionsListData {
    dataChange = new BehaviorSubject<DataNode[]>([]);

    constructor(
        private collectionListService: CollectionListService
    ) {
        this.initialize(this.collectionListService.getCollections());
    }

    initialize(collections) {
        const data = this.buildFileTree(collections, 0);
        this.dataChange.next(data);
    }

    buildFileTree(obj: object, level: number): DataNode[] {
        return Object.keys(obj).reduce<DataNode[]>((accumulator, key) => {
            let value;
            const node = new DataNode();
            if (obj[key].collname) {
                value = obj[key];
                node.name = obj[key].collname;
                node.collid = obj[key].collid;
            } else {
                if (key === 'root') {
                    value = obj[key];
                    node.name = key;
                } else {
                    value = obj[key].collections;
                    node.name = obj[key].name;
                }
                node.children = this.buildFileTree(value, level + 1);
            }

            return accumulator.concat(node);
        }, []);
    }
}

@Component({
    selector: 'collection-checkbox-list',
    templateUrl: './collection-checkbox-list.component.html',
    styleUrls: ['./collection-checkbox-list.component.css'],
    providers: [CollectionsListData]
})
export class CollectionCheckboxListComponent implements AfterViewInit {

    @ViewChild('colltree', {static: false}) tree;

    flatNodeMap = new Map<DataFlatNode, DataNode>();

    nestedNodeMap = new Map<DataNode, DataFlatNode>();

    treeControl: FlatTreeControl<DataFlatNode>;

    treeFlattener: MatTreeFlattener<DataNode, DataFlatNode>;

    dataSource: MatTreeFlatDataSource<DataNode, DataFlatNode>;

    checklistSelection = new SelectionModel<DataFlatNode>(true /* multiple */);

    constructor(private database: CollectionsListData) {
        this.treeFlattener = new MatTreeFlattener(this.transformer, this.getLevel,
            this.isExpandable, this.getChildren);
        this.treeControl = new FlatTreeControl<DataFlatNode>(this.getLevel, this.isExpandable);
        this.dataSource = new MatTreeFlatDataSource(this.treeControl, this.treeFlattener);

        database.dataChange.subscribe(data => {
            this.dataSource.data = data;
        });
    }

    getLevel = (node: DataFlatNode) => node.level;

    isExpandable = (node: DataFlatNode) => node.expandable;

    getChildren = (node: DataNode): DataNode[] => node.children;

    hasChild = (_: number, _nodeData: DataFlatNode) => _nodeData.expandable;

    transformer = (node: DataNode, level: number) => {
        const existingNode = this.nestedNodeMap.get(node);
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
    };

    descendantsAllSelected(node: DataFlatNode): boolean {
        const descendants = this.treeControl.getDescendants(node);
        return descendants.every(child => this.checklistSelection.isSelected(child));
    }

    descendantsPartiallySelected(node: DataFlatNode): boolean {
        const descendants = this.treeControl.getDescendants(node);
        const result = descendants.some(child => this.checklistSelection.isSelected(child));
        return result && !this.descendantsAllSelected(node);
    }

    todoItemSelectionToggle(node: DataFlatNode): void {
        this.checklistSelection.toggle(node);
        const descendants = this.treeControl.getDescendants(node);
        this.checklistSelection.isSelected(node)
            ? this.checklistSelection.select(...descendants)
            : this.checklistSelection.deselect(...descendants);
    }

    ngAfterViewInit() {
        this.treeControl.expand(this.tree.treeControl.dataNodes[0]);
    }

}
