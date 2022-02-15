<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedFakePlacesTableSeeder extends Seeder
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
        DB::table('places')->insert(
            [
                [
                    "name" => "Molengeek"
                ],
                [
                    "name" => "Charlewood"
                ],
                [
                    "name" => "Laeken"
                ],
                [
                    "name" => "Borgerhub"
                ],
            ]
        );
    }
}