<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    protected $table = 'paper';
    public function rel_course() {
        // return $this -> hasOne('App\Models\Course','id','course_id');
        return $this -> belongsTo('App\Models\Course','course_id','id');
    } 
}
