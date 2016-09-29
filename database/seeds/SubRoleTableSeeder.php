<?php

use App\SubRole;
use Illuminate\Database\Seeder;

class SubRoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubRole::create([
            'user_id'   => 1,
            'role_id'   => 1,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 2,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 3,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 4,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 5,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 6,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 7,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 8,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 9,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 10,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);

        //user
        SubRole::create([
            'user_id'    => 2,
            'role_id'    => 2,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 2,
            'role_id'    => 3,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
        SubRole::create([
            'user_id'    => 2,
            'role_id'    => 4,
            'createdBy' => 1,
            'updatedBy' => 1
        ]);
    }
}
