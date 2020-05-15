import {
    AfterViewInit,
    Component,
    EventEmitter,
    Input,
    Injectable,
    ViewChild,
    Output
} from '@angular/core';
import {SelectionModel} from '@angular/cdk/collections';
import {FlatTreeControl} from '@angular/cdk/tree';
import {MatTreeFlatDataSource, MatTreeFlattener} from '@angular/material/tree';
import {BehaviorSubject} from 'rxjs';

import {CollectionService} from '../../services/collection.service';

export class DataNode {
    id: number;
    institutionCode?: string;
    collectionCode?: string;
    collectionName?: string;
    icon: string;
    collectionType?: string;
    dwcaUrl?: string;
    category?: string;
    acronym?: string;
    url?: string;
    inclusive?: number;
    notes?: string;
    sortSequence?: number;
    children: DataNode[];
}

export class DataFlatNode {
    id: number;
    institutionCode: string;
    collectionCode: string;
    collectionName: string;
    icon: string;
    collectionType: string;
    dwcaUrl: string;
    level: number;
    expandable: boolean;
}

@Injectable()
export class CollectionTreeData {
    dataChange = new BehaviorSubject<DataNode[]>([]);

    constructor(
        private collectionService: CollectionService
    ) {
        this.collectionService.setCollectionCategoryData();
        this.collectionService.collectionTreeData.subscribe(value => {
            if (value['root']) {
                this.initialize(value);
            }
        });
    }

    initialize(treeData) {
        const data = this.buildFileTree(treeData, 0);
        this.dataChange.next(data);
    }

    buildFileTree(obj: object, level: number): DataNode[] {
        return Object.keys(obj).reduce<DataNode[]>((accumulator, key) => {
            let value;
            const node = new DataNode();
            if (obj[key].collectionName) {
                value = obj[key];
                node.id = obj[key].id;
                node.institutionCode = obj[key].institutionCode;
                node.collectionCode = obj[key].collectionCode;
                node.collectionName = obj[key].collectionName;
                node.icon = obj[key].icon;
                node.collectionType = obj[key].collectionType;
                node.dwcaUrl = obj[key].dwcaUrl;
            } else {
                if (key === 'root') {
                    value = obj[key];
                    node.category = key;
                } else {
                    value = obj[key].collectionId;
                    node.id = obj[key].id;
                    node.category = obj[key].category;
                    node.icon = obj[key].icon;
                    node.acronym = obj[key].acronym;
                    node.url = obj[key].url;
                    node.inclusive = obj[key].inclusive;
                    node.notes = obj[key].notes;
                    node.sortSequence = obj[key].sortSequence;
                }
                node.children = this.buildFileTree(value, level + 1);
            }

            return accumulator.concat(node);
        }, []);
    }
}

@Component({
    selector: 'collection-collection-checkbox-selector',
    templateUrl: './collection-checkbox-selector.component.html',
    styleUrls: ['./collection-checkbox-selector.component.css'],
    providers: [CollectionTreeData]
})
export class CollectionCheckboxSelectorComponent implements AfterViewInit {
    @Input() selections: string | number[];
    @Output() changeEmitter = new EventEmitter<string | number[]>();
    @ViewChild('colltree', {static: false}) tree;
    flatNodeMap = new Map<DataFlatNode, DataNode>();
    nestedNodeMap = new Map<DataNode, DataFlatNode>();
    treeControl: FlatTreeControl<DataFlatNode>;
    treeFlattener: MatTreeFlattener<DataNode, DataFlatNode>;
    dataSource: MatTreeFlatDataSource<DataNode, DataFlatNode>;
    checklistSelection = new SelectionModel<DataFlatNode>(true);

    getLevel = (node: DataFlatNode) => node.level;
    isExpandable = (node: DataFlatNode) => node.expandable;
    getChildren = (node: DataNode): DataNode[] => node.children;
    hasChild = (_: number, _nodeData: DataFlatNode) => _nodeData.expandable;
    transformer = (node: DataNode, level: number) => {
        const existingNode = this.nestedNodeMap.get(node);
        const flatNode = existingNode && existingNode.id === node.id ? existingNode : new DataFlatNode();
        flatNode.id = node.id;
        flatNode.institutionCode = node.institutionCode;
        flatNode.collectionCode = node.collectionCode;
        flatNode.collectionName = node.collectionName;
        flatNode.icon = node.icon;
        flatNode.collectionType = node.collectionType;
        flatNode.dwcaUrl = node.dwcaUrl;
        flatNode.level = level;
        flatNode.expandable = !!node.children;
        this.flatNodeMap.set(flatNode, node);
        this.nestedNodeMap.set(node, flatNode);
        return flatNode;
    };

    constructor(private database: CollectionTreeData) {
        this.treeFlattener = new MatTreeFlattener(this.transformer, this.getLevel, this.isExpandable, this.getChildren);
        this.treeControl = new FlatTreeControl<DataFlatNode>(this.getLevel, this.isExpandable);
        this.dataSource = new MatTreeFlatDataSource(this.treeControl, this.treeFlattener);

        database.dataChange.subscribe(data => {
            this.dataSource.data = data;
        });
    }

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
        this.checklistSelection.isSelected(node) ? this.checklistSelection.select(...descendants) : this.checklistSelection.deselect(...descendants);
    }

    ngAfterViewInit() {
        this.treeControl.expand(this.tree.treeControl.dataNodes[0]);
    }
}
