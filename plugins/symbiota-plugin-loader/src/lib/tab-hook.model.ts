export interface TabHook {
    outlet: string;
    tab_text: string;
    index: number;
    module?: string;
    provider?: string;
    component?: any;
}
