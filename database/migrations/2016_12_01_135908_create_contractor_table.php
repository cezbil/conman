<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor', function (Blueprint $table){
            $table->increments('id');
            $table->integer('concert_id')->unsigned();
            $table->string('company_name');
            $table->decimal('initial_payment',65,2)->unsigned();
            $table->decimal('full_payment', 65, 2)->unsigned();
            $table->string('type');
            $table->text('description');

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
        Schema::dropIfExists('contractor');
    }
}
