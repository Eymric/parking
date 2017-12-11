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
            $table->date('finPeriode');
            $table->integer('pseudo')->foreign()->references('pseudo')->on('membres');
            $table->integer('idPlace')->unsigned()->foreign()->references('idPlace')->on('place');
            $table->date('debutPeriode')->foreign()->references('debutPeriode')->on('periode');
            $table->primary(array('debutPeriode', 'pseudo', 'idPlace'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
