export interface ProjectListItem {
    id: number;
    projectName: string;
    displayName: string;
    briefDescription: string;
    iconUrl: string;
    parentProjectId: ProjectListItem;
    sortSequence: number;
}
