<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UtilitySeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('utilities')->insert([
            ['nom' => "Coding"],
            ['nom' => "Marketing"],
            ['nom' => "Prêt PC"],
            ['nom' => "Donations"],
            ['nom' => "Autre"],

        ]);
        // $this->call("OthersTableSeeder");
    }
}
