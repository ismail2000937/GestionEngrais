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
        Schema::create('moyenne_tsps', function (Blueprint $table) {
            $table->id('id_moytsp');
            $table->string('AL');
            $table->string('P2O5_SE');
            $table->string('p2O5_SE_C');
            $table->string('TOT');
            $table->string('H2O_T');
            $table->string('H2O_B');
            $table->string('sup_6_3');
            $table->string('sup_5');
            $table->string('sup_4');
            $table->string('sup_3_15');
            $table->string('sup_2_5');
            $table->string('sup_2');
            $table->string('sup_1');
            $table->string('date_saisi');
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
        Schema::dropIfExists('moyenne_tsps');
    }
};
