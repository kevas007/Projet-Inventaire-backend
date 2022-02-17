<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaterielsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiels', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('numero_serie');
            $table->string('token')->unique();
            $table->foreignId('utility_id')->constrained();
            $table->foreignId('statut_id')->constrained();
            $table->foreignId('type_id')->constrained();
            $table->foreignId('place_id')->constrained();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materiels');
    }
}
