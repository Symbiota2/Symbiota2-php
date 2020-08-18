import { Component, Input } from "@angular/core";

@Component({
    selector: "occurrence-search-field-row",
    template: `
        <div class="row" *ngIf="value">
            <div class="col-auto"><b>{{ label }}</b></div>
            <div class="col">{{ value.toString() }}</div>
        </div>
    `,
    styleUrls: ["../../occurrence-search.less"]
})
export class FieldRowComponent {
    @Input() label: string;
    @Input() value: any;
}
