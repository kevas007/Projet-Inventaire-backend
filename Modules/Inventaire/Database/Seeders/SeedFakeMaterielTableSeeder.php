<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventaire\Entities\Materiel;

class SeedFakeMaterielTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Materiel::factory(10)->create();
        // $this->call("OthersTableSeeder");
    }
}
