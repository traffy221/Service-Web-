<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->integer('id_partie');
            $table->integer('id_circons');
            $table->integer('bureaudevote');
            $table->timestamps();
        });
        Schema::table('votes', function($table) {
            $table->foreign('id_partie')->references('id_partie')->on('parties');
            $table->foreign('id_circons')->references('id_circons')->on('circonscriptions');
            $table->foreign('bureaudevote')->references('bureau')->on('electeurs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votes');
    }
}
