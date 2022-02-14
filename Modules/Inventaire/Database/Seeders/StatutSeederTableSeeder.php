<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class StatutSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('statuts')->insert([
            ['name'=>"Prêté"],
            ['name'=>"Libre"],
            ['name'=>"Libre jusqu'à "],
            ['name'=>"Perdu"],
            ['name'=>"Volé"],
        ]);
        // $this->call("OthersTableSeeder");
    }
}
