<?php

use App\Position;
use Faker\Factory;
use Illuminate\Database\Seeder;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'code' => 'TX0001',
            'name' => 'Tài xế',
            'description' => '',
        ]);

        Position::create([
            'code' => 'KT0001',
            'name' => 'Kế toán',
            'description' => '',
        ]);

        Position::create([
            'code' => 'KK0001',
            'name' => 'Kiểm kho',
            'description' => '',
        ]);

        Position::create([
            'code' => 'TN0001',
            'name' => 'Thu ngân',
            'description' => '',
        ]);
    }
}
