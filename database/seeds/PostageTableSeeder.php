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
        'month'       => '1',
        'customer_id' => '1'
    ]);
        \App\Postage::create([
            'postage'     => '200000',
            'month'       => '2',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '300000',
            'month'       => '3',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '400000',
            'month'       => '4',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '500000',
            'month'       => '5',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '600000',
            'month'       => '6',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '700000',
            'month'       => '7',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '800000',
            'month'       => '8',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '900000',
            'month'       => '9',
            'customer_id' => '1'
        ]);
        \App\Postage::create([
            'postage'     => '1000000',
            'month'       => '10',
            'customer_id' => '1'
        ]);

        ////////
        \App\Postage::create([
            'postage'     => '100000',
            'month'       => '1',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '200000',
            'month'       => '2',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '300000',
            'month'       => '3',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '400000',
            'month'       => '4',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '500000',
            'month'       => '5',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '600000',
            'month'       => '6',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '700000',
            'month'       => '7',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '800000',
            'month'       => '8',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '900000',
            'month'       => '9',
            'customer_id' => '2'
        ]);
        \App\Postage::create([
            'postage'     => '1000000',
            'month'       => '10',
            'customer_id' => '2'
        ]);
    }
}
