import { Component, Input } from "@angular/core";

@Component({
    selector: "occurrence-search-field-row",
    template: `
        <div class="row align-items-start" *ngIf="value">
            <div class="field-row-label">{{ label }}</div>
            <div class="filed-row-value">{{ value.toString() }}</div>
        </div>
    `,
    styleUrls: ["./search-result-modal.component.less"]
})
export class FieldRowComponent {
    @Input() label: string;
    @Input() value: any;
}
