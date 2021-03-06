<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'firstname'=>'admin',
                    'lastname'=>'Cathy',
                    'lead_id'=>true,
                    'img'=>'admin.png',
                    'email'=>'cathy@cathy.com',
                    'password'=>bcrypt('password'),
                    'start_date_contract'=>'2021-10-01',
                    'role_id'=>3,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'firstname'=>Str::random(10),
                    'lastname'=>Str::random(10),
                    'lead_id'=>false,
                    'img'=>'avatar.png',
                    'email'=>Str::random(10).'@gmail.com',
                    'password'=>bcrypt('secret'),
                    'start_date_contract'=>'2021-10-01',
                    'role_id'=>2,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]
            ]
        );
    }
}
