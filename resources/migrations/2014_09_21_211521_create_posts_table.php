<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('topic_id')->index();
            $table->string('title', '100')->nullable();
            $table->string('slug')->index();
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });

//        Schema::table('posts', function (Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreign('topic_id')->references('id')->on('topics');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
