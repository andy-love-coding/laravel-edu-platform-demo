<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stream;
// 1.0 Guzzle请求，第一步先引入
use GuzzleHttp\Client;

class StreamController extends Controller
{
    // 直播流（房间）列表
    public function index() {
        $data = Stream::orderBy('sort','desc') -> get();
        return view('admin.stream.index',compact('data'));
    }
    // 添加直播流（房间）
    public function add(Request $request) {
        if ($request -> method() == 'POST') {
            // post 先获取post请求数据
            $post = $request -> except(['_token']);

            // 生成七牛token
            $method = "POST";
            $path = "/v2/hubs/education-zet/streams";
            $host = "pili.qiniupi.com";
            $contentType = "application/json";
            $body = json_encode(['key' => $post['stream_name']]); // 请求体
            $data = " $method $path\nHost: $host\nContent-Type: $contentType\n\n$body";
            // 实例化七牛SDK中的Auth类（vendor/qiniu/src/Auth.php)，参数为：七牛的AK、SK
            // $auth = \Qiniu\Auth('bBOpNSfGr5G1b0IFDvF68L7Za35-PAVUliL4Zrkn','AOlw43W9NjgzmNNAEoZrO1sMU5w6CGwn-7pyOekM');
            $auth = new \Qiniu\Auth(config('filesystems.disks.qiniu.access_key'),config('filesystems.disks.qiniu.secret_key'));
            $qiniuToken = 'Qiniu ' . $auth -> sign($data);        
            
            // 2.0 Guzzle请求，第二步实例化Guzzle对象
            $client = new Client([
                // Base URI is used with relative requests（基础地址用于相对路径请求）
                'base_uri' => 'http://' . $host,
                // You can set any number of default request options.单位秒
                // 'timeout'  => 5.0, // 不设置超时
            ]);
            // 3.0 使用Guzzle对象，向七牛云发送请求，在七牛云服务器上【创建流】，传并用变量接收
            $res = $client -> post($path, [
                // 请求头和请求体
                'header' => [
                    'Authorization' => $qiniuToken,
                    'Content-Type'  => $contentType
                ],
                'body'  => $body
            ]);
            // 4.0 判断Guzzle请求是否成功
            if($res -> getStatusCode() == '200') {
                // 请求成功
                // 在七牛服务商创建流成功后，再才提交表单数据入库        
                $post['permited_at'] = strtotime($post['permited_at'])?strtotime($post['permited_at']):'0';
                if(Stream::insert($post)){
                    // 流入库成功
                    $response = ['code' => 0 , 'msg' => '添加流成功！'];
                } else {
                    // 流入库失败
                    $response = ['code' => 1 , 'msg' => '添加流失败！'];
                }
            } else {
                $response = ['code' => 2, 'msg' => '调用七牛云接口失败！'];
            }
            // 最后返回结果          
            return response() -> json($response);
        } else {
            // get 获取提交面板
            return view('admin.stream.add');
        }
    }
}
