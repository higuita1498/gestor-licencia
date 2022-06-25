<?php

use App\Models\Licence;
use Illuminate\Database\Seeder;

class LicenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Licence::class, 50)->create();
    }
}
