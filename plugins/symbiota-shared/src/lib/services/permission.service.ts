import {Injectable} from '@angular/core';
import {HttpClient} from '@angular/common/http';
import {Observable, BehaviorSubject} from 'rxjs';
import {TranslateService} from '@ngx-translate/core';

import {AlertService} from './alert.service';
import {SpinnerOverlayService} from './spinner-overlay.service';
import {ConfigurationService} from './configuration.service';

import {UserPermission} from '../interfaces/permission.interface';
import {AddPermission} from '../interfaces/permission.interface';

@Injectable({
    providedIn: 'root',
})
export class PermissionService {
    private userIdSubject = new BehaviorSubject<number>(null);
    public readonly userId: Observable<number> = this.userIdSubject.asObservable();
    public userIdValue: number;
    private currentPermissionsSubject = new BehaviorSubject<UserPermission[]>([]);
    public readonly currentPermissions: Observable<UserPermission[]> = this.currentPermissionsSubject.asObservable();
    setUserPermissionErrorText: string;
    createUserPermissionErrorText: string;
    deleteUserPermissionErrorText: string;

    constructor(
        private http: HttpClient,
        public spinnerService: SpinnerOverlayService,
        public alertService: AlertService,
        private configService: ConfigurationService,
        private translate: TranslateService
    ) {
        this.userId.subscribe(value => {
            this.userIdValue = value;
        });
        this.configService.selectedLanguageValue.subscribe(() => {
            this.setTranslations();
        });
    }

    setTranslations() {
        this.translate.get('symbiota-shared.permission_service.set_user_permissions_error').subscribe((res: string) => {
            this.setUserPermissionErrorText = res;
        });
        this.translate.get('symbiota-shared.permission_service.create_user_permission_error').subscribe((res: string) => {
            this.createUserPermissionErrorText = res;
        });
        this.translate.get('symbiota-shared.permission_service.delete_user_permission_error').subscribe((res: string) => {
            this.deleteUserPermissionErrorText = res;
        });
    }

    setUserId(userId: number) {
        this.userIdSubject.next(userId);
    }

    setUserPermissions() {
        this.http.get<any>('/api/userroles?userId=' + this.userIdValue).subscribe(
            (userPermissions: UserPermission[]) => {
                this.currentPermissionsSubject.next(userPermissions['hydra:member']);
                this.spinnerService.hide();
            },
            () => {
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    this.setUserPermissionErrorText,
                    '',
                    5000
                );
            }
        );
    }

    createPermission(permission: AddPermission) {
        this.spinnerService.show();
        this.http.post('/api/userroles', permission).subscribe(
            () => {
                this.setUserPermissions();
            },
            () => {
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    this.createUserPermissionErrorText,
                    '',
                    5000
                );
            }
        );
    }

    deletePermissionById(id: number) {
        this.spinnerService.show();
        this.http.delete<any>('/api/userroles/' + id).subscribe(
            () => {
                this.setUserPermissions();
            },
            () => {
                this.spinnerService.hide();
                this.alertService.showErrorSnackbar(
                    this.deleteUserPermissionErrorText,
                    '',
                    5000
                );
            }
        );
    }

    clearUser() {
        this.userIdSubject.next(null);
        this.currentPermissionsSubject.next([]);
    }
}
