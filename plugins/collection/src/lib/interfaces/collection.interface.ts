export interface Collection {
    id: number;
    institutionCode: string;
    collectionCode: string;
    collectionName: string;
    icon: string;
    collectionType: string;
    dwcaUrl: string;
}

export interface Category {
    id: number;
    category: string;
    icon: string;
    acronym: string;
    url: string;
    inclusive: number;
    notes: string;
    sortSequence: number;
    collectionId: Collection[];
}

// TODO: Collection vs CollectionSearchResutls
export interface CollectionDetails extends Collection {
    email: string;
    rightsHolder: string;
    rights: string;
    usageTerm: string;
}
