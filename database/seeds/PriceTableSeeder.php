<?php

use Illuminate\Database\Seeder;

class PriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Price::create([
            'costPrice_id' => 1,
            'price' => '0',
        ]);
        \App\Price::create([
            'costPrice_id' => 2,
            'price' => '100000',
        ]);
        \App\Price::create([
            'costPrice_id' => 3,
            'price' => '200000',
        ]);
        \App\Price::create([
            'costPrice_id' => 4,
            'price' => '300000',
        ]);
    }
}
