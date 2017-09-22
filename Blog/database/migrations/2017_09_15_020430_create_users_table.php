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
            $table->integer('level_id')->length(11)->unsigned();
            $table->foreign('level_id')->references('id')->on('level');
            $table->string('email', 50);
            $table->string('password', 250);
            $table->string('token', 250);
            $table->integer('activate')->lenght(1)->default(0);
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->string('avatar');
            $table->dateTime('token_datetime');
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
