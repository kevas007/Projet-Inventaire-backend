<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypeSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('types')->insert([
            ['nom' => "Ordinateur Fixe"],
            ['nom' => "Ordinateur Portable"],
            ['nom' => "GSM"],
            ['nom' => "Tablette"],
            ['nom' => "Camera"],
            ['nom' => "Autre"],

        ]);
        // $this->call("OthersTableSeeder");
    }
}
