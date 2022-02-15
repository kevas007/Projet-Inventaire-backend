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
            ['name' => "Coding"],
            ['name' => "Marketing"],
            ['name' => "Prêt PC"],
            ['name' => "Donations"],
            ['name' => "Autre"],

        ]);
        // $this->call("OthersTableSeeder");
    }
}
