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
            'product_id'            => '1',
            'customer_id'           => '1',
            'invoice_id'            => '1',
            'weight'                => '8',
            'cashRevenue'           => '1477746',
            'cashDelivery'          => '1300000',
            'cashReceive'           => '0',
            'cashProfit'            => '177746',
            'note'                  => '',
            'voucherNumber'         => 'AV 399',
            'voucherQuantumProduct' => '8500',
            'receiver'              => 'Phương',
            'receiveDate'           => '15062016',
            'status'                => 'Chưa phân tài',
            'receivePlace'          => 'Vĩnh Lộc',
            'deliveryPlace'         => 'Visip 1',
            'createdBy'             => '1',
            'updatedBy'             => '1'
        ]);

        \App\Transport::create([
            'product_id'            => '2',
            'customer_id'           => '2',
            'invoice_id'            => '2',
            'weight'                => '5',
            'cashRevenue'           => '4800000',
            'cashDelivery'          => '4300000',
            'cashReceive'           => '0',
            'cashProfit'            => '500000',
            'note'                  => '',
            'voucherNumber'         => '12699',
            'voucherQuantumProduct' => '8500',
            'receiver'              => 'Trang',
            'receiveDate'           => '17062016',
            'status'                => 'Đang giao hàng',
            'receivePlace'          => 'Đức Hòa',
            'deliveryPlace'         => 'Trà Vinh',
            'createdBy'             => '1',
            'updatedBy'             => '1'
        ]);
        \App\Transport::create([
            'product_id'            => '3',
            'customer_id'           => '3',
            'invoice_id'            => '3',
            'weight'                => '8',
            'cashRevenue'           => '1667082',
            'cashDelivery'          => '1200000',
            'cashReceive'           => '0',
            'cashProfit'            => '167082',
            'note'                  => '',
            'voucherNumber'         => 'AV 900',
            'voucherQuantumProduct' => '8500',
            'receiver'              => 'Ngân',
            'receiveDate'           => '18062016',
            'status'                => 'Đã giao hàng',
            'receivePlace'          => 'Vĩnh Lộc',
            'deliveryPlace'         => 'Dĩ An',
            'createdBy'             => '1',
            'updatedBy'             => '1'
        ]);
    }
}
