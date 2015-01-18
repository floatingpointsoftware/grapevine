<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('forum_id')->index();
            $table->string('title', 100);
            $table->integer('views');
            $table->integer('posts');
            $table->boolean('locked');
            $table->boolean('pinned');
            $table->softDeletes();
            $table->timestamps();
        });

//        Schema::table('topics', function (Blueprint $table) {
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->foreigh('forum_id')->references('id')->on('forums');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topics');
    }
}
