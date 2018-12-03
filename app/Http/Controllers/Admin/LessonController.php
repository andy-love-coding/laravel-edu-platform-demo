<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Lesson;

class LessonController extends Controller
{
    public function index() {
        $data = Lesson::orderBy('sort','desc') -> get();
        return view('admin.lesson.index',compact('data'));
    }

    public function play(Request $request) {
        $id = $request -> get('id');
        $path = Lesson::find($id) -> value('video_addr');
        if($path) {
            // 播放 h5直接播放视频
            return "<video src='$path' controls='controls' width='98%'></video>";
        } else {
           return response() -> json(['err'=>'1','msg'=>'找不到视频']);
        }
    }
}
