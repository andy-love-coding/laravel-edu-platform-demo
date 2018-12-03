<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 建 专业 表
        Schema::create('profession', function(Blueprint $table){
            $table -> increments('id');
            $table -> string('pro_name',20) -> notnull() -> comment('专业名称');
            $table -> tinyInteger('protype_id') -> notnull() -> comment('专业分类id');
            $table -> string('teachers_ids') -> notnull() -> comment('授课老师id集合');
            $table -> string('description') -> nullable() -> comment('专业名称');
            $table -> string('cover_img') -> nullable() -> comment('封面地址');
            $table -> integer('view_count') -> notnull() -> default(500) -> comment('点击量');
            $table -> timestamps();
            $table -> tinyInteger('sort') -> notnull() -> default(50) -> comment('排序');
            $table -> tinyInteger('duration') -> nullable() -> comment('课时，单位小时');
            $table -> decimal('price',7,2) -> nullable() -> comment('价格');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // 删表
        Schema::dropIfExists('profession');
    }
}
