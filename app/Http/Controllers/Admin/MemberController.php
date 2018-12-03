<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;
use DB;

class MemberController extends Controller
{
    // 会员列表
    public function index(Request $request) {
        // 获取会员数据
        $data = Member::all();
        return view('admin.member.index',compact('data'));
    }
    // 添加用户
    public function add(Request $request) {
        if($request -> method() == 'POST') {
            // post提交数据
            $data = $request -> all();
            $data['password'] = bcrypt($data['password']);
            if(Member::create($data)) {
                $response = ['code' => '0', 'msg' => '会员创建成功！'];
            } else {
                $response = ['code' => '1', 'msg' => '会员创建失败！'];                
            }
            return response() -> json($response);
        } else {
            // 展示添加面板
            $countrys = DB::table('area') -> where('pid','0') -> get();
            return view('admin.member.add',compact('countrys'));
        }
    }
    // 根据地区id获取其下属的行政区划
    public function getAreaById(Request $request) {
        $id = (int)$request -> get('id'); // 强制int转换，更安全
        $data = DB::table('area') -> where('pid',$id) -> get();
        return response() -> json($data);
    }
}
