<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use App\Models\Permission;
use App\Models\RolePermission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $role = $this->seedRolesAndPermissions();

        $user = \App\Models\User::factory()->create([
            'name' => 'Authorize User',
            'email' => 'authorize@admin.com',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Unauthorize User',
            'email' => 'unauthorize@admin.com',
        ]);

        UserRole::create(['user_id' => $user->id, 'role_id' => $role->id]);
    }

    /**
     * seed roles
     */
    public function seedRolesAndPermissions()
    {
        $role = Role::create(['name' => 'admin']);

        $create = Permission::create(['name' => 'create-program']);
        $view = Permission::create(['name' => 'view-program']);
        $edit = Permission::create(['name' => 'edit-program']);
        $delete = Permission::create(['name' => 'delete-program']);

        RolePermission::create(['role_id' => $role->id, 'permission_id' => $create->id]);
        RolePermission::create(['role_id' => $role->id, 'permission_id' => $view->id]);
        RolePermission::create(['role_id' => $role->id, 'permission_id' => $edit->id]);
        RolePermission::create(['role_id' => $role->id, 'permission_id' => $delete->id]);
        
        return $role;
    }
}
