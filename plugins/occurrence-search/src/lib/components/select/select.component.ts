import {
    Component,
    forwardRef,
    Input,
} from "@angular/core";
import { ControlValueAccessor, NG_VALUE_ACCESSOR } from "@angular/forms";

interface SelectOption {
    name: string,
    value: any
}

@Component({
    selector: "[formControl] occurrence-search-select, [formControlName] occurrence-search-select",
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
    @Input() required = false;

    public value: string;

    public onChangeListener: (any) => void;

    registerOnChange(fn: (any) => void): void {
        this.onChangeListener = fn;
    }

    writeValue(value: any): void {
        this.value = value.toString();
    }

    // eslint-disable-next-line @typescript-eslint/no-unused-vars
    registerOnTouched(fn: any): void {}
}
