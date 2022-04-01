<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id('id_partie');
            $table->string('nom_partie');
            $table->integer('num_electeur')->unsigned();
            $table->integer('nbrdevote');
            $table->timestamps();
        });
        Schema::table('electeurs', function($table) {
            $table->foreign('num_electeur')->references('num_electeurs')->on('electeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parties');
    }
}
