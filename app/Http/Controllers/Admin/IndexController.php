<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class IndexController extends Controller
{
    // 首页方法-index
    public function index()
    {
        return view('admin.index.index');
    }
    // 首页方法-welcome
    public function welcome()
    {
        return view('admin.index.welcome');
    }
  	// 退出登录
    public function logout()
    {
        Auth::guard('admin')->logout(); // 清除session
        return redirect(route('login')); // 跳转
    }
}
