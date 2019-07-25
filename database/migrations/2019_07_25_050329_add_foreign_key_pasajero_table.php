<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyPasajeroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pasajero', function (Blueprint $table) {
            $table->bigInteger('id_autobus')->unsigned();
            $table->foreign('id_autobus')->references('id')->on('autobus');
            $table->bigInteger('id_boleto')->unsigned();
            $table->foreign('id_boleto')->references('id')->on('boleto');
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
        Schema::table('pasajero', function (Blueprint $table) {
            $table->dropColumn('id_autobus');            
            $table->dropColumn('id_boleto');
        });
    }
}
