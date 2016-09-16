<?php

use Illuminate\Database\Seeder;

class UserVehicleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\UserVehicle::create([
            'vehicle_id' => '1',
            'user_id'    => '1',
            'createdBy'  => '1',
            'updatedBy'  => '1'
        ]);
        \App\UserVehicle::create([
            'vehicle_id' => '2',
            'user_id'    => '2',
            'createdBy'  => '1',
            'updatedBy'  => '1'
        ]);
        \App\UserVehicle::create([
            'vehicle_id' => '3',
            'user_id'    => '3',
            'createdBy'  => '1',
            'updatedBy'  => '1'
        ]);
        \App\UserVehicle::create([
            'vehicle_id' => '4',
            'user_id'    => '4',
            'createdBy'  => '1',
            'updatedBy'  => '1'
        ]);
        \App\UserVehicle::create([
            'vehicle_id' => '5',
            'user_id'    => '5',
            'createdBy'  => '1',
            'updatedBy'  => '1'
        ]);
        \App\UserVehicle::create([
            'vehicle_id' => '6',
            'user_id'    => '6',
            'createdBy'  => '1',
            'updatedBy'  => '1'
        ]);
    }
}
