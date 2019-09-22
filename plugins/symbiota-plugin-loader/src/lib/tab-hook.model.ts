export interface TabHook {
    outlet: string;
    tab_text?: string;
    tab_text_translation_key?: string;
    index: number;
    provider?: string;
    component?: any;
}
