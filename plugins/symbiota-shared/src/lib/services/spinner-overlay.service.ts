import {Overlay, OverlayRef} from '@angular/cdk/overlay';
import {ComponentPortal} from '@angular/cdk/portal';
import {Injectable} from '@angular/core';
import {SpinnerOverlayComponent} from '../components/spinner-overlay/spinner-overlay.component';

@Injectable({
    providedIn: 'root'
})
export class SpinnerOverlayService {
    private overlayRef: OverlayRef = null;
    private spinnerOverlayPortal: any = null;

    constructor(private overlay: Overlay) {
    }

    public show() {
        if (!this.overlayRef) {
            this.overlayRef = this.overlay.create();
        }

        if (!this.spinnerOverlayPortal) {
            this.spinnerOverlayPortal = new ComponentPortal(SpinnerOverlayComponent);
            this.overlayRef.attach(this.spinnerOverlayPortal);
        }
    }

    public hide() {
        if (!!this.overlayRef) {
            this.overlayRef.detach();
        }
        this.overlayRef = null;
        this.spinnerOverlayPortal = null;
    }
}
