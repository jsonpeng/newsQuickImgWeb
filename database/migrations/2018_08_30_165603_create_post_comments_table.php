<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostCommentsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->increments('id');

            $table->string('content')->comment('评论内容');
            $table->integer('zan')->nullable()->default(0)->comment('获取赞数');

            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->index(['id','created_at']);
            $table->index('post_id');
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
        Schema::dropIfExists('post_comments');
    }
}
