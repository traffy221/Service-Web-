<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departements', function (Blueprint $table) {
            $table->id('id_dep');
            $table->string('nom_dep');
            $table->float('lattitude');
            $table->float('longitude');
            $table->integer('id_region')->unsigned();
        });
        Schema::table('departements', function($table) {
            $table->foreign('id_region')->references('id_region')->on('regions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departements');
    }
}
