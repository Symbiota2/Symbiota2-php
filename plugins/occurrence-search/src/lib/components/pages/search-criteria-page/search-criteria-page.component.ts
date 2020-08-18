import { Component, OnInit } from "@angular/core";
import { ControlContainer, FormGroup, } from "@angular/forms";
import {
    TaxonSearchType,
    FORM_KEY_TAXON_TYPE,
    FORM_KEY_TAXON_SEARCH
} from "../../../shared";

const TaxonSearchOpts = [
    { name: "Family or scientific name", value: TaxonSearchType.TYPE_FAM_OR_SCINAME.toString() },
    { name: "Family only", value: TaxonSearchType.TYPE_FAM_ONLY.toString() },
    { name: "Scientific name only", value: TaxonSearchType.TYPE_SCINAME_ONLY.toString() },
    { name: "Higher taxonomy", value: TaxonSearchType.TYPE_HIGHER_TAXON.toString() },
    { name: "Common name", value: TaxonSearchType.TYPE_COMMON_NAME.toString() }
];

@Component({
    selector: "[formGroup] occurrence-search-search-criteria-page, [formGroupName] occurrence-search-search-criteria-page",
    templateUrl: "./search-criteria-page.component.html",
    styleUrls: ["../../../occurrence-search.less"]
})
export class SearchCriteriaPageComponent implements OnInit {
    public formGroup: FormGroup;

    public TaxonSearchOpts = TaxonSearchOpts;
    public FORM_KEY_TAXON_TYPE = FORM_KEY_TAXON_TYPE;
    public FORM_KEY_TAXON_SEARCH = FORM_KEY_TAXON_SEARCH;

    constructor(private controlContainer: ControlContainer) {}

    ngOnInit() {
        this.formGroup = <FormGroup> this.controlContainer.control;
    }
}
