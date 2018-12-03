<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Course extends Model
{
    protected $table = 'course';
    public function rel_profession() {
        // 一个课程有一个专业
        // return $this -> hasOne('App\Models\Profession','id','profession_id');
        // 或者：多个课程属于一个专业
        return $this -> BelongsTo('App\Models\Profession','profession_id','id');
    }
}
