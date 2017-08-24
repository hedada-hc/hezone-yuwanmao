<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLottersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lotters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("user_id")->unsigned()->index()->comment("投注用户");
            $table->integer("lotter_id")->unsigned()->index()->comment("投注期数");
            $table->json("lotter_num")->nullabet()->comment("投注的号码");
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
        Schema::dropIfExists('user_lotters');
    }
}
