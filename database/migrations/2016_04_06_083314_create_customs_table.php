<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('pid');
            $table->string('name_last');
            $table->string('name_first');
            $table->string('name_middle');
            $table->string('phone');
            $table->string('email');
            $table->string('city');
            $table->string('street');
            $table->string('building');
            $table->string('flat');
            $table->integer('card_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customs');
    }
}
