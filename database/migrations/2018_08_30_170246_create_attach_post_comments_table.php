<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAttachPostCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attach_post_comments', function (Blueprint $table) {
            $table->increments('id');
        
            $table->string('content')->comment('回复内容');
            $table->integer('zan')->nullable()->default(0)->comment('获取赞数');

            $table->integer('comment_id')->unsigned();
            $table->foreign('comment_id')->references('id')->on('post_comments');

            //发布人
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            //回复谁
            $table->integer('reply_user_id')->unsigned();
            $table->foreign('reply_user_id')->references('id')->on('users');

            $table->index(['id','created_at']);
            $table->index('comment_id');
            $table->index('user_id');
            $table->index('reply_user_id');

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
        Schema::drop('attach_post_comments');
    }
}
