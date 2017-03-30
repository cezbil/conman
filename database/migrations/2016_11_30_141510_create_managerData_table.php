<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("managerdata", function (Blueprint $table)
        {
            $table->increments("id");
            $table->integer("user_id")->unsigned();
            $table->string("firstname");
            $table->string("lastname");
            $table->string("city");
            $table->string("street");
            $table->string("postcode");
            $table->string("phone");


            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade")->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExist("managerdata");

    }
}
