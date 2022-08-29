<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'add items']);
        Permission::create(['name' => 'edit items']);
        Permission::create(['name' => 'delete items']);
        Permission::create(['name' => 'add users']);
        Permission::create(['name' => 'edit users']);
        Permission::create(['name' => 'delete users']);
        Permission::create(['name' => 'add roles']);
        Permission::create(['name' => 'edit roles']);
        Permission::create(['name' => 'delete roles']);
        Permission::create(['name' => 'add permissions']);
        Permission::create(['name' => 'edit permissions']);
        Permission::create(['name' => 'delete permissions']);
        Permission::create(['name' => 'add transactions']);
        Permission::create(['name' => 'edit transactions']);
        Permission::create(['name' => 'delete transactions']);
        Permission::create(['name' => 'add mous']);
        Permission::create(['name' => 'edit mous']);
        Permission::create(['name' => 'delete mous']);
        Permission::create(['name' => 'add methods']);
        Permission::create(['name' => 'edit methods']);
        Permission::create(['name' => 'delete methods']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'kasir']);
        $role1->givePermissionTo('add transactions');
        $role1->givePermissionTo('edit transactions');
        $role1->givePermissionTo('delete transactions');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('add items');
        $role2->givePermissionTo('edit items');
        $role2->givePermissionTo('delete items');
        $role2->givePermissionTo('add mous');
        $role2->givePermissionTo('edit mous');
        $role2->givePermissionTo('delete mous');
        $role2->givePermissionTo('add methods');
        $role2->givePermissionTo('edit methods');
        $role2->givePermissionTo('delete methods');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Kasir BGR Logistik',
            'email' => 'test@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin Stock BGR Logistik',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Super Admin BGR Logistik',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}