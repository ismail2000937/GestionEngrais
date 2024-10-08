<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sortie_granuls', function (Blueprint $table) {
            $table->id('id_sortie');
            $table->string('AL');
            $table->string('P2O5_SE');
            $table->string('H2O');
            $table->string('heure');
            $table->string('saiseur');
            $table->unsignedBigInteger('id_tsp');
            $table->foreign('id_tsp')->references('id_tsp')->on('tsps_produits')->onDelete('cascade');
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
        Schema::dropIfExists('sortie_granuls');
    }
};