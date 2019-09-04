import {ChildRoute} from "./child-route.model";

export interface Route {
    path: string;
    redirectTo?: string;
    provider?: string;
    data?: object;
    children?: ChildRoute[];
}
