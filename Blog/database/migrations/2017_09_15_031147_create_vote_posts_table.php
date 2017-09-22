<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vote_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('post_id')->lenght(11)->unsigned();
            $table->foreign('post_id')->references('id')->on('post');
            $table->integer('status')->lenght(1);
            $table->integer('user_id')->lenght(11)->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('vote_posts');
    }
}
