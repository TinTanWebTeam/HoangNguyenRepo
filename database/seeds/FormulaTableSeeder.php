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
            'formulaCode'  => 'TRSCN303',
            'unitPrice'    => 144500,
            'unit_id'      => 1,
            'customer_id'  => 1,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);
        \App\Formula::create([
            'formulaCode'  => 'TRSCN304',
            'unitPrice'    => 234300,
            'unit_id'      => 2,
            'customer_id'  => 1,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);
        \App\Formula::create([
            'formulaCode'  => 'TRSCN305',
            'unitPrice'    => 814700,
            'unit_id'      => 3,
            'customer_id'  => 1,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        # A CHAU #
        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 1513,
            'unit_id'      => 4,
            'customer_id'  => 2,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 5036,
            'unit_id'      => 1,
            'customer_id'  => 2,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        # YCH-PROTRADE #
        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 51929,
            'unit_id'      => 1,
            'customer_id'  => 3,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 48684,
            'unit_id'      => 1,
            'customer_id'  => 3,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 45438,
            'unit_id'      => 1,
            'customer_id'  => 2,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 1000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        # CTY TNHH SCG TRADING VIET NAM #

        //9
        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 312749,
            'unit_id'      => 1,
            'customer_id'  => 4,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum',
            'status'       => 2
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 319132,
            'unit_id'      => 1,
            'customer_id'  => 4,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum',
            'status'       => 2
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 380946,
            'unit_id'      => 1,
            'customer_id'  => 4,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum',
            'status'       => 2
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 388721,
            'unit_id'      => 1,
            'customer_id'  => 4,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum',
            'status'       => 2
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 100000,
            'unit_id'      => 1,
            'customer_id'  => 5,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 100000,
            'unit_id'      => 1,
            'customer_id'  => 7,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2000000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 110000,
            'unit_id'      => 1,
            'customer_id'  => 7,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2100000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);

        \App\Formula::create([
            'formulaCode'  => null,
            'unitPrice'    => 120000,
            'unit_id'      => 1,
            'customer_id'  => 7,
            'extendData'   => null,
            'createdDate'  => date('Y-m-d'),
            'applyDate'    => '2016-10-10',
            'fuel_id'      => 1,
            'cashDelivery' => 2200000,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'changeByFuel' => 0,
            'note'         => 'lorem ipsum'
        ]);
    }
}
