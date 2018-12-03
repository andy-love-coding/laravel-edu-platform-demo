<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stream', function(Blueprint $table) {
            $table -> increments('id');
            $table -> string('stream_name',200) -> notnull() -> comment('直播流名称，即房间名');
            $table -> enum('status',[1,2,3]) -> notnull() -> default(1) -> comment('禁播状态:1=不禁播，2=永久禁播，3=限时禁播');
            $table -> integer('permited_at') -> notnull() -> default(0) -> comment('状态为3失，直播恢复时间');
            $table -> integer('sort') -> notnull() -> default(50) -> comment('排序');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stream');
    }
}
