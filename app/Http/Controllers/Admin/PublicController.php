<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入Auth门面(有了别名直接引入即可)
use Auth;

class PublicController extends Controller
{
    // 展示登录页面
    public function login()
    {
        return view('admin.public.login');
    }

    // 登录验证方法
    public function check(Request $request)
    {
        $this->validate($request, [
            // 验证规则
            'username' => 'required|min:3|max:20',
            'password' => 'required|min:6',
            'captcha' => 'required|size:5|captcha'
        ], [
            //针对没有翻译的自定义错误,手动翻译成中文
            'captcha.required' => '验证码不能为空',
            'captcha.size' => '验证码长度必须是5位',
            'captcha.captcha' => '验证码错误！'
        ]);
        // 身份合法性验证
        $data = $request -> only(['username','password']);
        $data['status'] = '2'; // 1=禁用，2=启用
        if (Auth::guard('admin')->attempt($data,$request -> get('online'))) {
            // 验证通过
            return redirect(route('dashboard'));
        } else {
            // 验证失败
            return redirect(route('login')) -> withErrors(['error' => '用户名或密码错误！']);
        }
    }
}
