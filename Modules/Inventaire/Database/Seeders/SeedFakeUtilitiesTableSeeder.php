<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedFakeUtilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        DB::table('utilities')->insert(
            [
                [
                    "name" => "Coding"
                ],
                [
                    "name" => "Marketing"
                ],
                [
                    "name" => "Prêt PC"
                ],
                [
                    "name" => "Donation"
                ],
                [
                    "name" => "Autre"
                ],
            ]
        );
    }
}
