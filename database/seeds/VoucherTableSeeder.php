<?php

use Illuminate\Database\Seeder;

class VoucherTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Voucher::create([
           'name' => 'HĐ xanh'
        ]);

        \App\Voucher::create([
            'name' => 'HĐ vàng'
        ]);

        \App\Voucher::create([
            'name' => 'HĐ hồng'
        ]);

        \App\Voucher::create([
            'name' => 'Phiếu cân'
        ]);

        \App\Voucher::create([
            'name' => 'Phiếu nhập kho'
        ]);
        \App\Voucher::create([
            'name' => 'Phiếu xuất kho'
        ]);

        \App\Voucher::create([
            'name' => 'Phiếu giao hàng'
        ]);

        \App\Voucher::create([
            'name' => 'Lịch giao hàng'
        ]);

        \App\Voucher::create([
            'name' => 'Chứng từ khác'
        ]);
    }
}
