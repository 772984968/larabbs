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
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->string('avatar')->nullable();
            $table->string('introduction')->nullable();
            $table->integer('notification_count')->unsigned()->default(0);
            $table->string('weixin_openid')->unique()->nullable()->comment('微信产品iD');
            $table->string('weixin_unionid')->unique()->nullable()->comment('微信唯一ID');
            $table->string('phone')->nullable()->unique();
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
