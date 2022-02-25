<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContratsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emprunteur_id')->nullable()->constrained();

            $table->foreignId('team_id')->nullable()->constrained("users");

            $table->foreignId('preteur_id')->constrained('users');
            $table->datetime('fin_contrat')->nullable();
            $table->foreignId('statut_contrat_id')->constrained();
            $table->foreignId('materiel_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
}
