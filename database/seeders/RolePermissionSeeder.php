<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        // Define all permissions
        $permissions = [
            // Article permissions
            'view-articles',
            'create-articles',
            'edit-articles',
            'delete-articles',
            'publish-articles',

            // News permissions
            'view-news',
            'create-news',
            'edit-news',
            'delete-news',
            'publish-news',

            // Event permissions
            'view-events',
            'create-events',
            'edit-events',
            'delete-events',
            'publish-events',
            'manage-registrations',

            // Gallery permissions
            'view-galleries',
            'create-galleries',
            'edit-galleries',
            'delete-galleries',
            'manage-images',

            // Service permissions
            'view-services',
            'create-services',
            'edit-services',
            'delete-services',
            'manage-requests',

            // Citizen request permissions
            'view-citizen-requests',
            'create-citizen-requests',
            'edit-citizen-requests',
            'delete-citizen-requests',
            'respond-to-requests',

            // Complaint permissions
            'view-complaints',
            'respond-to-complaints',
            'assign-complaints',
            'close-complaints',

            // Department permissions
            'manage-departments',
            'manage-officials',
            'view-directory',

            // Financial permissions
            'manage-budgets',
            'view-finances',
            'approve-expenses',
            'manage-revenues',

            // User management
            'manage-users',
            'view-users',
            'edit-users',
            'delete-users',

            // System
            'view-audit-logs',
            'manage-roles',
            'manage-permissions',
            'system-settings',
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::findOrCreate($permission);
        }

        // Create roles
        $adminRole = Role::findOrCreate('admin');
        $editorRole = Role::findOrCreate('editor');
        $officialRole = Role::findOrCreate('official');
        $citizenRole = Role::findOrCreate('citizen');

        // Assign permissions to admin
        $adminRole->syncPermissions(Permission::all());

        // Assign permissions to editor
        $editorPermissions = [
            'view-articles',
            'create-articles',
            'edit-articles',
            'delete-articles',
            'publish-articles',
            'view-news',
            'create-news',
            'edit-news',
            'delete-news',
            'publish-news',
            'view-events',
            'create-events',
            'edit-events',
            'delete-events',
            'publish-events',
            'view-galleries',
            'create-galleries',
            'edit-galleries',
            'manage-images',
            'view-directory',
            'view-audit-logs',
        ];
        $editorRole->syncPermissions(Permission::whereIn('name', $editorPermissions)->get());

        // Assign permissions to official
        $officialPermissions = [
            'view-citizen-requests',
            'respond-to-requests',
            'view-complaints',
            'respond-to-complaints',
            'view-directory',
            'view-services',
            'manage-registrations',
            'view-finances',
        ];
        $officialRole->syncPermissions(Permission::whereIn('name', $officialPermissions)->get());

        // Assign permissions to citizen
        $citizenPermissions = [
            'view-articles',
            'view-news',
            'view-events',
            'create-citizen-requests',
            'view-citizen-requests',
            'view-galleries',
            'view-directory',
            'view-services',
        ];
        $citizenRole->syncPermissions(Permission::whereIn('name', $citizenPermissions)->get());
    }
}
