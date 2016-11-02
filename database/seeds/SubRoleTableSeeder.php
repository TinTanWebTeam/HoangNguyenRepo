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
        //admin
        for ($i = 1; $i < 11; $i++) {
            SubRole::create([
                'user_id'   => 1,
                'role_id'   => $i,
                'createdBy' => 1,
                'updatedBy' => 1
            ]);
        }

        //user
        for ($i = 3; $i < 11; $i++) {
            SubRole::create([
                'user_id'   => 2,
                'role_id'   => $i,
                'createdBy' => 1,
                'updatedBy' => 1
            ]);
        }
    }
}
