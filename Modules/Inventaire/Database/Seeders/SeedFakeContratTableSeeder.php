<?php

namespace Modules\Inventaire\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Inventaire\Entities\Emprunteur;
use Modules\Inventaire\Entities\Materiel;
use Modules\Inventaire\Entities\StatutContrat;

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
        $emprunteur_id = Emprunteur::inRandomOrder()->first()->id;
        $preteur_id = User::inRandomOrder()->where('lead_id', true)->first()->id;
        DB::table('contrats')->insert([
            [
                'emprunteur_id'=>$emprunteur_id,
                'preteur_id'=>$preteur_id,
                'statut_contrat_id'=>StatutContrat::inRandomOrder()->first()->id,
                'materiel_id'=>Materiel::inRandomOrder()->first()->id
            ],
        ]);
    }
}
