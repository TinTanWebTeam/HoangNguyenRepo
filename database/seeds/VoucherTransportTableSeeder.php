<?php

use Illuminate\Database\Seeder;

class VoucherTransportTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* FORMOSA */
        \App\VoucherTransport::create([
            'voucher_id'   => 1,
            'transport_id' => 1,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 2
        ]);

        \App\VoucherTransport::create([
            'voucher_id'   => 2,
            'transport_id' => 1,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 1
        ]);

        \App\VoucherTransport::create([
            'voucher_id'   => 3,
            'transport_id' => 2,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 1
        ]);

        \App\VoucherTransport::create([
            'voucher_id'   => 4,
            'transport_id' => 2,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 1
        ]);

        /* A Chau */
        \App\VoucherTransport::create([
            'voucher_id'   => 7,
            'transport_id' => 3,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 1
        ]);

        \App\VoucherTransport::create([
            'voucher_id'   => 8,
            'transport_id' => 3,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 1
        ]);

        \App\VoucherTransport::create([
            'voucher_id'   => 3,
            'transport_id' => 4,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 1
        ]);

        \App\VoucherTransport::create([
            'voucher_id'   => 4,
            'transport_id' => 4,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 2
        ]);

        /*  */
        \App\VoucherTransport::create([
            'voucher_id'   => 1,
            'transport_id' => 5,
            'createdBy'    => 1,
            'updatedBy'    => 1,
            'quantity'     => 2
        ]);
    }
}
