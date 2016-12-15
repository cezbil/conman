<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table){
            $table->increments('id');
            $table->integer('concert_id')->unsigned();
            $table->string('company_name');
            $table->integer('concert_funds')->unsigned();
            $table->string('street');
            $table->string('city');
            $table->string('postcode');
            $table->string('phone');
            $table->string('email');
            $table->string('representative_name');
            $table->string('representative_surname');
            $table->text('other_contact');

            $table->foreign("concert_id")->references("id")->on("concert");

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist('client');
    }
}
