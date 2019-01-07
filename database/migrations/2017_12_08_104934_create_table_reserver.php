<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReserver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserver', function( Blueprint $table) {
            $table->increments('idReservation');
            $table->date('finPeriode')->nullable();
            $table->integer('idUser')->unsigned();
            $table->foreign('idUser')->references('id_user')->on('membres')->onDelete('cascade');
            $table->integer('idPlace')->unsigned();
            $table->foreign('idPlace')->references('idPlace')->on('place')->onDelete('cascade');
            $table->date('debutPeriode');
            $table->foreign('debutPeriode')->references('debutPeriode')->on('periode')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reserver');
    }
}
