<?php

use Illuminate\Database\Seeder;

class RuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Rule::create([
			'name'        => 'Range',
			'shortName'   => 'R',
			'description' => 'Một khoảng',
        ]);

        \App\Rule::create([
			'name'        => 'Single',
			'shortName'   => 'S',
			'description' => 'Giá trị',
        ]);

        \App\Rule::create([
			'name'        => 'Pair',
			'shortName'   => 'P',
			'description' => 'Một cặp',
        ]);

        \App\Rule::create([
			'name'        => 'OilPrice',
			'shortName'   => 'O',
			'description' => 'Giá dầu',
        ]);

        \App\Rule::create([
			'name'        => 'ProductCode',
			'shortName'   => 'PC',
			'description' => 'Mã hàng',
        ]);
    }
}
