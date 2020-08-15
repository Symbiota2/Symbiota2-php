import { Directive, OnInit } from "@angular/core";
import { ControlContainer } from "@angular/forms";
import { ActivatedRoute } from "@angular/router";

@Directive({
    selector: "[bindQueryParams]"
})
export class BindQueryParamsDirective implements OnInit {

    constructor(
        private currentRoute: ActivatedRoute,
        private controlContainer: ControlContainer
    ) { }

    ngOnInit() {
        this.controlContainer.control.patchValue(
            this.currentRoute.snapshot.queryParamMap
        );
    }
}
