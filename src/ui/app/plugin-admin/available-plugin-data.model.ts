export interface AvailablePluginData {
    plugin: string;
    name: string;
    source: string;
    version: string;
    description?: string;
    dependencies?: string[];
}
