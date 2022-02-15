<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD

=======
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
>>>>>>> main
class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        //
=======
        DB::table('users')->insert(
            [
                [
                    'firstname'=>Str::random(10),
                    'lastname'=>Str::random(10),
                    'lead_id'=>true,
                    'img'=>'default_avatar.png',
                    'email'=>Str::random(10).'@gmail.com',
                    'password'=>bcrypt('password'),
                    'start_date_contract'=>'2021-10-01',
                    'role_id'=>1,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ],
                [
                    'firstname'=>Str::random(10),
                    'lastname'=>Str::random(10),
                    'lead_id'=>false,
                    'img'=>'default_avatar.png',
                    'email'=>Str::random(10).'@gmail.com',
                    'password'=>bcrypt('secret'),
                    'start_date_contract'=>'2021-10-01',
                    'role_id'=>2,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ]
            ]
        );
>>>>>>> main
    }
}
