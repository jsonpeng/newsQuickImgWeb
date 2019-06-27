<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeZuosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('he_zuos', function (Blueprint $table) {
            $table->increments('id');

            $table->string('image')->comment('图片');
            $table->string('link')->comment('链接');
            $table->string('type')->nullable()->default('内容')->comment('合作类型 内容/战略');

            $table->timestamps();
            $table->softDeletes();
            $table->index(['id','created_at']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('he_zuos');
    }
}
