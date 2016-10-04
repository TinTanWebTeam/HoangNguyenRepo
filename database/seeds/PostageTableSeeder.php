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
        'postage'     => '100000',
        'month'       => '2016-01-01 16:06:35',
        'customer_id' => '1',
        'createdBy'   => '1',
        'updatedBy'   => '1'
    ]);
        \App\Postage::create([
            'postage'     => '200000',
            'month'       => '2016-02-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '300000',
            'month'       => '2016-03-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '400000',
            'month'       => '2016-04-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '500000',
            'month'       => '2016-05-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '600000',
            'month'       => '2016-06-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '700000',
            'month'       => '2016-07-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '800000',
            'month'       => '2016-08-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '900000',
            'month'       => '2016-09-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
        \App\Postage::create([
            'postage'     => '1000000',
            'month'       => '2016-10-01 16:06:35',
            'customer_id' => '1',
            'createdBy'   => '1',
            'updatedBy'   => '1'
        ]);
    }
}
