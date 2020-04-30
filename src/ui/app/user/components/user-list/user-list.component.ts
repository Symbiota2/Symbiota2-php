import {Component, EventEmitter, Output} from '@angular/core';
import {TranslateService} from '@ngx-translate/core';

import {SharedUserService} from 'symbiota-shared';
import {AlertService} from 'symbiota-shared';
import {ConfigurationService} from 'symbiota-shared';

import {UserListItem} from '../../interfaces/user.interface';

@Component({
    selector: 'app-user-list',
    templateUrl: './user-list.component.html',
    styleUrls: ['./user-list.component.css'],
})
export class UserListComponent {
    @Output() selectedUid = new EventEmitter<number>();
    debouncer: any;
    lastNameFilter: string;
    usernameFilter: string;
    userList: UserListItem[] = [];
    no_users_username: string;
    no_users_last_name: string;

    constructor(
        private alertService: AlertService,
        private translate: TranslateService,
        public userService: SharedUserService,
        private configService: ConfigurationService
    ) {
        this.configService.selectedLanguageValue.subscribe(() => {
            this.setTranslations();
        });
    }

    setTranslations() {
        this.translate.get('core.user.user_list.no_users_username_filter').subscribe((res: string) => {
            this.no_users_username = res;
        });
        this.translate.get('core.user.user_list.no_users_lastname_filter').subscribe((res: string) => {
            this.no_users_last_name = res;
        });
    }

    processLastNameFilter() {
        this.usernameFilter = '';
        this.userList = [];
        clearTimeout(this.debouncer);
        this.debouncer = setTimeout(() => {
            if (this.lastNameFilter) {
                this.userService.getUserListByLastName(this.lastNameFilter).subscribe( data => {
                    this.userList = this.userService.mapUserListResponse(data);
                    if (this.userList.length === 0) {
                        this.alertService.showErrorSnackbar(
                            this.no_users_last_name,
                            '',
                            5000
                        );
                    }
                });
            }
        }, 1000);
    }

    processUsernameFilter() {
        this.lastNameFilter = '';
        this.userList = [];
        clearTimeout(this.debouncer);
        this.debouncer = setTimeout(() => {
            if (this.usernameFilter) {
                this.userService.getUserByUsername(this.usernameFilter).subscribe( data => {
                    this.userList = this.userService.mapUserListResponse(data);
                    if (this.userList.length === 0) {
                        this.alertService.showErrorSnackbar(
                            this.no_users_username,
                            '',
                            5000
                        );
                    }
                });
            }
        }, 1000);
    }

    processUserSelection(uid: number) {
        this.selectedUid.emit(uid);
    }
}
