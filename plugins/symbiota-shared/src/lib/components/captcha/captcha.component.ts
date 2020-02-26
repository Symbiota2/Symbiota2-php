import {Component, Input, ViewChild, ElementRef, AfterViewInit, Output, EventEmitter} from '@angular/core';
import {FormGroup, FormControl, FormGroupDirective, NgForm} from '@angular/forms';
import {ErrorStateMatcher} from '@angular/material';

class CaptchaErrorMatcher implements ErrorStateMatcher {
    isErrorState(control: FormControl | null, form: FormGroupDirective | NgForm | null): boolean {
        return control.dirty && form.invalid;
    }
}

@Component({
    selector: 'symbiota-shared-captcha',
    templateUrl: './captcha.component.html',
    styleUrls: ['./captcha.component.css']
})
export class CaptchaComponent implements AfterViewInit {
    @Input() parent: FormGroup;
    @Output() getProvenHumanChange = new EventEmitter<boolean>();
    @ViewChild('canvas', { static: false }) public canvas: ElementRef;

    private randNumber: number;
    private provenHuman: boolean;
    private cx: CanvasRenderingContext2D;
    errorMatcher = new CaptchaErrorMatcher();

    public ngAfterViewInit() {
        this.setCanvas();
    }

    setCanvas() {
        this.randNumber = Math.floor(1000000 + Math.random() * 900000);
        const canvasEl: HTMLCanvasElement = this.canvas.nativeElement;
        this.cx = canvasEl.getContext('2d');
        this.cx.font = '80px Times New Roman bold';
        this.cx.fillText(this.randNumber.toString(), 10, 100);
    }

    verifyUserInput(event) {
        this.provenHuman = event.target.value === this.randNumber.toString();
        if (this.provenHuman) {
            setTimeout(() => {
                this.provenHuman = event.target.value === this.randNumber.toString();
                this.getProvenHumanChange.emit(this.provenHuman);
            }, 500);
        } else {
            this.getProvenHumanChange.emit(this.provenHuman);
        }
    }
}
