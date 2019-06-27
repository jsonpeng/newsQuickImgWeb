<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMessageBoardsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_boards', function (Blueprint $table) {
            $table->increments('id');

            $table->string('content')->comment('评论内容');
            $table->integer('zan')->nullable()->default(0)->comment('获取赞数');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['id','created_at']);
            $table->index('user_id');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('message_boards');
    }
}
