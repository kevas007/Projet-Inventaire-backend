<?php

namespace Modules\Inventaire\Database\Seeders;

use Database\Seeders\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

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
            SeedFakePlacesTableSeeder::class,
            SeedFakeStockagesTableSeeder::class,
            SeedFakeUtilitiesTableSeeder::class,
        ]);

        $this->call([SeedFakeRolesTableSeeder::class,
        User::class, StatutSeederTableSeeder::class, TypeSeederTableSeeder::class, UtilitySeederTableSeeder::class,SeedStatutContratsTableSeeder::class]);
    }
}
