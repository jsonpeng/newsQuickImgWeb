<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostAdminsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_admins', function (Blueprint $table) {
            $table->increments('id');
     
            $table->integer('post_id')->unsigned();
            $table->foreign('post_id')->references('id')->on('posts');

            $table->integer('admin_id')->unsigned();
            $table->foreign('admin_id')->references('id')->on('admins');

            $table->timestamps();
            $table->softDeletes();

            $table->index(['id','created_at']);
            $table->index('post_id');
            $table->index('admin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_admins');
    }
}
