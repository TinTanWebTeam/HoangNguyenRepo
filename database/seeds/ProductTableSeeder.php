<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Sợi',
            'Bông',
            'Bao vitamin',
            'Phuy hóa chất',
            'Kiện',
            'Bao',
            'Thùng'
        ];

        foreach($array_name as $key=>$value){
            \App\Product::create([
                'productType_id' => 1,
                'name' => $value,
                'description' => $value
            ]);
        }
    }
}
