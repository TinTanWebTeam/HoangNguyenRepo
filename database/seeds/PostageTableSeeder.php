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
        'postage' => 1000000,
        'postageBase' => 1000000,
        'createdDate' => date('Y-m-d'),
        'applyDate' => '2016-10-10',
        'customer_id' => 1,
        'fuel_id' => 1,
        'receivePlace' => 'Hồ Chí Minh',
        'deliveryPlace' => 'Bình Dương',
        'cashDelivery' => 1000000,
        'createdBy' => 1,
        'updatedBy' => 1,
        'changeByFuel' => 0,
        'note' => 'lorem'
    ]);

        \App\Postage::create([
            'postage' => 2000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => date('Y-m-d'),
            'customer_id' => 1,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 1,
            'note' => 'lorem'
        ]);

        \App\Postage::create([
            'postage' => 3000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => '2016-11-30',
            'customer_id' => 1,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 1,
            'note' => 'lorem'
        ]);

        ####
        \App\Postage::create([
            'postage' => 1000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => '2016-10-10',
            'customer_id' => 2,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 0,
            'note' => 'lorem'
        ]);

        \App\Postage::create([
            'postage' => 2000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => date('Y-m-d'),
            'customer_id' => 2,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 1,
            'note' => 'lorem'
        ]);

        \App\Postage::create([
            'postage' => 3000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => '2016-11-30',
            'customer_id' => 2,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 1,
            'note' => 'lorem'
        ]);

        ###
        \App\Postage::create([
            'postage' => 1000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => '2016-10-10',
            'customer_id' => 3,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 0,
            'note' => 'lorem'
        ]);

        \App\Postage::create([
            'postage' => 2000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => date('Y-m-d'),
            'customer_id' => 3,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 1,
            'note' => 'lorem'
        ]);

        \App\Postage::create([
            'postage' => 3000000,
            'postageBase' => 1000000,
            'createdDate' => date('Y-m-d'),
            'applyDate' => '2016-11-30',
            'customer_id' => 3,
            'fuel_id' => 1,
            'receivePlace' => 'Hồ Chí Minh',
            'deliveryPlace' => 'Bình Dương',
            'cashDelivery' => 1000000,
            'createdBy' => 1,
            'updatedBy' => 1,
            'changeByFuel' => 1,
            'note' => 'lorem'
        ]);





    }
}
