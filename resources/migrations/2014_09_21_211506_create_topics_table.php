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
            $table->integer('category_id')->index();
            $table->string('title', 100);
            $table->string('slug')->index();
            $table->integer('views')->default(0);
            $table->integer('replies_count')->default(0);
            $table->boolean('locked')->default(0);
            $table->boolean('pinned')->default(0);
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
