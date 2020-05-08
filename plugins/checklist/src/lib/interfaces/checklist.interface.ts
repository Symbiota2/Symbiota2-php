import {ProjectListItem} from './project.interface';

export interface ChecklistListItem {
    id: number;
    name: string;
    title: string;
    access: string;
    iconUrl: string;
    sortSequence: number;
    projectId: ProjectListItem;
}
