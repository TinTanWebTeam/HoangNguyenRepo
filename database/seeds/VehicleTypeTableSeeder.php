<?php

use Illuminate\Database\Seeder;

class VehicleTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\VehicleType::create([
           'name' => '8 tấn'
        ]);
        \App\VehicleType::create([
            'name' => 'Xe container'
        ]);
        \App\VehicleType::create([
            'name' => 'Xe tải'
        ]);
        \App\VehicleType::create([
            'name' => 'Xe con'
        ]);
    }
}
