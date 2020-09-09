import { Component, Input } from "@angular/core";

@Component({
    selector: "[occurrence-search-field-row]",
    template: `
        <td class="tbl-label">{{ label }}</td>
        <td>{{ value ? value.toString() : "None" }}</td>
    `,
    styleUrls: ["./search-result-modal.component.less"]
})
export class FieldRowComponent {
    @Input() label: string;
    @Input() value: any;
}
