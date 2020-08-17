import {
    Component,
    EventEmitter,
    Input,
    Output, forwardRef, OnInit, OnChanges, SimpleChanges,
} from "@angular/core";
import { ControlValueAccessor, NG_VALUE_ACCESSOR } from "@angular/forms";

@Component({
    selector: "occurrence-search-collection-select-page",
    templateUrl: "./collection-select-page.component.html",
    providers: [{
        provide: NG_VALUE_ACCESSOR,
        useExisting: forwardRef(() => CollectionSelectPageComponent),
        multi: true
    }]
})
export class CollectionSelectPageComponent implements ControlValueAccessor {
    public collectionIDs: number[] = [];
    private collectionChangeListener: (collectionIDs: number[]) => void;

    constructor() {}

    onCollectionIDsChanged(collectionIDs: number[]) {
        if (this.collectionChangeListener) {
            this.collectionChangeListener(collectionIDs);
        }
    }

    registerOnChange(fn: (collIDs: number[]) => void) {
        this.collectionChangeListener = fn;
    }

    writeValue(collIDs: number[]) {
        this.collectionIDs = collIDs;
    }

    registerOnTouched(fn: any): void {}
}
