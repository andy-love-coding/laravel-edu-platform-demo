<?php

use Illuminate\Database\Seeder;

class CourseAndLessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = [
            ['course_name'=>'linux','profession_id'=>'2','cover_img'=>'/static/demo.jpg','created_at'=>date('Y-m-d H:i:s')],
            ['course_name'=>'JQuery','profession_id'=>'2','cover_img'=>'/static/demo.jpg','created_at'=>date('Y-m-d H:i:s')],
            ['course_name'=>'ThinkPHP','profession_id'=>'2','cover_img'=>'/static/demo.jpg','created_at'=>date('Y-m-d H:i:s')],
            ['course_name'=>'Laravel','profession_id'=>'2','cover_img'=>'/static/demo.jpg','created_at'=>date('Y-m-d H:i:s')]
        ];
        $lesson = [
            ['lesson_name'=>'linux发展史','course_id'=>'1','video_addr'=>'/static/demo.mp4','created_at'=>date('Y-m-d H:i:s'),'video_time'=>86400],
            ['lesson_name'=>'虚拟机安装','course_id'=>'1','video_addr'=>'/static/demo.mp4','created_at'=>date('Y-m-d H:i:s'),'video_time'=>86400],
            ['lesson_name'=>'jQuery事件编程','course_id'=>'2','video_addr'=>'/static/demo.mp4','created_at'=>date('Y-m-d H:i:s'),'video_time'=>86400],
            ['lesson_name'=>'九大选择器','course_id'=>'2','video_addr'=>'/static/demo.mp4','created_at'=>date('Y-m-d H:i:s'),'video_time'=>86400],
        ];
        DB::table('course')->insert($course);
        DB::table('lesson')->insert($lesson);
    }
}
