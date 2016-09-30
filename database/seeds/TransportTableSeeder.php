<?php

use Illuminate\Database\Seeder;

class TransportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Transport::create([
            'weight'                => '8',
            'quantumProduct'        => '80',
            'cashRevenue'           => '5000000',
            'cashDelivery'          => '1000000',
            'cashReceive'           => '0',
            'cashProfit'            => '3500000',
            'product_id'            => '1',
            'customer_id'           => '1',
            'voucherNumber'         => 'AV 399',
            'voucherQuantumProduct' => '8500',
            'receiver'              => 'Phương',
            'receiveDate'           => '2016-09-15 16:06:35',
            'receivePlace'          => 'Vĩnh Lộc',
            'deliveryPlace'         => 'Visip 1',
            'createdBy'             => '1',
            'updatedBy'             => '1',
            'note'                  => '',
            'status_id'             => '1',
        ]);
    }
}
