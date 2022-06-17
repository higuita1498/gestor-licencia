<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrador del sistema',
            'status' => 1,
        ]);

        Role::create([
            'name' => 'User',
            'description' => 'Usuario del sistema',
            'status' => 1,
        ]);

        factory(Role::class, 10)->create();
    }
}
