<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedFakeStockagesTableSeeder extends Seeder
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
        DB::table('stockages')->insert(
            [
                [
                    "name" => "HDD"
                ],
                [
                    "name" => "SSD"
                ],
                [
                    "name" => "Carte SD"
                ],
                [
                    "name" => "Carte micro sd"
                ],
                [
                    "name" => "Autre"
                ],
            ]
        );
    }
}
