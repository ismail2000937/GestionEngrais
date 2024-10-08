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
        Schema::create('titre_tsps', function (Blueprint $table) {
            $table->id('id_titsp');
            $table->string('H2O');
            $table->string('AL_T');
            $table->string('P2O5_SE_T');
            $table->string('P2O5_SE_CIT');
            $table->string('TOT');
            $table->string('h2O_T');
            $table->string('H2O_B');
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
        Schema::dropIfExists('titre_tsps');
    }
};