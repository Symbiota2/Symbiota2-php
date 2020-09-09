import { Component, EventEmitter, Input, Output } from "@angular/core";

type StartViewValues = "month" | "year" | "multi-year";

@Component({
    selector: "occurrence-search-date-picker",
    templateUrl: "./date-picker.component.html",
    styleUrls: []
})
export class DatePickerComponent {
    @Input() value: Date = null;
    @Input() placeholder = "";
    @Input() startView: StartViewValues = "multi-year";
    @Output() public valueChange = new EventEmitter<Date>();
}
