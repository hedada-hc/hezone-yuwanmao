<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique()->comment("用户名昵称");
            $table->string('email')->unique()->comment("邮箱");
            $table->string('phone')->unique()->comment("手机号");
            $table->string('qq')->unique()->comment("qq号码");
            $table->string('wx')->unique()->comment("微信号码");
            $table->string('password')->comment("密码");
            $table->string('gold')->comment("金币");
            $table->string('bank_gold')->comment("银行金币");
            $table->string('bank_password')->comment("银行密码");
            $table->string("confirmation_token")->comment("token");
            $table->smallInteger("is_active")->default(0)->comment("是否激活");
            $table->string('avatar')->default("public/images/head/head".rand(1,10).".png")->comment("用户头像");
            $table->integer('bets28_count')->default(0)->comment("鱼玩28投注数");
            $table->integer('bets16_count')->default(0)->comment("鱼玩16投注数");
            $table->integer('hanguos28_count')->default(0)->comment("韩国28投注数");
            $table->integer('pceggs28_count')->default(0)->comment("pc蛋蛋28投注数");
            $table->string('ip')->comment("ip地址");
            $table->json('setting')->nullabet()->comment("用户设置");
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
