<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Protype;

class ProtypeController extends Controller
{
    public function index() {
        // 查数据
        $data = Protype::orderBy('sort','desc') -> get();
        // 展示视图
        return view('admin.protype.index',compact('data'));
    }
}
