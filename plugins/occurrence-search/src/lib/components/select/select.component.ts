import {
    Component,
    EventEmitter,
    Input,
    Output
} from "@angular/core";

interface SelectOption {
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
    @Input() value = "";
    @Output() valueChange = new EventEmitter<string>();
}
