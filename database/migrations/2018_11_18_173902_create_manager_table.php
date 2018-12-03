<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManagerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 创建数据表
        Schema::create('manager', function (Blueprint $table) {
            $table->increments('id'); // 自增主键
            $table->string('username', 20)->notnull()->comment('用户名');
            $table->string('password', 255)->notnull()->comment('密码');
            $table->enum('gender', ['男', '女', '保密'])->notnull()->default('男')->comment('性别');
            $table->char('mobile', 11)->nullable()->comment('手机号');
            $table->string('email', 40)->nullable()->comment('邮箱地址');
            $table->tinyInteger('role_id')->nullable()->comment('角色id');
            $table->timestamps(); // 会自动添加 created_at 和 updated_at 字段
            $table->rememberToken(); // 会自动添加 remmenber_token 列：VARCHAR(100) NULL
            $table->enum('status', ['1', '2'])->notnull()->default('2')->comment('状态：1=禁用，2=启用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 删除数据表
        Schema::dropIfExists('manager');
    }
}
