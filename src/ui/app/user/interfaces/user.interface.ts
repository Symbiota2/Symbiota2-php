export interface BaseUser {
    firstName: string;
    middleInitial: string;
    lastName: string;
    title: string;
    institution: string;
    department: string;
    address: string;
    city: string;
    state: string;
    zip: string;
    country: string;
    email: string;
    url: string;
    biography: string;
    isPublic: number;
}

export interface NewUser extends BaseUser {
    username: string;
    password: string;
    retypedPassword: string;
}

export interface CurrentUser {
    id: number;
    firstName: string;
    permissions: object;
    maintainLogin: number;
    tokenExpire: number;
}
