<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table = 'lesson';
    public function rel_course() {
        // 一个点播有一个课程
        // return $this -> hasOne('App\Models\Course','id','course_id');
        // 或者：多个点播属于一个课程
        return $this -> BelongsTo('App\Models\Course','course_id','id');
    }
}
