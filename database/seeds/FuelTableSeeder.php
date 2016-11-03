<?php

use Illuminate\Database\Seeder;

class FuelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Fuel::create([
            'price' => 20000,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
    }
}
