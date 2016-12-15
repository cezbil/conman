<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertisement', function (Blueprint $table){
            $table->increments('id');
            $table->integer('concert_id')->unsigned();
            $table->string('name');
            $table->string('type');
            $table->decimal('price', 65, 2);
            $table->integer('quantity');

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
        Schema::dropIfExist('advertisement');
    }
}
