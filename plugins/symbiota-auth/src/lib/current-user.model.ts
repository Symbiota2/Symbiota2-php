export interface CurrentUser {
    id: number;
    firstName: string;
    permissions: object;
    maintainLogin: number;
    tokenExpire: number;
}
