import {Route} from './route.interface';
import {TabHook} from './tab-hook.interface';
import {ComponentHook} from './component-hook.interface';
import {LinkHook} from './link-hook.interface';

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
    primed: boolean;
    enabled: boolean;
    database_extension: boolean;
    default_data: boolean;
}
