export interface AvailablePlugin {
    name: string;
    title: string;
    source: string;
    version: string;
    description?: string;
    project_url?: string;
    dependencies?: string[];
}
