<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCirconscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('circonscriptions', function (Blueprint $table) {
            $table->id('id_circons');
            $table->string('circonscription');
            $table->integer('nbr_inscrit');
            $table->integer('suffr_expr');
            $table->integer('suff_val');
            $table->integer('suff_inval');
            $table->integer('nbrbureau');
            $table->float('lattitude');
            $table->float('longitude');
            $table->integer('id_reg')->unsigned();
            $table->integer('id_dep')->unsigned();
            $table->integer('id_arrondissement')->unsigned();
            $table->timestamps();

        });
        Schema::table('circonscriptions', function($table) {
            $table->foreign('id_reg')->references('id_reg')->on('region');
            $table->foreign('id_dep')->references('id_dep')->on('departements');
            $table->foreign('id_arrondissement')->references('id_arrondissement')->on('arrondissements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('circonscriptions');
    }
}
