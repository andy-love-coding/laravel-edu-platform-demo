<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    protected $table = 'live';
    public function rel_profession() {
        // return $this -> hasOne('App\Model\Profession','id','profession_id');
        return $this -> belongsTo('App\Models\Profession','profession_id','id');
    }
    public function rel_stream() {
        // return $this -> hasOne('App\Models\Stream','id','stream_id');
        return $this -> belongsTo('App\Models\Stream','stream_id','id');
    }
}
