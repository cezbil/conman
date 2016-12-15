<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){

        Schema::create('ticket', function (Blueprint $table){
            $table->increments('id');
            $table->integer('concert_id')->unsigned();
            $table->decimal('amount', 65, 2);
            $table->text('description');
            $table->integer('quantity_initial')->unsigned();
            $table->integer('quantity_left')->unsigned();

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
        Schema::dropIfExist('ticket');
    }
}
