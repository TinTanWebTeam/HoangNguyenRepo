<?php

use Illuminate\Database\Seeder;

class CostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Cost::create([
           'transport_id' => '1',
            'price_id' => '1',
            'vehicle_id' => '1',
            'cost' => '1000000',
            'note' => 'Đổ xăng',
            'literNumber' => '10',
            'dayNumber' => ''
        ]);
        \App\Cost::create([
            'transport_id' => '1',
            'price_id' => '1',
            'vehicle_id' => '4',
            'cost' => '700000',
            'note' => 'Đổ xăng',
            'literNumber' => '5',
            'dayNumber' => ''
        ]);


        \App\Cost::create([
            'transport_id' => '2',
            'price_id' => '2',
            'vehicle_id' => '2',
            'cost' => '2000000',
            'note' => 'Thay nhớt',
            'literNumber' => '5',
            'dayNumber' => ''
        ]);
        \App\Cost::create([
            'transport_id' => '3',
            'price_id' => '3',
            'vehicle_id' => '3',
            'cost' => '300000',
            'note' => 'Đậu bãi',
            'literNumber' => '',
            'dayNumber' => '2'
        ]);
        \App\Cost::create([
            'transport_id' => '4',
            'price_id' => '4',
            'vehicle_id' => '4',
            'cost' => '500000',
            'note' => 'Khác',
            'literNumber' => '',
            'dayNumber' => ''
        ]);
    }
}
