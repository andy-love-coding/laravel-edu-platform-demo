<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Live;
use App\Models\Profession;

class IndexController extends Controller
{
    public function index() {
        $live = Live::where('status',1) -> orderBy('sort','desc') -> get();
        // 在服务端添加直播的播放状态
        foreach($live as $key => $value) {
            if(time() < $value -> begin_at) {
                $value -> live_status = '直播未开始';
            } elseif($value -> begin_at <= time() && time() <= $value -> end_at) {
                $value -> live_status = '直播中';
            } elseif (time() > $value -> end_at) {
                $value -> live_status = '直播已结束';
            }
        }
        $profession = Profession::orderBy('sort','desc') -> get();
        return view('home.index.index',compact('live','profession'));
    }
}
