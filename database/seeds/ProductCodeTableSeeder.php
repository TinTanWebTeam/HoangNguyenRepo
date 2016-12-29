<?php

use Illuminate\Database\Seeder;

class ProductCodeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_code = [
            'M', 'N', 'O', 'P'
        ];

        for($i = 1; $i <= 7; $i ++) {
            foreach($array_code as $item) {
                \App\ProductCode::create([
                    'code'       => $item,
                    'product_id' => $i
                ]);
            }
        }
    }
}
