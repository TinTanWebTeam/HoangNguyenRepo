<?php

use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Invoice::create([
           'code' => '',
            'VAT' => '5',
            'notVAT' => '1000000',
            'hasVAT' => '1500000',
            'exportDay' => '15072016',
            'invoiceDay' => '15072016',
            'payDay' => '20072016',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => ''
        ]);
        \App\Invoice::create([
            'code' => '',
            'VAT' => '10',
            'notVAT' => '1000000',
            'hasVAT' => '2000000',
            'exportDay' => '15072016',
            'invoiceDay' => '15072016',
            'payDay' => '20072016',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => ''
        ]);
        \App\Invoice::create([
            'code' => '',
            'VAT' => '7',
            'notVAT' => '1000000',
            'hasVAT' => '1700000',
            'exportDay' => '15072016',
            'invoiceDay' => '15072016',
            'payDay' => '20072016',
            'createdBy' => '1',
            'updatedBy' => '1',
            'note' => ''
        ]);
    }
}
