<?php

namespace Modules\Inventaire\Database\Seeders;

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

        $this->call(["StatutSeederTableSeeder", "TypeSeederTableSeeder", "UtilitySeederTableSeeder"]);
    }
}
