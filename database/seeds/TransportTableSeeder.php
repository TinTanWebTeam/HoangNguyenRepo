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
        /* FORMOSA */
        \App\Transport::create([
            'transportCode'         => 'DH161213001',
            'weight'                => 10,
            'quantumProduct'        => 100,
            'cashRevenue'           => 14900000,
            'cashDelivery'          => 1445000,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 500000,
            'cashProfit'            => 13455000,
            'voucherNumber'         => 'A911',
            'voucherQuantumProduct' => 100,
            'receiver'              => 'Tâm',
            'receiveDate'           => date('y-m-d h:i:s'),
            'transportDate'         => date('y-m-d h:i:s'),
            'paymentDate'           => date('y-m-d h:i:s'),
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 1,
            'product_id'            => 1,
            'productCode'           => 'M',
            'customer_id'           => 1,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 50000,
            'parking'               => 100000,
            'fine'                  => 200000,
            'phiTangBo'             => 50000,
            'addScore'              => 50000,
            'direction'             => 0,
            'transportType'         => 0,
            'formula_id'            => 1,
            'status_invoice'        => 2,
            'fullPayment'           => true
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH161213002',
            'weight'                => 8,
            'quantumProduct'        => 200,
            'cashRevenue'           => 46910000,
            'cashDelivery'          => 4686000,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 500000,
            'cashProfit'            => 42224000,
            'voucherNumber'         => 'A922',
            'voucherQuantumProduct' => 200,
            'receiver'              => 'Bao',
            'receiveDate'           => date('y-m-d h:i:s'),
            'transportDate'         => date('y-m-d h:i:s'),
            'paymentDate'           => date('y-m-d h:i:s'),
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 2,
            'product_id'            => 2,
            'productCode'           => 'M',
            'customer_id'           => 1,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 0,
            'parking'               => 0,
            'fine'                  => 0,
            'phiTangBo'             => 0,
            'addScore'              => 50000,
            'direction'             => 0,
            'transportType'         => 0,
            'formula_id'            => 2
        ]);

        /* A Chau */
        \App\Transport::create([
            'transportCode'         => 'DH161213003',
            'weight'                => 5,
            'quantumProduct'        => 5000,
            'cashRevenue'           => 8015000,
            'cashDelivery'          => 756500,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 1000000,
            'cashProfit'            => 7258500,
            'voucherNumber'         => 'A933',
            'voucherQuantumProduct' => 5000,
            'receiver'              => 'Tâm',
            'receiveDate'           => date('y-m-d h:i:s'),
            'transportDate'         => date('y-m-d h:i:s'),
            'paymentDate'           => date('y-m-d h:i:s'),
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 3,
            'product_id'            => 6,
            'productCode'           => 'M',
            'customer_id'           => 2,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 100000,
            'parking'               => 100000,
            'fine'                  => 100000,
            'phiTangBo'             => 100000,
            'addScore'              => 50000,
            'direction'             => 0,
            'transportType'         => 0,
            'formula_id'            => 4
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH161213004',
            'weight'                => 10,
            'quantumProduct'        => 3000,
            'cashRevenue'           => 15158000,
            'cashDelivery'          => 1510800,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 5000000,
            'cashProfit'            => 13647200,
            'voucherNumber'         => 'A944',
            'voucherQuantumProduct' => 3000,
            'receiver'              => 'Tâm',
            'receiveDate'           => date('y-m-d h:i:s'),
            'transportDate'         => date('y-m-d h:i:s'),
            'paymentDate'           => date('y-m-d h:i:s'),
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 4,
            'product_id'            => 3,
            'productCode'           => 'M',
            'customer_id'           => 2,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 0,
            'parking'               => 0,
            'fine'                  => 0,
            'phiTangBo'             => 0,
            'addScore'              => 50000,
            'direction'             => 0,
            'transportType'         => 0,
            'formula_id'            => 5
        ]);

        /* CTY TNHH YCH-PROTRADE */
        \App\Transport::create([
            'transportCode'         => 'DH161213005',
            'weight'                => 15,
            'quantumProduct'        => 1000,
            'cashRevenue'           => 52479000,
            'cashDelivery'          => 5192900,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 10000000,
            'cashProfit'            => 47286100,
            'voucherNumber'         => 'A955',
            'voucherQuantumProduct' => 1000,
            'receiver'              => 'Hòa',
            'receiveDate'           => date('y-m-d h:i:s'),
            'transportDate'         => date('y-m-d h:i:s'),
            'paymentDate'           => date('y-m-d h:i:s'),
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 1,
            'product_id'            => 3,
            'productCode'           => 'M',
            'customer_id'           => 3,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 100000,
            'parking'               => 100000,
            'fine'                  => 100000,
            'phiTangBo'             => 200000,
            'addScore'              => 50000,
            'direction'             => 0,
            'transportType'         => 0,
            'formula_id'            => 6,
            'status_invoice'        => 2
        ]);
    }
}
