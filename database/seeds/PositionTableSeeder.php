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
        $array_name = [
            'Kế toán',
            'Kiểm kho',
            'Thu ngân'
        ];

        foreach($array_name as $item){
            Position::create([
                'name' => $item,
                'description' => $item,
            ]);
        }
    }
}
