<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 建表
        Schema::create('member', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('username',20) -> notnull() -> comment('用户名');
            $table -> string('password') -> notnull() -> comment('密码'); // string默认长度 varchar(255)
            $table -> enum('gender',[1,2,3]) -> notnull() -> default('1') -> comment('性别：1=男，2=女，3=保密');
            $table -> string('mobile',11) -> nullable() ->comment('手机号');
            $table -> string('email',40) -> nullable() -> comment('邮箱');
            $table -> string('avatar') -> nullable() -> comment('头像图片地址');
            $table -> integer('country_id') -> nullable() -> default('0') ->comment('国家id');
            $table -> integer('province_id') -> nullable() -> default('0') ->comment('省份id');
            $table -> integer('city_id') -> nullable() -> default('0') ->comment('城市id');
            $table -> integer('county_id') -> nullable() -> default('0') ->comment('区县id');
            $table -> timestamps(); // 生成created_at和updated_at两个字段
            $table -> rememberToken(); // 会自动添加 remmenber_token 列：VARCHAR(100) NULL
            $table -> enum('type',[1,2]) -> notnull() -> default('1') -> comment('账号类型：1=学生，2=老师');
            $table -> enum('status',[1,2]) -> notnull() -> default('2') -> comment('状态：1=禁用，2=启用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 删除表
        Schema::dropIfExists('member');
    }
}
