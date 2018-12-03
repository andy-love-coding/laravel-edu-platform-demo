<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 题目表
        Schema::create('question', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('question') -> notnull() -> comment('题干');
            $table -> integer('paper_id') -> notnull() -> comment('试卷id');
            $table -> tinyInteger('score') -> notnull() -> comment('题目分值');
            $table -> string('options') -> notnull() -> comment('选项');
            $table -> string('answer',1) -> notnull() -> comment('正确答案');
            $table -> string('remark') -> nullable() -> comment('备注');
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
        Schema::dropIfExists('question');
    }
}
