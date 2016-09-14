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

        $faker = Factory::create();
        foreach (range(1,20) as $index){
            Position::create([
                'code' => 'CVXXX'. $index,
                'name' => 'tài xế'. $index,
                'description' => 'lai xe'. $index,
            ]);
        }
    }
}
