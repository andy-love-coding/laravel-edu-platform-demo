<?php

use Illuminate\Database\Seeder;

class StreamAndLiveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stream = [
            ['stream_name'=>'sh09','status'=>'2','permited_at'=>'0'],            
            ['stream_name'=>'test','status'=>'3','permited_at'=>strtotime('2018-11-30 10:40')],         
            ['stream_name'=>'sh10','status'=>'1','permited_at'=>'0']    
        ];
        $live = [
            [
                'live_name' => 'php基础课程',
                'profession_id' => '1',
                'stream_id' => '3',
                'cover_img' => '/static/demo.jpg',
                'description' => '最全php基础知识直播课程，敬请期待！',
                'begin_at' => strtotime(date('2018-10-30 10:00:00')),
                'end_at'   => strtotime(date('2018-10-30 23:00:00'))                
            ],
            [
                'live_name' => 'php就业课程',
                'profession_id' => '2',
                'stream_id' => '3',
                'cover_img' => '/static/demo.jpg',
                'description' => '最全php就业课程直播课程，高薪之日可待，敬请期待！',
                'begin_at' => strtotime(date('2018-11-10 10:00:00')),
                'end_at'   => strtotime(date('2018-12-10 23:00:00'))                
            ]
        ];
        DB::table('stream') -> insert($stream);
        DB::table('live') -> insert($live);
    }
}
