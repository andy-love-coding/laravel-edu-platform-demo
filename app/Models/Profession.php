<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table = 'profession';
    // 关联专业分类表
    public function rel_protype() {
        // 用【一对一】关系进行关联：一个专业有一个分类
        // return $this -> hasOne('App\Models\Protype','id','protype_id');
        // 或者用【反向一对多】关系进行关系：多个专业属于一个分类(一个分类有多个专业)
        return $this -> belongsTo('App\Models\Protype','protype_id','id');
    }
}
