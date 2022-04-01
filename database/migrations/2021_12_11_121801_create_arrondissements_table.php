<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrondissementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrondissements', function (Blueprint $table) {
            $table->id('id_arrondissement');
            $table->string('nom_arrondissement');
            $table->float('lattitude');
            $table->float('longitude');
            $table->integer('id_dep')->unsigned();

        });
        Schema::table('arrondissements', function($table) {
            $table->foreign('id_dep')->references('id_dep')->on('departements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrondissements');
    }
}
