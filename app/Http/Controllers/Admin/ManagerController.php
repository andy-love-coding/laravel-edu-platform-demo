<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入模型
use App\Models\Manager;

class ManagerController extends Controller
{
    // 管理员列表
    public function index() {
        $data = Manager::all();
        return view('admin.manager.index',compact('data'));
    }
}
