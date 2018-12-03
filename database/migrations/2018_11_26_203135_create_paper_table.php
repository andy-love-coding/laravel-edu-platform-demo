<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 试卷表
        Schema::create('paper',function(Blueprint $table){
            $table -> increments('id');
            $table -> string('paper_name',50) -> notnull() -> comment('试卷名称');
            $table -> tinyInteger('course_id') -> notnull() -> comment('课程id');
            $table -> tinyInteger('score') -> notnull() -> default(100) -> comment('总分');
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
        Schema::dropIfExists('paper');
    }
}
