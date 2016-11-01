<?php

use Illuminate\Database\Seeder;

class VehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Vehicle::create([
           'vehicleType_id' => '1',
            'garage_id' => '1',
            'areaCode' => '54N',
            'vehicleNumber' => '1111',
            'size' => '8',
            'weight' => '5',
            'owner' => 'Nguyễn Văn A'
        ]);

        \App\Vehicle::create([
            'vehicleType_id' => '1',
            'garage_id' => '1',
            'areaCode' => '54N',
            'vehicleNumber' => '2222',
            'size' => '8',
            'weight' => '5',
            'owner' => 'Nguyễn Văn B'
        ]);

        \App\Vehicle::create([
            'vehicleType_id' => '1',
            'garage_id' => '1',
            'areaCode' => '52N',
            'vehicleNumber' => '3333',
            'size' => '5',
            'weight' => '3',
            'owner' => 'Nguyễn Văn C'
        ]);

        \App\Vehicle::create([
            'vehicleType_id' => '2',
            'garage_id' => '2',
            'areaCode' => '58N',
            'vehicleNumber' => '4444',
            'size' => '2',
            'weight' => '9',
            'owner' => 'Nguyễn Văn D'
        ]);

        \App\Vehicle::create([
            'vehicleType_id' => '2',
            'garage_id' => '2',
            'areaCode' => '60N',
            'vehicleNumber' => '5555',
            'size' => '12',
            'weight' => '5',
            'owner' => 'Nguyễn Văn E'
        ]);

        \App\Vehicle::create([
            'vehicleType_id' => '3',
            'garage_id' => '3',
            'areaCode' => '62N',
            'vehicleNumber' => '6666',
            'size' => '12',
            'weight' => '5',
            'owner' => 'Nguyễn Văn F'
        ]);
    }
}
