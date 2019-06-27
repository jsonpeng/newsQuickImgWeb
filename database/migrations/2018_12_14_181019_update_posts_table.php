<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdatePostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'is_top')) {
                $table->integer('is_top')->default(0)->comment('是否置顶 0不置顶1置顶');
            }
            if (!Schema::hasColumn('posts', 'like')) {
                $table->integer('like')->default(0)->comment('喜欢');
            }
            if (!Schema::hasColumn('posts', 'dislike')) {
                $table->integer('dislike')->default(0)->comment('不喜欢');
            }
            if (!Schema::hasColumn('posts', 'author_type')) {
                $table->string('author_type')->nullable()->default('admin')->comment('admin 管理员发的 user 用户发布');
            }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
     
    }
}
