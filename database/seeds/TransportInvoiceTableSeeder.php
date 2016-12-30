<?php

use Illuminate\Database\Seeder;

class TransportInvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\TransportInvoice::create([
            'transport_id'       => 1,
            'invoiceCustomer_id' => 1,
            'invoiceGarage_id'   => null,
            'createdBy'          => 1,
            'updatedBy'          => 1
        ]);

        \App\TransportInvoice::create([
            'transport_id'       => 5,
            'invoiceCustomer_id' => 2,
            'invoiceGarage_id'   => null,
            'createdBy'          => 1,
            'updatedBy'          => 1
        ]);
    }
}
