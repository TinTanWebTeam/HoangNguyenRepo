<?php

use Illuminate\Database\Seeder;

class DriverVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 5; $i++) {
            \App\DriverVehicle::create([
                'vehicle_id' => $i,
                'driver_id'  => $i,
                'createdBy'  => 1,
                'updatedBy'  => 1
            ]);
        }
    }
}
