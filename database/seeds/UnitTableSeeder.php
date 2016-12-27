<?php

use App\Unit;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'VNĐ/Kg',
            'VNĐ/Tấn',
            'VNĐ/Khối',
            'VNĐ/Thùng',
            'VNĐ/Cây'
        ];

        foreach($array_name as $name){
            Unit::create([
                'name'        => $name,
                'description' => '',
            ]);
        }
    }
}
