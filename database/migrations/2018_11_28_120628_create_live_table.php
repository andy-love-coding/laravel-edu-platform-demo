<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('live', function(Blueprint $table) {
            $table -> increments('id');
            $table -> string('live_name',50) -> notnull() -> unique() -> comment('直播课程名称');
            $table -> integer('profession_id') -> notnull() -> comment('所属专业id');
            $table -> integer('stream_id') -> notnull() -> comment('流id，即房间号');
            $table -> string('cover_img') -> notnull() -> comment('封面');
            $table -> integer('sort') -> notnull() -> default(50) -> comment('排序');
            $table -> string('description') -> nullable() -> comment('描述');
            $table -> integer('begin_at') -> notnull() -> comment('直播开始时间');
            $table -> integer('end_at') -> notnull() -> comment('直播结束时间');
            $table -> string('video_addr') -> nullable() -> comment('回看视频的地址');
            $table -> timestamps();
            $table -> enum('status',[1,2]) -> notnull() -> default(1) -> comment('直播课程状态，1=已启用，2=已禁用');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('live');
    }
}
