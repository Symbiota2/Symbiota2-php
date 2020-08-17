import { Component, forwardRef, Input } from "@angular/core";
import {
    ControlValueAccessor,
    FormControl,
    NG_VALUE_ACCESSOR
} from "@angular/forms";

interface SelectOption {
    name: string,
    value: any
}

@Component({
    selector: "occurrence-search-select",
    templateUrl: "./select.component.html",
    providers: [{
        provide: NG_VALUE_ACCESSOR,
        useExisting: forwardRef(() => SelectComponent),
        multi: true
    }]
})
export class SelectComponent implements ControlValueAccessor {
    @Input() title = "";
    @Input() options: SelectOption[];

    public value = new FormControl("");

    constructor() {}

    registerOnChange(fn: (value: string) => void) {
        this.value.valueChanges.subscribe(fn);
    }

    writeValue(value: string): void {
        this.value.setValue(value);
    }

    registerOnTouched(fn: any): void {}
}
