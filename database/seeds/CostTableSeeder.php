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
            'cost' => '400000',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => 'Phạt tiền',
            'active' => '1',
            'transport_id' => '1',
            'price_id' => '1',
            'vehicle_id' => '1'
        ]);

        \App\Cost::create([
            'cost' => '1500000',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => 'Neo đêm',
            'active' => '1',
            'transport_id' => '2',
            'price_id' => '2',
            'vehicle_id' => '2'
        ]);

        \App\Cost::create([
            'cost' => '800000',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => 'Phạt tiền',
            'active' => '1',
            'transport_id' => '3',
            'price_id' => '3',
            'vehicle_id' => '3'
        ]);

        \App\Cost::create([
            'cost' => '500000',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => 'Đổ xăng',
            'active' => '1',
            'transport_id' => null,
            'price_id' => '2',
            'vehicle_id' => '2',
            'dateRefuel' => '2016-09-29 16:09:48'
        ]);

        \App\Cost::create([
            'cost' => '600000',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => 'Thay nhớt',
            'active' => '1',
            'transport_id' => null,
            'price_id' => '3',
            'vehicle_id' => '3',
            'dateRefuel' => '2016-09-29 16:09:48'
        ]);

        \App\Cost::create([
            'cost' => '700000',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => 'Đậu bãi',
            'active' => '1',
            'transport_id' => null,
            'price_id' => '4',
            'vehicle_id' => '4',
            'dateCheckIn' => '2016-09-20 16:09:48',
            'dateCheckOut' => '2016-09-29 16:09:48'
        ]);
    }
}
