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
        for($i = 1; $i < 30; $i ++){
            \App\Postage::create([
                'postage' => $i * 1000000,
                'postageBase' => $i * 1000000,
                'createdDate' => '2016-10-10',
                'applyDate' => '2016-10-10',
                'customer_id' => $i % 10 + 1,
                'fuel_id' => 1,
                'receivePlace' => 'Hồ Chí Minh',
                'deliveryPlace' => 'Bình Dương',
                'cashDelivery' => 1000000,
                'createdBy' => 1,
                'updatedBy' => 1,
                'changeByFuel' => 0,
                'note' => 'lorem'
            ]);
        }


    }
}
