import { Component, OnInit } from "@angular/core";
import { ControlContainer, FormGroup, } from "@angular/forms";
import {
    FORM_KEY_TAXON_TYPE,
    FORM_KEY_TAXON_SEARCH,
    FORM_KEY_CAT_NUM
} from "../../../shared";

const TaxonSearchOpts = [
    { name: "Scientific name", value: "scientificName" },
    { name: "Kingdom", value: "kingdom" },
    { name: "Phylum", value: "phylum" },
    { name: "Class", value: "class" },
    { name: "Order", value: "order" },
    { name: "Family", value: "family" },
    { name: "Tribe", value: "tribe" },
    { name: "Genus", value: "genus" }
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
    public FORM_KEY_CAT_NUM = FORM_KEY_CAT_NUM;

    constructor(private controlContainer: ControlContainer) {}

    ngOnInit() {
        this.formGroup = <FormGroup> this.controlContainer.control;
    }
}
