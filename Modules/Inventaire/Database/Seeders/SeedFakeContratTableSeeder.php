<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventaire\Entities\Emprunteur;

class SeedFakeContratTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('contrats')->insert([
            [
                'emprunteur_id'=>Emprunteur::inRandomOrder()->first()->id,
            ],
        ]);
    }
}
