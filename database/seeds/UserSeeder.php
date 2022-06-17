<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'UserName' => 'Admin',
            'password' => bcrypt('secret'),
        ]);

        factory(User::class, 50)->create();
    }
}
