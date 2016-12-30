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

        $arr_status3 = [
            "Phiếu thanh toán",
            "Hóa đơn",
            "Trả đủ"
        ];

        foreach ($arr_status1 as $status)
        {
            \App\Status::create([
                'tableName' => 'vehicles',
                'status' => $status
            ]);
        }
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

        foreach ($arr_status3 as $status)
        {
            \App\Status::create([
                'tableName' => 'transports-invoice',
                'status' => $status
            ]);
        }

        foreach ($arr_status3 as $status)
        {
            if($status != "Trả đủ") { 
                \App\Status::create([
                    'tableName' => 'invoices',
                    'status' => $status
                ]);
            }
        }


    }
}
