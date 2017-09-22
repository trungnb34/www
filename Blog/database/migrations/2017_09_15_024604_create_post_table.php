<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('avatar');
            $table->text('fulltext');
            $table->integer('approval')->length(1);
            $table->dateTime('time_delete');
            $table->integer('user_id')->lenght(11)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->lenght(11)->unsigned();
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->integer('post_type_id')->lenght(11)->unsigned();
            $table->foreign('post_type_id')->references('id')->on('post_types');
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
        Schema::dropIfExists('post');
    }
}
