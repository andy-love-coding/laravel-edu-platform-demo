<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// 引入trait代码片段空间：Authenticatable
use Illuminate\Auth\Authenticatable;

// 认证model要求一：继承接口
// 即：对于需要登录认证的model，需要继承\Illuminate\Contracts\Auth\Authenticatable接口，这个接口有6个抽象方法需要实现
class Manager extends Model implements \Illuminate\Contracts\Auth\Authenticatable
{
    protected $table = 'manager'; // 指定模型的数据表
    // 认证model要求二：使用trait片段，来实现抽象方法
    // 这个trait代码片段实现了Authenticatable接口中的6个抽象方法
    use Authenticatable;
    // 关联角色表（一个用户有一个角色）
    public function rel_role() {
        return $this->hasOne('App\Models\Role','id','role_id');
    }
}