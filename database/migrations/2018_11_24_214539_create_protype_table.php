<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProtypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 建立分类表
        Schema::create('protype' ,function(Blueprint $table){
            $table -> increments('id');
            $table -> string('protype_name',20) -> notnull() -> comment('分类名称');
            $table -> tinyInteger('sort') -> notnull() -> default(50) -> comment('排序');
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
        // 删表
        Schema::dropIfExists('protype');
    }
}
