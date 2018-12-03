<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Question;

use Excel;

class QuestionController extends Controller
{
    private $resonse; // 用于存放Excel类中执行的结果
    public function index () {
        $data = Question::get();
        return view('admin.question.index',compact('data'));
    }
    // 导出试题
    public function export(){
        $data = Question::get();       
        $cellData = [
            ['序号','题干','所属试卷','分值','选项','答案','加入时间']           
        ];
        foreach($data as $key => $value) {
            $cellData[] = [
                $value -> id, $value -> question, $value -> rel_paper -> paper_name, $value -> score, $value -> options, $value -> answer, $value -> created_at
            ];
        }
        // 由于$cellData是在外面定义的，函数中要使用时，需要use引入外部定义的变量
        Excel::create('试题导出',function($excel) use ($cellData){ 
            // sheet()创建一个工作表
            $excel->sheet('题库', function($sheet) use ($cellData){
                // 把数据写入行
                $sheet->rows($cellData);
            });
        })->export('xls');
    }
    // 导入试题
    public function import(Request $request) {
        if($request->method() == 'POST') {
            // post 处理表格数据，提交模型存储
            $post = $request -> all();            
            $filePath = '.'.$post['excelpath']; // 加一个"."后，变成"./"了（当前文件夹），相等于去掉了"/"
            // load方法基于项目根路径作为根目录,所以$filePath前面不用"/"
            // 对中文进行了转码，否则会提示文件不存在。
            Excel::load($filePath, function($reader) use ($post) {
                $data = $reader -> getSheet(0) -> toArray();
                // dd($data);
                $arr = [];
                foreach ($data as $key => $value) {
                    if($key == 0) { // 跳过表头
                        continue;
                    }
                    $arr[] = [
                         'question' => $value[0],
                         'paper_id' => $post['paper_id'],
                         'options'  => $value[1],
                         'answer'   => $value[2],
                         'score'    => (int)$value[3],
                         'created_at'   => date('Y-m-d H:i:s')
                    ];
                }
                // 写入数据表表中
                if(Question::insert($arr)) {
                    $this->resonse = ['code' => 0, 'msg' => '导入成功！'];
                } else {
                    $this->resonse = ['code' => 1, 'msg' => '导入失败！'];
                }
                // 不在Excel中return是因为：Excel中return失效了
            });
            return response() -> json($this->resonse);
        } else {
            // get 展示导入表格面板
            $paper = \App\Models\Paper::select('id','paper_name') -> get();
            return view('admin.question.import',compact('paper'));
        }
    } 
}
