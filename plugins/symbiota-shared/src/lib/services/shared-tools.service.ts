import {Injectable} from '@angular/core';

@Injectable({
    providedIn: 'root'
})
export class SharedToolsService {
    hexToRgb(hex) {
        const result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(hex);
        return result ? {
            r: parseInt(result[1], 16),
            g: parseInt(result[2], 16),
            b: parseInt(result[3], 16)
        } : null;
    }

    generateRandColor() {
        let hexColor = '';
        const x = Math.round(0xffffff * Math.random()).toString(16);
        const y = (6 - x.length);
        const z = '000000';
        const z1 = z.substring(0, y);
        hexColor = z1 + x;
        return hexColor;
    }

    getDateTimeString() {
        const now = new Date();
        let dateTimeString = now.getFullYear().toString();
        dateTimeString += (((now.getMonth() + 1) < 10) ? '0' : '') + (now.getMonth() + 1).toString();
        dateTimeString += ((now.getDate() < 10) ? '0' : '') + now.getDate().toString();
        dateTimeString += ((now.getHours() < 10) ? '0' : '') + now.getHours().toString();
        dateTimeString += ((now.getMinutes() < 10) ? '0' : '') + now.getMinutes().toString();
        dateTimeString += ((now.getSeconds() < 10) ? '0' : '') + now.getSeconds().toString();
        return dateTimeString;
    }

    getISOStrFromDateObj(dObj) {
        const dYear = dObj.getFullYear();
        const dMonth = ((dObj.getMonth() + 1) > 9 ? (dObj.getMonth() + 1) : '0' + (dObj.getMonth() + 1));
        const dDay = (dObj.getDate() > 9 ? dObj.getDate() : '0' + dObj.getDate());

        return dYear + '-' + dMonth + '-' + dDay;
    }

    getArrayBuffer(file) {
        return new Promise((resolve) => {
            const reader = new FileReader();
            reader.readAsArrayBuffer(file);
            reader.onload = () => {
                const arrayBuffer = reader.result;
                const bytes = new Uint8Array(<ArrayBuffer>arrayBuffer);
                resolve(bytes);
            };
        });
    }

    imagePostFunction(image, src) {
        const img = image.getImage();
        if (typeof window.btoa === 'function') {
            const xhr = new XMLHttpRequest();
            const dataEntries = src.split('&');
            let url = '';
            let params = '';
            for (let i = 0 ; i < dataEntries.length ; i++) {
                if (i === 0) {
                    url = dataEntries[i];
                } else {
                    params = params + '&' + dataEntries[i];
                }
            }
            xhr.open('POST', url, true);
            xhr.responseType = 'arraybuffer';
            xhr.onload = function(e) {
                if (this.status === 200) {
                    const uInt8Array = new Uint8Array(this.response);
                    let i = uInt8Array.length;
                    const binaryString = new Array(i);
                    while (i--) {
                        binaryString[i] = String.fromCharCode(uInt8Array[i]);
                    }
                    const data = binaryString.join('');
                    const type = xhr.getResponseHeader('content-type');
                    if (type.indexOf('image') === 0) {
                        img.src = 'data:' + type + ';base64,' + window.btoa(data);
                    }
                }
            };
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.send(params);
        } else {
            img.src = src;
        }
    }

    parseDate(dateStr) {
        let y = 0;
        let m = 0;
        let d = 0;
        try {
            const validformat1 = /^\d{4}-\d{1,2}-\d{1,2}$/; // Format: yyyy-mm-dd
            const validformat2 = /^\d{1,2}\/\d{1,2}\/\d{2,4}$/; // Format: mm/dd/yyyy
            const validformat3 = /^\d{1,2} \D+ \d{2,4}$/; // Format: dd mmm yyyy
            if (validformat1.test(dateStr)) {
                const dateTokens = dateStr.split('-');
                y = dateTokens[0];
                m = dateTokens[1];
                d = dateTokens[2];
            } else if (validformat2.test(dateStr)) {
                const dateTokens = dateStr.split('/');
                m = dateTokens[0];
                d = dateTokens[1];
                y = dateTokens[2];
            } else if (validformat3.test(dateStr)) {
                const dateTokens = dateStr.split(' ');
                d = dateTokens[0];
                let mText = dateTokens[1];
                y = dateTokens[2];
                mText = mText.substring(0, 3);
                mText = mText.toLowerCase();
                const mNames = ['jan', 'feb', 'mar', 'apr', 'may', 'jun', 'jul', 'aug', 'sep', 'oct', 'nov', 'dec'];
                m = mNames.indexOf(mText) + 1;
            } else if (dateStr instanceof Date) {
                const dateObj = new Date(dateStr);
                y = dateObj.getFullYear();
                m = dateObj.getMonth() + 1;
                d = dateObj.getDate();
            }
        }
        finally {}
        const retArr = [];
        retArr['y'] = y.toString();
        retArr['m'] = m.toString();
        retArr['d'] = d.toString();
        return retArr;
    }
}
