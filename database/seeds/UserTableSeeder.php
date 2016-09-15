<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
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
            'fullname' => 'admin',
        	'email' => 'admin@gmail.com',
        	'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 0
        ]);
        User::create([
        	'username' => 'user',
            'fullname' => 'user',
        	'email' => 'user@gmail.com',
        	'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 0
        ]);
        User::create([
            'username' => 'nguyenthibich',
            'fullname' => 'Nguyễn Thị Bích',
            'email' => 'ntbich@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 2
        ]);
        User::create([
            'username' => 'nguyenvanhai',
            'fullname' => 'Nguyễn Văn Hải',
            'email' => 'nvhai@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 1
        ]);
        User::create([
            'username' => 'nguyenvannam',
            'fullname' => 'Nguyễn Văn Nam',
            'email' => 'nvnam@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 1
        ]);
        User::create([
            'username' => 'nguyenvanvu',
            'fullname' => 'Nguyễn Văn Vũ',
            'email' => 'nvvu@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 1
        ]);
    }
}
