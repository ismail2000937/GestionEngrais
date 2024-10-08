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
        Schema::create('moy_acides', function (Blueprint $table) {
           
            

            $table->id('id_moy');
            $table->string('densite');
            $table->string('Tc');
            $table->string('p2o5');
            $table->string('TS');
            $table->string('SO4');
            $table->string('date_saisi');
            $table->string('saiseur');
            $table->unsignedBigInteger('id_acide');
            $table->foreign('id_acide')->references('id_acide')->on('acides')->onDelete('cascade');
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
        Schema::dropIfExists('moy_acides');
    }
};