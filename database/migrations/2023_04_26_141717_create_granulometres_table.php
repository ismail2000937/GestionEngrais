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
        Schema::create('granulometres', function (Blueprint $table) {
            $table->id('id_gran');
            $table->string('sup_5');
            $table->string('sup_4_75');
            $table->string('sup_4');
            $table->string('sup_3_15');
            $table->string('sup_2_5');
            $table->string('sup_2');
            $table->string('sup_1');
            $table->string('heure');
            $table->string('saiseur');
            $table->unsignedBigInteger('id_produit');
            $table->foreign('id_produit')->references('id_produit')->on('produits')->onDelete('cascade');
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
        Schema::dropIfExists('granulometres');
    }
};
