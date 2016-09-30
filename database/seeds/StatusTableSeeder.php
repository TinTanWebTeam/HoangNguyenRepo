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
        \App\Status::create([
           'tableName' => 'transports',
           'status' => 'Chưa phân tài',
        ]);
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Đang giao hàng',
        ]);
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Đã giao hàng',
        ]);
        \App\Status::create([
            'tableName' => 'transports',
            'status' => 'Không giao được',
        ]);
    }
}
