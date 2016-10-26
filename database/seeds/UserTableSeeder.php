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
            'username' => 'tts_hoangnguyen',
            'fullname' => 'Công ty phần mềm Tin Tấn',
            'email' => 'info@tintansoft.com',
            'password' => encrypt('4h0n9c0p@55.comA1',Config::get('app.key')),
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
            'address' => 'Le Quang Dinh',
            'phone' => '09876542',
            'email' => 'ntbich@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 1
        ]);
        User::create([
            'username' => 'nguyenvanhai',
            'fullname' => 'Nguyễn Văn Hải',
            'address' => 'Nguyen Trai',
            'phone' => '02312566',
            'email' => 'nvhai@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 2
        ]);
        User::create([
            'username' => 'nguyenvannam',
            'fullname' => 'Nguyễn Văn Nam',
            'address' => 'Nguyen Binh Khiem',
            'phone' => '2312324',
            'email' => 'nvnam@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 3
        ]);
        User::create([
            'username' => 'nguyenvanvu',
            'fullname' => 'Nguyễn Văn Vũ',
            'address' => 'Bui Xuan Soan',
            'phone' => '09837744',
            'email' => 'nvvu@hoangnguyen.com',
            'password' => encrypt('123456',Config::get('app.key')),
            'position_id' => 4
        ]);
    }
}
