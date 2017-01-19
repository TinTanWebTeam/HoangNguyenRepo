<?php

use Illuminate\Database\Seeder;

class FuelPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        \App\Fuel::create([
            'price' => 10000,
            'type' => 'oil',
            'note' => $faker->sentence,
            'applyDate' => '2016-01-01 00:00:00',
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        \App\Fuel::create([
            'price' => 80000,
            'type' => 'lube',
            'note' => $faker->sentence,
            'applyDate' => '2016-01-01 00:00:00',
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
    }
}
