<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'username' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => encrypt('123456',Config::get('app.key'))
        ]);
        User::create([
        	'username' => 'user',
        	'email' => 'user@gmail.com',
        	'password' => encrypt('123456',Config::get('app.key'))
        ]);
    }
}
