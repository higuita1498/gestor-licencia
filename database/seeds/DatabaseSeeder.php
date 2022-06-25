<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PartnerSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            DepartmentSeeder::class,
            CitySeeder::class,
            ProductSeeder::class,
            PermissionsSeeder::class,
            LicenceSeeder::class,
        ]);
    }
}
