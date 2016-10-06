<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr_status1 = [
            "Chưa phân tài",
            "Đang giao hàng",
            "Đã giao hàng",
            "Không giao được"
        ];
        $arr_status2 = [
            "Chưa thanh toán",
            "Đã thanh toán",
            "Đã thanh toán và xuất hóa đơn"
        ];

        foreach ($arr_status1 as $status)
        {
            \App\Status::create([
                'tableName' => 'transports',
                'status' => $status
            ]);
        }

        foreach ($arr_status2 as $status)
        {
            \App\Status::create([
                'tableName' => 'transports-customer',
                'status' => $status
            ]);
        }

        foreach ($arr_status2 as $status)
        {
            \App\Status::create([
                'tableName' => 'transports-garage',
                'status' => $status
            ]);
        }


    }
}
