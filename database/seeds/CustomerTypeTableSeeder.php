<?php

use Illuminate\Database\Seeder;

class CustomerTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\CustomerType::create([
            'name' => 'Công ty'
        ]);
        \App\CustomerType::create([
           'name' => 'Cá nhân'
        ]);
    }
}
