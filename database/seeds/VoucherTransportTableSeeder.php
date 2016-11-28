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
        for ($i = 1; $i < 4; $i++) {
            \App\VoucherTransport::create([
                'voucher_id'   => $i,
                'transport_id' => 1,
                'createdBy'    => 1,
                'updatedBy'    => 1,
                'quantity'     => 1
            ]);
        }
    }
}
