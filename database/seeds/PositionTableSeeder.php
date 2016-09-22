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
            'name' => 'Tài xế',
            'description' => '',
        ]);

        Position::create([
            'name' => 'Kế toán',
            'description' => '',
        ]);

        Position::create([
            'name' => 'Kiểm kho',
            'description' => '',
        ]);

        Position::create([
            'name' => 'Thu ngân',
            'description' => '',
        ]);
    }
}
