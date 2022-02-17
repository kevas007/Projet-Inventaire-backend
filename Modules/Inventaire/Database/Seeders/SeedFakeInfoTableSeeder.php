<?php

namespace Modules\Inventaire\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Inventaire\Entities\Stockage;

class SeedFakeInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $materiels = DB::table('materiels')->get(); // Get all materiels
        foreach ($materiels as $materiel) {
            $stockages =Stockage::inRandomOrder()->first(); // Get all stockages
            DB::table('infos')->insert([
                'processeur' => 'Intel Core i7',
                'ram' => '8 Go',
                'taille_stockage' => '500 Go',
                'marque' => 'HP',
                'description' => 'Ordinateur portable',
                'degats' => 'Aucun',
                'stockage_id' => $stockages->id,
                'materiel_id' => $materiel->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // $this->call("OthersTableSeeder");
    }
}
