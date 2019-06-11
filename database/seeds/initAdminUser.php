<?php

use Illuminate\Database\Seeder;

class initAdminUser extends Seeder
{
    /**
     * Run the database seeds.
     * 初始化后台管理员用户表
     * @return void
     */
    public function run()
    {
        //
        $data = [
        	'username' => 'admin',
        	'password' => md5('123qwe'),
        	'image_url' =>'',
        	'is_super' =>'2',
        	'status' =>'2',
        ];
        DB::table('admin_users')->insert($data);
    }
}
