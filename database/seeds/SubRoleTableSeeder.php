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
            'user_id'    => 1,
            'role_id'    => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 2,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 3,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 4,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 5,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 6,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 7,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 8,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 9,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 1,
            'role_id'    => 10,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        //user
        SubRole::create([
            'user_id'    => 2,
            'role_id'    => 2,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 2,
            'role_id'    => 3,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        SubRole::create([
            'user_id'    => 2,
            'role_id'    => 4,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
