<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'question';
    public function rel_paper() {
        // return $this -> hasOne('App\Models\Paper','id','paper_id');
        return $this -> belongsTo('App\Models\Paper','paper_id','id');
    }
}
