<?php

use Illuminate\Database\Seeder;

class MemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 执行数据表填充
        $faker = \Faker\Factory::create('zh_CN');
        $data = [];
        for ($i=0; $i<100; $i++) {
            $data[] = [
                'username'      => $faker -> userName,
                'password'      => bcrypt('123456'),
                'gender'        => rand(1,3),
                'avatar'        => '/static/avatar.jpg',
                'mobile'        => $faker -> phoneNumber,
                'email'         => $faker -> email,
                'country_id'    => '0',
                'province_id'    => '0',
                'city_id'    => '0',
                'county_id'    => '0',
                'created_at'    => date('Y-m-d H:i:s'),
                'type'          => rand(1,2),
                'status'        => rand(1,2)
            ];
        }
        // 写入数据表
        DB::table('member')->insert($data);
    }
}
