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

        $this->call([SeedFakeRolesTableSeeder::class,
        User::class]);
        $this->call([StatutSeederTableSeeder::class, TypeSeederTableSeeder::class, UtilitySeederTableSeeder::class]);
    }
}
