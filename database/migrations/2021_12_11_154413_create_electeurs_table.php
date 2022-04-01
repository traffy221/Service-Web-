<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElecteursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electeurs', function (Blueprint $table) {
            $table->id();
            $table->string('cni');
            $table->integer('num_electeur');
            $table->string('nom');
            $table->string('prenom');
            $table->date('datedenaissance');
            $table->string('adresse');
            $table->string('password');
            $table->string('lieudevote');
            $table->integer('bureau');
            $table->string('circonscription');
            $table->timestamps();

        });
        Schema::table('electeurs', function($table) {
            $table->foreign('circonscription')->references('circonscription')->on('circonscriptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('electeurs');
    }
}
