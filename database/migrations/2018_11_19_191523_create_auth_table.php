<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 创建数据表auth
        Schema::create('auth',function(Blueprint $table){
            $table->increments('id');
            $table->string('auth_name',20)->notnull()->comment('权限名称');
            $table->string('controller',40)->nullable()->comment('控制器名称');
            $table->string('action',30)->nullable()->comment('方法名称');
            $table->tinyInteger('pid')->notnull()->default(0)->comment('父级id');
            $table->enum('is_nav',['1','2'])->notnull()->default('1')->comment('是否作为菜单：1=是，2=否');
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
        Schema::dropIfExists('auth');
    }
}
