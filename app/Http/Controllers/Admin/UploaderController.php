<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 引入Storage类
use Storage;

class UploaderController extends Controller
{
    // 文件上传到本项目服务器
    public function webuploader(Request $request)
    {   // 先判断文件是否存在、及上传的文件是否有效
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // 上传成功处理
            $filename = sha1(time() . rand(100000, 999999)) . '.' . $request->file('file')->getClientOriginalExtension();
            $result = Storage::disk('public') -> put($filename,file_get_contents($request -> file ->path()));
            if($result) {
                $response = ['code' => '0', 'msg' => '上传成功！','filepath' => '/storage/'.$filename];
            } else {
                // 上传失败
                $response = ['code' => '1', 'msg' => $request -> file -> getErrorMessage()];
            }
        } else {
            // 非法上传
            $response = ['code' => '2', 'msg' > '非法上传文件！'];
        }
        return response()->json($response);
    }

    // 文件上传到七牛云服务器
    public function qiniu(Request $request)
    {   // 先判断文件是否存在、及上传的文件是否有效
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // 上传成功处理
            $filename = sha1(time() . rand(100000, 999999)) . '.' . $request->file('file')->getClientOriginalExtension();
            $disk = Storage::disk('qiniu');
            $result = $disk -> put($filename,file_get_contents($request -> file ->path()));
            if($result) {
                $response = ['code' => '0', 'msg' => '上传成功！','filepath' => $disk->getDriver()->downloadUrl($filename)];
            } else {
                // 上传失败
                $response = ['code' => '1', 'msg' => $request -> file -> getErrorMessage()];
            }
        } else {
            // 非法上传
            $response = ['code' => '2', 'msg' > '非法上传文件！'];
        }
        return response()->json($response);
    }
}
