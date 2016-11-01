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
        $array_name = [
            'Khác',
            'Nhiên liệu',
            'Thay nhớt',
            'Đậu bãi'
        ];

        foreach($array_name as $item){
            \App\CostPrice::create([
                'name' => $item
            ]);
        }
    }
}
