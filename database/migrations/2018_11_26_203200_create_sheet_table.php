<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSheetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 答卷表
        Schema::create('sheet',function(Blueprint $table){
            $table -> increments('id');
            $table -> smallInteger('paper_id') -> notnull() -> comment('试卷id');
            $table -> smallInteger('question_id') -> notnull() -> comment('题目id');
            $table -> mediumInteger('member_id') -> notnull() -> comment('会员id');
            $table -> enum('is_correct',[1,2]) -> notnull() -> default(2) -> comment('是否正确：1=正确，2=错误');
            $table -> tinyInteger('score') -> notnull() -> default(0) -> comment('得分');
            $table -> string('answer',1) -> nullable() -> comment('用户答案');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sheet');
    }
}
