<?php

use Illuminate\Database\Seeder;

class PostageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Postage::create([
            'postage' => 7000000,
            'createdDate' => '2016-10-10',
            'customer_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 0
        ]);
    }
}
