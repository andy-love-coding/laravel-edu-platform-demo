<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Live;

class LiveController extends Controller
{
    public function live(Request $request) {
        $id = (int)$request -> get('id');
        $data = Live::where('id',$id) -> where('status','1') -> where('begin_at','<=',time()) -> where('end_at','>=',time()) -> first();
        if($data) {
            // 有直播看
            return view('home.live.live',compact('data'));
        } else {
            // 没有直播看,或者不在直播中
            return "<script>alert('抱歉，没有对应直播课程可以观看');location.href = '/';</script>";
            exit;
        }
    }
}
