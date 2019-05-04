import {Component, Input, ViewChild, ElementRef, AfterViewInit, Output, EventEmitter} from '@angular/core';
import {FormGroup} from '@angular/forms';

@Component({
    selector: 'app-captcha',
    templateUrl: './captcha.component.html',
    styleUrls: ['./captcha.component.css']
})
export class CaptchaComponent implements AfterViewInit {
    @Input() parent: FormGroup;
    @Output() getProvenHumanChange = new EventEmitter<boolean>();
    @ViewChild('canvas') public canvas: ElementRef;

    private randNumber: number;
    private provenHuman: boolean;
    private cx: CanvasRenderingContext2D;

    public ngAfterViewInit() {
        this.setCanvas();
    }

    setCanvas() {
        this.randNumber = Math.floor(1000000 + Math.random() * 900000);
        const canvasEl: HTMLCanvasElement = this.canvas.nativeElement;
        this.cx = canvasEl.getContext('2d');
        this.cx.font = '80px Times New Roman';
        this.cx.fillText(this.randNumber.toString(), 10, 100);
    }

    verifyUserInput(event) {
        this.provenHuman = event.target.value === this.randNumber.toString();
        this.getProvenHumanChange.emit(this.provenHuman);
    }
}
