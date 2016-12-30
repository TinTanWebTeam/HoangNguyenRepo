<?php

use Illuminate\Database\Seeder;

class InvoiceCustomerDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\InvoiceCustomerDetail::create([
            'invoiceCustomer_id' => 1,
            'paidAmt'            => 15395000,
            'paidAmtNotVat'      => 13855500,
            'payDate'            => '2016-12-30 09:53:48',
            'modify'             => 0,
            'createdBy'          => 1,
            'updatedBy'          => 1,
            'fileName'           => null
        ]);

        \App\InvoiceCustomerDetail::create([
            'invoiceCustomer_id' => 2,
            'paidAmt'            => 20000000,
            'paidAmtNotVat'      => 18000000,
            'payDate'            => '2016-12-30 09:58:15',
            'modify'             => 0,
            'createdBy'          => 1,
            'updatedBy'          => 1,
            'fileName'           => null
        ]);
    }
}
