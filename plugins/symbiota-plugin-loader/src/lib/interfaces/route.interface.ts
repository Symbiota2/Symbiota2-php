import {ChildRoute} from './child-route.interface';

export interface Route {
    path: string;
    redirectTo?: string;
    provider?: string;
    data?: object;
    children?: ChildRoute[];
}
