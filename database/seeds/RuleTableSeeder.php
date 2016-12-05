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
			'description' => 'Khoảng',
        ]);

        \App\Rule::create([
			'name'        => 'Single',
			'shortName'   => 'S',
			'description' => 'Giá trị',
        ]);
    }
}
