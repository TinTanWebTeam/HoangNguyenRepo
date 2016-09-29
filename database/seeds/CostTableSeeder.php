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
            'vehicle_id' => '1',
            'daytime' => '2016-09-29 16:09:48'
        ]);
    }
}
