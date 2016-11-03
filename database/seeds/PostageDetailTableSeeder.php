<?php

use Illuminate\Database\Seeder;

class PostageDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\PostageDetail::create([
            'postage' => 7000000,
            'postage_id' => 1,
            'createdDate' => '2016-10-10',
            'customer_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'applyDate' => '2016-11-11',
            'changeByFuel' => 0
        ]);
    }
}
