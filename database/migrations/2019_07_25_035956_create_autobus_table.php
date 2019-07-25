<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutobusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autobus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type',100);
            $table->smallInteger('size');
            $table->string('number',100);
            $table->timeTz('hLeave');  
            $table->dateTimeTz('dateLeave');
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
        Schema::dropIfExists('autobus');
    }
}
