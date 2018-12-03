<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('course_name',30) -> notnull() -> comment('课程名称');
            $table -> integer('profession_id') -> notnull() -> comment('专业id'); // integer不写长度时，默认11
            $table -> string('cover_img') -> nullable() -> comment('封面图片地址'); // string不写长度时，默认为255
            $table -> integer('sort') -> notnull() -> default(50) -> comment('排序');
            $table -> string('description') -> nullable();
            $table -> timestamps();
            $table -> enum('status',[1,2]) -> notnull() -> default(2) -> comment('状态：1=禁用，2=启用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
