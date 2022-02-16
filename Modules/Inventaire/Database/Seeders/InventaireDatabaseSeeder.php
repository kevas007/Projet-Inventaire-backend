<?php

namespace Modules\Inventaire\Database\Seeders;

use Database\Seeders\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Inventaire\Entities\Materiel;

class InventaireDatabaseSeeder extends Seeder
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
        $this->call([
            SeedFakeRolesTableSeeder::class,
            User::class,
            SeedFakePlacesTableSeeder::class,
            SeedFakeStockagesTableSeeder::class,
            SeedFakeUtilitiesTableSeeder::class,
            StatutSeederTableSeeder::class,
            TypeSeederTableSeeder::class,
            SeedFakeMaterielTableSeeder::class,
            SeedStatutContratsTableSeeder::class,
            SeedFakeEmprunteurTableSeeder::class,
            SeedFakeContratTableSeeder::class,
        ]);


    }
}
