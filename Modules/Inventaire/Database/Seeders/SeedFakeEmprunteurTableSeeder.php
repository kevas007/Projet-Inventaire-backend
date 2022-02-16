<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventaire\Entities\Emprunteur;

class SeedFakeEmprunteurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Emprunteur::factory()->count(5)->create();
        // $this->call("OthersTableSeeder");
    }
}
