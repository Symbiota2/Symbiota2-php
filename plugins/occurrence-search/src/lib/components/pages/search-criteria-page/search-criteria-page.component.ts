import { Component, OnInit } from "@angular/core";
import { FormControl, FormGroup } from "@angular/forms";

enum TaxonSearchType {
    TYPE_FAM_OR_SCINAME,
    TYPE_FAM_ONLY,
    TYPE_SCINAME_ONLY,
    TYPE_HIGHER_TAXON,
    TYPE_COMMON_NAME
}

const TaxonSearchOpts = [
    { name: "Family or scientific name", value: TaxonSearchType.TYPE_FAM_OR_SCINAME },
    { name: "Family only", value: TaxonSearchType.TYPE_FAM_ONLY },
    { name: "Scientific name only", value: TaxonSearchType.TYPE_SCINAME_ONLY },
    { name: "Higher taxonomy", value: TaxonSearchType.TYPE_HIGHER_TAXON },
    { name: "Common name", value: TaxonSearchType.TYPE_COMMON_NAME }
];

@Component({
    selector: "occurrence-search-search-criteria-page",
    templateUrl: "./search-criteria-page.component.html",
    styleUrls: ["../../../occurrence-search.less"]
})
export class SearchCriteriaPageComponent implements OnInit {
    public TaxonSearchOpts = TaxonSearchOpts;
    public SEARCH_TYPE = "taxonSearchType";
    public SEARCH_STR = "taxonSearchStr";

    public formGroup = new FormGroup({
        [this.SEARCH_TYPE]: new FormControl(""),
        [this.SEARCH_STR]: new FormControl("")
    });

    constructor() { }

    ngOnInit() {
        this.formGroup.valueChanges.subscribe((changes) => {
            console.log(changes);
        });
    }
}
