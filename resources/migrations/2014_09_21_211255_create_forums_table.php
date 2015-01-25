<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forums', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->index();
            $table->string('title');
            $table->string('slug')->index();
            $table->text('description');
            $table->integer('topics');
            $table->integer('posts');
            $table->softDeletes();
            $table->timestamps();
        });

//        Schema::table('forums', function (Blueprint $table) {
//            $table->foreign('parent_id')->references('id')->on('forums');
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('forums');
    }
}
