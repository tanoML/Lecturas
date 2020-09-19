<?php

use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\Campus::create([
            'name' => 'Tehuantepec'
        ]);

        App\Campus::create([
            'name' => 'Ixtepec'
        ]);

        App\Campus::create([
            'name' => 'Juchitán'
        ]);
    }
}
