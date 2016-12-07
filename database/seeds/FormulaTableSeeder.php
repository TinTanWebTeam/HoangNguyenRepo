<?php

use Illuminate\Database\Seeder;

class FormulaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # FORMOSA #
        \App\Formula::create([
            'formulaCode' => 'TRSCN303',
            'unitPrice'   => 144500,
            'unit'        => 'Tấn',
            'customer_id' => 1,
            'extendData'  => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);
        \App\Formula::create([
            'formulaCode' => 'TRSCN304',
            'unitPrice'   => 234300,
            'unit'        => 'Tấn',
            'customer_id' => 1,
            'extendData'  => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);
        \App\Formula::create([
            'formulaCode' => 'TRSCN305',
            'unitPrice'   => 814700,
            'unit'        => 'Tấn',
            'customer_id' => 1,
            'extendData'  => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);

        # A CHAU #
        \App\Formula::create([
            'formulaCode' => '',
            'unitPrice'   => 1513,
            'unit'        => 'Thùng',
            'customer_id' => 2,
            'extendData'  => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode' => '',
            'unitPrice'   => 5036,
            'unit'        => 'Thùng',
            'customer_id' => 2,
            'extendData'  => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);

        # YCH-PROTRADE #
        \App\Formula::create([
            'formulaCode' => '',
            'unitPrice'   => 51929,
            'unit'        => 'm3',
            'customer_id' => 3,
            'extendData'  => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode' => '',
            'unitPrice'   => 48684,
            'unit'        => 'm3',
            'customer_id' => 3,
            'extendData'  => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode'   => '',
            'unitPrice'     => 45438,
            'unit'          => 'm3',
            'customer_id'   => 2,
            'extendData'    => '',
            'createdDate'   => date('Y-m-d'),
            'applyDate'     => '2016-10-10',
            'fuel_id'       => 1,
            'cashDelivery'  => 1000000,
            'createdBy'     => 1,
            'updatedBy'     => 1,
            'changeByFuel'  => 0,
            'note'          => 'lorem ipsum'
        ]);
    }
}
