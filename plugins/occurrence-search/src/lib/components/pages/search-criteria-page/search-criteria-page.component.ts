import { Component, forwardRef } from "@angular/core";
import { ControlValueAccessor, NG_VALUE_ACCESSOR } from "@angular/forms";
import {
    SearchCriteriaFormValues,
    TaxonSearchType
} from "../../../interfaces/searchCriteria";

const TaxonSearchOpts = [
    { name: "Family or scientific name", value: TaxonSearchType.TYPE_FAM_OR_SCINAME.toString() },
    { name: "Family only", value: TaxonSearchType.TYPE_FAM_ONLY.toString() },
    { name: "Scientific name only", value: TaxonSearchType.TYPE_SCINAME_ONLY.toString() },
    { name: "Higher taxonomy", value: TaxonSearchType.TYPE_HIGHER_TAXON.toString() },
    { name: "Common name", value: TaxonSearchType.TYPE_COMMON_NAME.toString() }
];

@Component({
    selector: "occurrence-search-search-criteria-page",
    templateUrl: "./search-criteria-page.component.html",
    styleUrls: ["../../../occurrence-search.less"],
    providers: [{
        provide: NG_VALUE_ACCESSOR,
        useExisting: forwardRef(() => SearchCriteriaPageComponent),
        multi: true
    }]
})
export class SearchCriteriaPageComponent implements ControlValueAccessor {
    public TaxonSearchOpts = TaxonSearchOpts;

    public searchCriteria: SearchCriteriaFormValues = {
        taxa: {
            searchType: null,
            searchStr: ""
        }
    };
    private changeListener: (value: SearchCriteriaFormValues) => void;

    onTaxonTypeChanged(value: string) {
        const newValue = Object.assign(this.searchCriteria, {
            taxa: Object.assign(
                this.searchCriteria.taxa,
                { searchType: parseInt(value) }
            )
        });

        if (this.changeListener) {
            this.changeListener(newValue);
        }
    }

    onTaxonSearchChanged(value: string) {
        const newValue = Object.assign(this.searchCriteria, {
            taxa: Object.assign(
                this.searchCriteria.taxa,
                { searchStr: value }
            )
        });

        if (this.changeListener) {
            this.changeListener(newValue);
        }
    }

    registerOnChange(fn: (value: SearchCriteriaFormValues) => void) {
        this.changeListener = fn;
    }

    writeValue(values: SearchCriteriaFormValues): void {
        this.searchCriteria = values;
    }

    registerOnTouched(fn: any): void {}
}
