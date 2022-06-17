<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'edit partners']);
        Permission::create(['name' => 'delete partners']);
        Permission::create(['name' => 'create partners']);
        Permission::create(['name' => 'update partners']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit partners');
        $role1->givePermissionTo('delete partners');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('create partners');
        $role2->givePermissionTo('update partners');
        $role2->givePermissionTo('edit partners');
        $role2->givePermissionTo('delete partners');

        $role3 = Role::create(['name' => 'Super-Admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user1 = User::first();
        $user1->assignRole($role2);

        $user2 = User::find(2);
        $user2->assignRole($role2);

        $user3 = User::find(3);
        $user3->assignRole($role1);
    }
}
