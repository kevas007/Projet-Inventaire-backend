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
            ['nom'=>"Prêté"],
            ['nom'=>"Libre"],
            ['nom'=>"Libre jusqu'à "],
            ['nom'=>"Perdu"],
            ['nom'=>"Volé"],
        ]);
        // $this->call("OthersTableSeeder");
    }
}
