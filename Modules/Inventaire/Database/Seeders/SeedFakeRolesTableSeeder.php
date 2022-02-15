<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedFakeRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('roles')->insert(
            [
                [
<<<<<<< HEAD
                    'name' => 'superadmin',
                ],
                [
                    "name" => "admin",
                ],
                [
                    'name' => 'lead',
                ],
                [
                    "name" => "user",
=======
                    "nom" => "admin",
                ],
                [
                    "nom" => "user",
>>>>>>> 68a7c2c4578d811d8f27963b1054127d05e69c3b
                ],
            ]
        );
    }
}
