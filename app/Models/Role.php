<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role'; // 指定表
    public $timestamps = false; // 禁止更新时间

    // 给指定角色，分派权限
    public function assignAuth($role_id,$auth_ids) {
        // 生成auth_ids字段数据
        $data['auth_ids'] = implode(',',$auth_ids);
        // 根据$auth_ids查找auth_ac字段所需数据(需排除顶级权限)
        $auths = Auth::where('pid','!=','0')->whereIn('id',$auth_ids)->get();
        $ac = '';
        foreach($auths as $key=>$value) {
            $ac .= $value->controller . '@' . $value->action . ',';            
        }
        $data['auth_ac'] = rtrim($ac,',');
        // 写入数据集，并返回true或false
        return $this->where('id',$role_id)->update($data);
    }
}
