<?php

use Illuminate\Database\Seeder;

class CostPriceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CostPrice::create([
           'name' => 'Nhiên liệu'
        ]);
        \App\CostPrice::create([
            'name' => 'Thay nhớt'
        ]);
        \App\CostPrice::create([
            'name' => 'Đậu bãi'
        ]);
        \App\CostPrice::create([
            'name' => 'Khác'
        ]);
    }
}
