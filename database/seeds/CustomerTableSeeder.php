<?php

use App\User;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'code'     => 'KH001',
            'fullName' => 'Nguyễn Văn Xinh',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nva@gmail.com',
            'createdBy'=> '1',
        ]);
        User::create([
            'code'     => 'KH002',
            'fullName' => 'Nguyễn Văn Nghĩa',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nva@gmail.com',
            'createdBy'=> '1',
        ]);
        User::create([
            'code'     => 'KH003',
            'fullName' => 'Nguyễn Văn Hòa',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nva@gmail.com',
            'createdBy'=> '1',
        ]);
        User::create([
            'code'     => 'KH004',
            'fullName' => 'Nguyễn Văn lãm',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nva@gmail.com',
            'createdBy'=> '1',
        ]);
        User::create([
            'code'     => 'KH005',
            'fullName' => 'Nguyễn Văn Khởi',
            'address'  => '662 Le Quang Dinh',
            'phone'    => '09000000',
            'email'    => 'nva@gmail.com',
            'createdBy'=> '1',
        ]);
    }
}
