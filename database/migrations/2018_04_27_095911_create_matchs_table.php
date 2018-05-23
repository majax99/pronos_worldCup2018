<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matchs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('equipe1');
            $table->string('equipe2');
            $table->string('type');
            $table->integer('resultat1')->nullable($value = true);
            $table->integer('resultat2')->nullable($value = true);
            $table->string('phase');
            $table->string('phase2');
            $table->dateTime('date_match');
            $table->string('lieu');
            $table->string('chaine_TV');
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
        Schema::dropIfExists('matchs');
    }
}
