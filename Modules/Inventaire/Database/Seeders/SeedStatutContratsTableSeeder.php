<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SeedStatutContratsTableSeeder extends Seeder
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
        DB::table('statut_contrats')->insert(
            [
                [
                    "nom" => "Créer",
                ],
                [
                    "nom" => "Signer",
                ],
                [
                    "nom" => "Fini",
                ],
                [
                    "nom" => "Problème",
                ],
            ]);
    }
}
