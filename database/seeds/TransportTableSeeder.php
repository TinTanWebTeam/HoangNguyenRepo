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
            'cashRevenue'           => 14450000,
            'cashDelivery'          => 1000000,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 500000,
            'cashProfit'            => 13050000,
            'voucherNumber'         => 'A911',
            'voucherQuantumProduct' => 100,
            'receiver'              => 'Tâm',
            'receiveDate'           => '2016-12-13 09:48:30',
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 1,
            'product_id'            => 1,
            'customer_id'           => 1,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 50000,
            'parking'               => 100000,
            'fine'                  => 200000,
            'phiTangBo'             => 50000,
            'transportType'         => 0,
            'formula_id'            => 1
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH161213002',
            'weight'                => 8,
            'quantumProduct'        => 200,
            'cashRevenue'           => 46860000,
            'cashDelivery'          => 1000000,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 0,
            'cashProfit'            => 45860000,
            'voucherNumber'         => 'A922',
            'voucherQuantumProduct' => 200,
            'receiver'              => 'Bao',
            'receiveDate'           => '2016-12-13 09:48:30',
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 2,
            'product_id'            => 2,
            'customer_id'           => 1,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 0,
            'parking'               => 0,
            'fine'                  => 0,
            'phiTangBo'             => 0,
            'transportType'         => 0,
            'formula_id'            => 2
        ]);

        /* A Chau */
        \App\Transport::create([
            'transportCode'         => 'DH161213003',
            'weight'                => 5,
            'quantumProduct'        => 5000,
            'cashRevenue'           => 7565000,
            'cashDelivery'          => 1000000,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 1000000,
            'cashProfit'            => 6165000,
            'voucherNumber'         => 'A933',
            'voucherQuantumProduct' => 5000,
            'receiver'              => 'Tâm',
            'receiveDate'           => '2016-12-13 09:48:30',
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 3,
            'product_id'            => 6,
            'customer_id'           => 2,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 100000,
            'parking'               => 100000,
            'fine'                  => 100000,
            'phiTangBo'             => 100000,
            'transportType'         => 0,
            'formula_id'            => 4
        ]);

        \App\Transport::create([
            'transportCode'         => 'DH161213004',
            'weight'                => 10,
            'quantumProduct'        => 3000,
            'cashRevenue'           => 15108000,
            'cashDelivery'          => 5000000,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 5000000,
            'cashProfit'            => 14108000,
            'voucherNumber'         => 'A944',
            'voucherQuantumProduct' => 3000,
            'receiver'              => 'Tâm',
            'receiveDate'           => '2016-12-13 09:48:30',
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 4,
            'product_id'            => 3,
            'customer_id'           => 2,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 0,
            'parking'               => 0,
            'fine'                  => 0,
            'phiTangBo'             => 0,
            'transportType'         => 0,
            'formula_id'            => 5
        ]);

        /* CTY TNHH YCH-PROTRADE */
        \App\Transport::create([
            'transportCode'         => 'DH161213005',
            'weight'                => 15,
            'quantumProduct'        => 1000,
            'cashRevenue'           => 51929000,
            'cashDelivery'          => 5000000,
            'cashPreDelivery'       => 0,
            'cashReceive'           => 10000000,
            'cashProfit'            => 50429000,
            'voucherNumber'         => 'A955',
            'voucherQuantumProduct' => 1000,
            'receiver'              => 'Hòa',
            'receiveDate'           => '2016-12-13 09:48:30',
            'receivePlace'          => 'A',
            'deliveryPlace'         => 'B',
            'createdBy'             => 1,
            'updatedBy'             => 1,
            'note'                  => 'ghi chu don hang',
            'costNote'              => 'ghi chu chi phi',
            'active'                => 1,
            'vehicle_id'            => 1,
            'product_id'            => 3,
            'customer_id'           => 3,
            'status_transport'      => 1,
            'status_customer'       => 5,
            'status_garage'         => 8,
            'carrying'              => 100000,
            'parking'               => 100000,
            'fine'                  => 100000,
            'phiTangBo'             => 200000,
            'transportType'         => 0,
            'formula_id'            => 6
        ]);
    }
}
