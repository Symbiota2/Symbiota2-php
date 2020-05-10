export interface UserPermission {
    id: number;
    role: string;
    tableId: number;
}

export interface AddPermission {
    userId: string;
    role: string;
    tableId?: number;
}

export interface CurrentPermission {
    permissionId: number;
    itemName: string;
}
