<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入模型
use App\Models\Auth;
use DB;

class AuthController extends Controller
{
    // 权限列表
    public function index(Request $reqeust)
    {
        // SELECT t1.*,t2.auth_name as parent_name FROM auth as t1 LEFT JOIN auth as t2 on t1.pid=t2.id
        $data = DB::table('auth as t1') -> select('t1.*','t2.auth_name as parent_name') -> leftJoin('auth as t2','t1.pid','=','t2.id') -> get();
        return view('admin.auth.index',compact('data'));
    }
    // 添加权限
    public function add(Request $request)
    {
        if ($request->method() === 'GET') {
            // get请求
            $data = Auth::where('pid',0)->get(); // 获取顶级权限
            return view('admin.auth.add',compact('data'));
        } elseif ($request->method() === 'POST') {
            // post请求
            // 服务端表单验证(其实前端也有验证)
            $this->validate($request,[
                'auth_name' => 'required|min:4|max:20',
                // 可选字段设置nullable：如果字段没有值，则不验证后续规则；有值则继续验证
                'controller' => 'nullable|min:4|max:40',
                'action' => 'nullable|min:3|max:30',
                'pid' => 'required',
                'is_nav' => 'required'
            ],[
                'controller.min' => '控制器名 至少4个字符',
                'controller.max' => '控制器名 至多40个字符',
                'action.min' => '方法名 至少3个字符',
                'action.max' => '方法名 至多30个字符',
            ]);
            // 如果以上服务器表单验证不通过，会直接返回：http信息（422 (Unprocessable Entity)）和验证错误信息的json字符串，
            // 并且不会进入一下入库的步骤
            // 写入数据
            if (Auth::create($request->all())) { // 如下写入数据表成功
                $resposne = ['code' => '0','msg' => '添加权限成功！'];
            } else {
                $resposne = ['code' => '1','msg' => '添加权限失败！'];
            }
            return response()-> json($resposne);
        }
    }
}
 