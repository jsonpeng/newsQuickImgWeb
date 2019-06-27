<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNoticesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->increments('id');
            $table->longtext('content')->comment('消息内容');
            $table->string('link')->nullable()->comment('消息链接地址');
    
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('read')->nullable()->default(0)->comment('读取状态0未读1已读');

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
        Schema::drop('notices');
    }
}
