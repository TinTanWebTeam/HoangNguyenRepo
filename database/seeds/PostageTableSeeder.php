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
        $arr_postage = [
            100000, 200000, 300000, 400000 ,500000 , 600000, 700000, 800000, 900000, 1000000
        ];
        $arr_month = [
            '2016-01-01 12:00:00',
            '2016-02-01 12:00:00',
            '2016-03-01 12:00:00',
            '2016-04-01 12:00:00',
            '2016-05-01 12:00:00',
            '2016-06-01 12:00:00',
            '2016-07-01 12:00:00',
            '2016-08-01 12:00:00',
            '2016-09-01 12:00:00',
            '2016-10-01 12:00:00'
        ];

        for($i=0; $i<count($arr_month); $i++) {
            \App\Postage::create([
                'postage'     => $arr_postage[$i],
                'month'       => $arr_month[$i],
                'customer_id' => '1',
                'createdBy'   => '1',
                'updatedBy'   => '1'
            ]);
        }
        for($i=0; $i<count($arr_month); $i++) {
            \App\Postage::create([
                'postage'     => $arr_postage[$i],
                'month'       => $arr_month[$i],
                'customer_id' => '2',
                'createdBy'   => '1',
                'updatedBy'   => '1'
            ]);
        }
        for($i=0; $i<count($arr_month); $i++) {
            \App\Postage::create([
                'postage'     => $arr_postage[$i],
                'month'       => $arr_month[$i],
                'customer_id' => '3',
                'createdBy'   => '1',
                'updatedBy'   => '1'
            ]);
        }
    }
}
