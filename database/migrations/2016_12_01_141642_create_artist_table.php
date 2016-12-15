<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artist', function (Blueprint $table){
            $table->increments('id');
            $table->integer('concert_id')->unsigned();
            $table->string('name');
            $table->decimal('initial_payment',65,2)->unsigned();
            $table->decimal('full_payment', 65, 2)->unsigned();
            $table->time('performance_time');

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
        Schema::dropIfExist('artist');

    }
}
