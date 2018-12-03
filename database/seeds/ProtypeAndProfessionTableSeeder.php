<?php

use Illuminate\Database\Seeder;

class ProtypeAndProfessionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 模拟专业分类的数据
        $protype = [
            ['protype_name' => '前端', 'sort' => 128, 'created_at' => date('Y-m-d H:i:s'), 'status' => 2 ],
            ['protype_name' => '后端', 'sort' => 126, 'created_at' => date('Y-m-d H:i:s'), 'status' => 2 ],
            ['protype_name' => '运维', 'sort' => 100, 'created_at' => date('Y-m-d H:i:s'), 'status' => 2 ],
        ];

        // 模拟专业的数据
        $profession = [
            [
                'pro_name'       => 'php基础班',
                'protype_id'     => 2,
                'teachers_ids'   => '10,13,15,17',
                'created_at'     => date('Y-m-d H:i:s'),
                'duration'       => 18,
                'cover_img'      => '/static/demo.jpg',
                'price'          => '100.00'
            ],
            [
                'pro_name'       => 'php就业班',
                'protype_id'     => 2,
                'teachers_ids'   => '10,13,15,17',
                'created_at'     => date('Y-m-d H:i:s'),
                'duration'       => 98,
                'cover_img'      => '/static/demo.jpg',
                'price'          => '100.00'
            ],
            [
                'pro_name'       => '前端基础班',
                'protype_id'     => 1,
                'teachers_ids'   => '18,19,20,21',
                'created_at'     => date('Y-m-d H:i:s'),
                'duration'       => 90,
                'cover_img'      => '/static/demo.jpg',
                'price'          => '100.00'
            ]
        ];
        DB::table('protype') -> insert($protype);
        DB::table('profession') -> insert($profession);
    }
}
