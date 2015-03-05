<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscussionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discussions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->index();
            $table->integer('category_id')->index();
            $table->string('title', 100);
            $table->text('body');
            $table->string('slug')->index();
            $table->integer('views')->default(0);
            $table->integer('comment_count')->default(0);
            $table->boolean('locked')->default(0);
            $table->boolean('pinned')->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->integer('updated_by')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('discussions');
    }
}
