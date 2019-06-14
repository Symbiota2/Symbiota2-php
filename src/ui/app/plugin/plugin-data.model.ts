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
        tab_name: string,
        tab_text: string,
        tab_index?: number
    }>;
    component_hooks?: Array<{
        outlet: string,
        module: string,
        provider: string,
        index?: number
    }>;
    enabled: boolean;
}
