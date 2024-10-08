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
        Schema::create('tsps_produits', function (Blueprint $table) {
            $table->id('id_tsp');
            $table->unsignedBigInteger('id_ligne');
            $table->foreign('id_ligne')->references('id_ligne')->on('lignes')->onDelete('cascade');
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
        Schema::dropIfExists('tsps_produits');
    }
};
