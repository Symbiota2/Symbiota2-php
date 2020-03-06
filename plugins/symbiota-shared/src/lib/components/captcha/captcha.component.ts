import {Component, Input, ViewChild, ElementRef, AfterViewInit} from '@angular/core';
import {FormGroup} from '@angular/forms';

@Component({
    selector: 'symbiota-shared-captcha',
    templateUrl: './captcha.component.html',
    styleUrls: ['./captcha.component.css']
})
export class CaptchaComponent implements AfterViewInit {
    @Input() parent: FormGroup;
    @ViewChild('canvas', { static: false }) public canvas: ElementRef;

    private randNumber: number;
    private cx: CanvasRenderingContext2D;

    public ngAfterViewInit() {
        this.setCanvas();
    }

    get notHuman() {
        return (
            this.parent.get('captcha.human_verified').hasError('notHuman') &&
            this.parent.get('captcha.human_entry').dirty &&
            !this.required('human_entry')
        );
    }

    required(name: string) {
        return (
            this.parent.get(`captcha.${name}`).hasError('required') &&
            this.parent.get(`captcha.${name}`).touched
        );
    }

    setCanvas() {
        this.randNumber = Math.floor(1000000 + Math.random() * 900000);
        const canvasEl: HTMLCanvasElement = this.canvas.nativeElement;
        this.cx = canvasEl.getContext('2d');
        this.cx.font = '80px Times New Roman bold';
        this.cx.fillText(this.randNumber.toString(), 10, 100);
    }

    verifyUserInput(event) {
        let entryVerified = ((event.target.value === this.randNumber.toString()) ? 'human' : 'nothuman');
        if (entryVerified === 'human') {
            setTimeout(() => {
                entryVerified = ((this.parent.get('captcha.human_entry').value === this.randNumber.toString()) ? 'human' : 'nothuman');
                this.parent.get('captcha.human_verified').setValue(entryVerified);
            }, 500);
        } else {
            this.parent.get('captcha.human_verified').setValue(entryVerified);
        }
    }
}
