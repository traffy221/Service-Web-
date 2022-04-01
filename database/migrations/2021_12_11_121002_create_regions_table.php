<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('regions', function (Blueprint $table) {
                $table->id('id_reg');
                $table->string('nom_reg');
                $table->float('lattitude');
                $table->float('longitude');
                $table->integer('id_bas')->unsigned();
            });
        Schema::table('regions', function($table) {
            $table->foreign('id_bas')->references('id_bas')->on('bassin');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
