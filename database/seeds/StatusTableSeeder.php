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
        //1
        \App\Status::create([
           'tableName' => 'transports',
           'status' => 'Chưa phân tài',
        ]);
        //2
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Đang giao hàng',
        ]);
        //3
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Đã giao hàng',
        ]);
        //4
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Không giao được',
        ]);
        //5
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Chưa thanh toán',
        ]);
        //6
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Đã thanh toán',
        ]);
        //7
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Đã xuất hóa đơn',
        ]);
        //8
        \App\Status::create([
            'tableName' => 'transports-customer',
            'status' => 'Không xuất hóa đơn',
        ]);
        //9
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Đã giao nhà xe',
        ]);
        //10
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Chưa giao nhà xe',
        ]);

    }
}
