<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyAutobusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('autobus', function (Blueprint $table) {
            $table->bigInteger('id_chofer')->unsigned();
            $table->foreign('id_chofer')->references('id')->on('chofer');
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
        Schema::table('autobus', function (Blueprint $table) {
            $table->dropColumn('id_chofer');            
        });
    }
}
