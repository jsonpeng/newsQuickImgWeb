<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCertsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certs', function (Blueprint $table) {
            $table->increments('id');

            $table->enum('type',['个人','企业','媒体'])->comment('认证类型');
            
            $table->string('organization_name')->nullable()->comment('企业/组织 名称');
            $table->string('organization_code')->nullable()->comment('企业/组织 营业执照注册号/组织机构代码');
            $table->string('organization_img')->nullable()->comment('营业执照扫描件');

            $table->string('id_card_name')->comment('身份证姓名');
            $table->string('id_card_num')->comment('身份证号码');
            $table->string('id_card_time_type')->nullable()->default('永久')->comment('身份证有效期类型 永久/截止时间内');
            $table->string('id_card_end_time')->nullable()->comment('身份证截止时间');
            $table->string('id_card_zhengmian')->comment('身份证正面');
            $table->string('id_card_fanmian')->comment('身份证反面');
            $table->string('id_card_shouchi')->comment('手持身份证图');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->enum('status',['审核中','已通过','未通过'])->nullable()->default('审核中')->comment('审核状态');

            $table->timestamps();
            $table->softDeletes();

            $table->index(['id','created_at']);
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('certs');
    }
}
