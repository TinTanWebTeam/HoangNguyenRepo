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
        \App\Product::create([
           'productType_id' => '1',
            'name' => 'Bao Vitamin',
            'description' => ''
        ]);

        \App\Product::create([
            'productType_id' => '2',
            'name' => 'Clear Men',
            'description' => ''
        ]);

        \App\Product::create([
            'productType_id' => '3',
            'name' => 'Sợi',
            'description' => ''
        ]);

        \App\Product::create([
            'productType_id' => '3',
            'name' => 'Bông',
            'description' => ''
        ]);

        \App\Product::create([
            'productType_id' => '3',
            'name' => 'Phuy hóa chất',
            'description' => ''
        ]);
    }
}
