<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Profession;

class ProfessionController extends Controller
{
    // 专业详情页
    public function profession(Request $request) {
        $data = Profession::where('id',$request->get('id')) -> first();
        return view('home.profession.profession',compact('data'));
    }
    // 购买课程（专业)订单页
    public function showOrder(Request $request) {
        $data = Profession::where('id',$request->get('id')) -> first();
        return view('home.profession.showOrder',compact('data'));
    }
}
 