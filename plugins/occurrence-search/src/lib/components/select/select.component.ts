import {
    Component, EventEmitter,
    Input, Output,
} from "@angular/core";

export interface SelectOption {
    name: string,
    value: any
}

@Component({
    selector: "occurrence-search-select",
    templateUrl: "./select.component.html"
})
export class SelectComponent {
    @Input() title = "";
    @Input() options: SelectOption[];
    @Input() required = false;
    @Input() disabled = false;
    @Input() value: string = "";
    @Output() valueChange: EventEmitter<string> = new EventEmitter<string>();
}
