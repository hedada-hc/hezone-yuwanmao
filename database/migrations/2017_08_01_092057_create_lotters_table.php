<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLottersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('lotter_time')->unique()->comment("开奖时间");
            $table->integer('num1')->comment("开奖号码一");
            $table->integer('num2')->comment("开奖号码二");
            $table->integer('num3')->comment("开奖号码三");
            $table->integer('lotter_res')->comment("开奖结果");
            $table->integer('lotter_count')->default(0)->comment("中奖人数");
            $table->json()
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
        Schema::dropIfExists('lotters');
    }
}
