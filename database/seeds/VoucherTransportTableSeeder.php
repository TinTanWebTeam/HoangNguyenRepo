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
        \App\VoucherTransport::create([
            'voucher_id'   => '1',
            'transport_id' => '1'
        ]);
        \App\VoucherTransport::create([
            'voucher_id'   => '2',
            'transport_id' => '2'
        ]);
        \App\VoucherTransport::create([
            'voucher_id'   => '3',
            'transport_id' => '3'
        ]);
    }
}
