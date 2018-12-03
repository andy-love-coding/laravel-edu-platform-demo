<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Input;
use App\Models\Auth;

class RoleController extends Controller
{
    // 展示角色列表
    public function index() {
        $data = Role::all();
        return view('admin.role.index',compact('data'));
    }
    // 为角色分派权限
    public function assign() {
        if(Input::method() == 'POST') {
            // POST请求
            // 1.0 获取基本信息
            $role_id = Input::get('id');// url传过来的
            $auth_ids = Input::get('auth_ids'); // post表单提交的
            // 2.0 让Role模型做权限分派数据的处理
            $model = new Role;            
            if($model->assignAuth($role_id,$auth_ids)){
                // 成功
                $response = ['code'=>'0','msg'=>'权限分派成功！'];
            } else {
                // 失败
                $response = ['code'=>'1','msg'=>'权限分派失败！'];
            }
            // 响应
            return response()->json($response);
        } else {
            // GET请求
            // 查询权限
            $parent = Auth::where('pid','0') -> get();
            $second = Auth::where('pid','!=','0') -> get();
            // 查询当前角色名称
            // $role_name = Role::where('id',Input::get('id'))->first()->role_name;
            $current_role = Role::find(Input::get('id'));
            return view('admin.role.assign',compact('parent','second','current_role'));
        }
    }
}
