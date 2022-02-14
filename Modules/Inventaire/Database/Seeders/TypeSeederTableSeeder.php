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
            ['name' => "Ordinateur Fixe"],
            ['name' => "Ordinateur Portable"],
            ['name' => "GSM"],
            ['name' => "Tablette"],
            ['name' => "Camera"],
            ['name' => "Autre"],

        ]);
        // $this->call("OthersTableSeeder");
    }
}
