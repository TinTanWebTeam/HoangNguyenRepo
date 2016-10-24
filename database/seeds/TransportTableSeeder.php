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
            'transportCode'         => 'DH160915001',
            'weight'                => '8',
            'quantumProduct'        => '80',
            'cashRevenue'           => '5000000',
            'cashDelivery'          => '1000000',
            'cashPreDelivery'       => '500000',
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
            'status_transport'      => '1',
            'status_customer'       => '5',
            'status_garage'         => '8',
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH160725001',
            'weight'                => '9',
            'quantumProduct'        => '90',
            'cashRevenue'           => '7000000',
            'cashDelivery'          => '2500000',
            'cashPreDelivery'       => '2500000',
            'cashReceive'           => '5000000',
            'cashProfit'            => '3000000',
            'product_id'            => '2',
            'customer_id'           => '2',
            'voucherNumber'         => 'AV228',
            'voucherQuantumProduct' => '9000',
            'receiver'              => 'Dung',
            'receiveDate'           => '2016-7-25 16:06:35',
            'receivePlace'          => 'Đồng Nai',
            'deliveryPlace'         => 'Vedan',
            'createdBy'             => '1',
            'updatedBy'             => '1',
            'note'                  => 'Giao hàng cho Vedan',
            'status_transport'      => '2',
            'status_customer'       => '6',
            'status_garage'         => '9',
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH161015001',
            'weight'                => '10',
            'quantumProduct'        => '100',
            'cashRevenue'           => '3000000',
            'cashDelivery'          => '1200000',
            'cashPreDelivery'       => '0',
            'cashReceive'           => '3000000',
            'cashProfit'            => '1000000',
            'product_id'            => '3',
            'customer_id'           => '3',
            'voucherNumber'         => 'AV772',
            'voucherQuantumProduct' => '8500',
            'receiver'              => 'Minh',
            'receiveDate'           => '2016-10-15 16:06:35',
            'receivePlace'          => 'Củ Chi',
            'deliveryPlace'         => 'Hoa Đức Hòa',
            'createdBy'             => '1',
            'updatedBy'             => '1',
            'note'                  => 'Giao cho HĐH',
            'status_transport'      => '3',
            'status_customer'       => '7',
            'status_garage'         => '10',
        ]);

        //
        \App\Transport::create([
            'transportCode'         => 'DH160915002',
            'weight'                => '8',
            'quantumProduct'        => '80',
            'cashRevenue'           => '5000000',
            'cashDelivery'          => '1000000',
            'cashPreDelivery'       => '0',
            'cashReceive'           => '0',
            'cashProfit'            => '3600000',
            'product_id'            => '4',
            'customer_id'           => '4',
            'voucherNumber'         => 'AV111',
            'voucherQuantumProduct' => '8500',
            'receiver'              => 'Thy',
            'receiveDate'           => '2016-09-15 16:06:35',
            'receivePlace'          => 'Bảo Lộc',
            'deliveryPlace'         => 'Visip 1',
            'createdBy'             => '1',
            'updatedBy'             => '1',
            'note'                  => '',
            'status_transport'      => '1',
            'status_customer'       => '5',
            'status_garage'         => '8',
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH160725002',
            'weight'                => '9',
            'quantumProduct'        => '90',
            'cashRevenue'           => '7000000',
            'cashDelivery'          => '2500000',
            'cashPreDelivery'       => '0',
            'cashReceive'           => '5000000',
            'cashProfit'            => '3000000',
            'product_id'            => '2',
            'customer_id'           => '5',
            'voucherNumber'         => 'AV228',
            'voucherQuantumProduct' => '9000',
            'receiver'              => 'Dung',
            'receiveDate'           => '2016-7-25 16:06:35',
            'receivePlace'          => 'Đồng Nai',
            'deliveryPlace'         => 'Vedan',
            'createdBy'             => '1',
            'updatedBy'             => '1',
            'note'                  => 'Giao hàng cho Vedan',
            'status_transport'      => '2',
            'status_customer'       => '6',
            'status_garage'         => '9',
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH161015002',
            'weight'                => '10',
            'quantumProduct'        => '100',
            'cashRevenue'           => '3000000',
            'cashDelivery'          => '1200000',
            'cashPreDelivery'       => '0',
            'cashReceive'           => '3000000',
            'cashProfit'            => '1000000',
            'product_id'            => '3',
            'customer_id'           => '6',
            'voucherNumber'         => 'AV772',
            'voucherQuantumProduct' => '8500',
            'receiver'              => 'Minh',
            'receiveDate'           => '2016-10-15 16:06:35',
            'receivePlace'          => 'Củ Chi',
            'deliveryPlace'         => 'Hoa Đức Hòa',
            'createdBy'             => '1',
            'updatedBy'             => '1',
            'note'                  => 'Giao cho HĐH',
            'status_transport'      => '3',
            'status_customer'       => '7',
            'status_garage'         => '10',
        ]);
    }
}
