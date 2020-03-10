import {AbstractControl} from '@angular/forms';

export class CaptchaValidators {
    static checkHuman(control: AbstractControl): any {
        return (control.value === 'human') ? null : { notHuman: true };
    }
}
