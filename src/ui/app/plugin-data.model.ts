export interface PluginData {
    name: string;
    file: string;
    module: string;
    description: string;
    dependencies?: string[];
    routes?: Array<{
        path: string,
        redirectTo?: string,
        provider?: string,
        children?: Array<{
            path: string,
            redirectTo?: string,
            provider?: string
        }>
    }>;
}
