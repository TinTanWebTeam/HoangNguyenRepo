<?php

use Illuminate\Database\Seeder;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_name = [
            'Thuốc',
            'Mỹ phẩm',
            'Hóa chất'
        ];
        foreach($array_name as $item){
            \App\ProductType::create([
                'name' => $item
            ]);
        }
    }
}
