<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('comments', function (Blueprint $table) {
          $table->increments('id');
          $table->text('body');
          $table->integer('thread_id')->unsigned();
          $table->integer('user_id')->unsigned();
          $table->timestamps();
          $table->foreign('thread_id')->references('id')->on('threads')->onDelete('cascade');
          $table->foreign('user_id')->references('id')->on('users');
      });

      Schema::table('threads', function (Blueprint $table) {
        $table->dropForeign('threads_user_id_foreign');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('comments');
    }
}
