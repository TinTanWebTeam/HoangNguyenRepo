<?php

use Illuminate\Database\Seeder;

class InvoiceCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       \App\InvoiceCustomer::create([
           'invoiceCode'    => 'IC161230001',
           'totalTransport' => 14450000,
           'prePaid'        => 500000,
           'totalPay'       => 14450000,
           'totalPaid'      => 15395000,
           'VAT'            => 10,
           'notVAT'         => 14450000,
           'hasVAT'         => 15895000,
           'exportDate'     => '2016-12-30 09:53:48',
           'invoiceDate'    => '2016-12-30 09:53:48',
           'payDate'        => '2016-12-30 09:53:48',
           'createdBy'      => 1,
           'updatedBy'      => 1,
           'note'           => 'lorem ipsum dolar sit amet',
           'active'         => 1,
           'statusPrePaid'  => 1,
           'invoiceType'    => 0,
           'money'          => 0,
           'sendToPerson'   => 'A Nam',
           'status_invoice' => 2
       ]);

       \App\InvoiceCustomer::create([
           'invoiceCode'    => 'IC161230002',
           'totalTransport' => 51929000,
           'prePaid'        => 10000000,
           'totalPay'       => 30000000,
           'totalPaid'      => 20000000,
           'VAT'            => 10,
           'notVAT'         => 30000000,
           'hasVAT'         => 33000000,
           'exportDate'     => '2016-12-30 09:58:15',
           'invoiceDate'    => '2016-12-30 09:58:15',
           'payDate'        => '2016-12-30 09:58:15',
           'createdBy'      => 1,
           'updatedBy'      => 1,
           'note'           => 'lorem ipsum dolar sit amet',
           'active'         => 1,
           'statusPrePaid'  => 1,
           'invoiceType'    => 0,
           'money'          => 0,
           'sendToPerson'   => 'C Hoa',
           'status_invoice' => 2
       ]);
    }
}
