import {Route} from "./route.model";
import {TabHook} from "./tab-hook.model";
import {ComponentHook} from "./component-hook.model";
import {LinkHook} from "./link-hook.model";

export interface Plugin {
    name: string;
    title: string;
    source: string;
    version: string;
    description?: string;
    project_url?: string;
    dependencies?: string[];
    api_namespace?: string;
    ui_filename?: string;
    ui_module_name?: string;
    ui_routes?: Route[];
    tab_hooks?: TabHook[];
    component_hooks?: ComponentHook[];
    link_hooks?: LinkHook[];
    enabled: boolean;
    database_extension: boolean;
}
