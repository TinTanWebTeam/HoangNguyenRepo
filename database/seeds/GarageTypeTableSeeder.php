<?php

use Illuminate\Database\Seeder;

class GarageTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Xe công ty',
            'Xe ngoài'
        ];

        foreach($array_name as $item){
            \App\GarageType::create([
                'name' => $item
            ]);
        }
    }
}
