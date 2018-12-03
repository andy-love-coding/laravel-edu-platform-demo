<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('lesson_name',50) -> notnull() -> comment('点播课程名称');
            $table -> integer('course_id') -> notnull() -> comment('所属课程id');
            $table -> integer('video_time') -> notnull() -> comment('视频时长，单位秒');
            $table -> string('video_addr') -> notnull() -> comment('视频地址');
            $table -> integer('sort') -> notnull() -> default(50) -> comment('排序');
            $table -> string('description') -> notnull() -> comment('点播视频描述');
            $table -> timestamps();
            $table -> enum('status', [1,2]) -> notnull() -> default(2) -> comment('状态：1=禁用，2=启用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson');
    }
}
