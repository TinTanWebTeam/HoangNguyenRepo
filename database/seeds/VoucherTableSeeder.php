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
        $array_name = [
            'HĐ xanh',
            'HĐ vàng',
            'HĐ hồng',
            'Phiếu cân',
            'Phiếu nhập kho',
            'Phiếu xuất kho',
            'Phiếu giao hàng',
            'Lịch giao hàng',
            'Chứng từ khác'
        ];

        foreach($array_name as $item){
            \App\Voucher::create([
                'name' => $item
            ]);
        }
    }
}
