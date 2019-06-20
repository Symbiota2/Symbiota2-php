export interface PluginData {
    plugin: string;
    name: string;
    source: string;
    version: string;
    description?: string;
    dependencies?: string[];
    api_namespace?: string;
    ui_filename?: string;
    ui_module_name?: string;
    ui_routes?: Array<{
        path: string,
        redirectTo?: string,
        provider?: string,
        children?: Array<{
            path: string,
            redirectTo?: string,
            provider?: string
        }>
    }>;
    tab_hooks?: Array<{
        outlet: string,
        tab_text: string,
        index: number,
        module?: string,
        provider?: string,
        component?: any
    }>;
    component_hooks?: Array<{
        outlet: string,
        index: number,
        module?: string,
        provider?: string,
        component?: any
    }>;
    enabled: boolean;
}
