<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $table = 'auth'; // 表名
    public $timestamps = false; // 不更新时间（表示没有created_at和updated_at字段）
    protected $fillable = ['id','auth_name','controller','action','pid','is_nav']; // create方法允许赋值的字段
}
