<?php

use Illuminate\Database\Seeder;
use DB;

class ProductTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('productTypes')->truncate();
        \App\ProductType::create([
           'name' => 'Thuốc'
        ]);

        \App\ProductType::create([
            'name' => 'Mỹ phẩm'
        ]);

        \App\ProductType::create([
            'name' => 'Hóa chất'
        ]);
    }
}
