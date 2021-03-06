<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Tools\ToolsEmail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '发送邮件';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $m_nums = \DB::table('jy_user')->count();
        $order_nums = \DB::table('jy_order')->count();
        $goods_nums = \DB::table('jy_goods')->count();

        $viewData = [
            'url' => 'email.data',
            'assign' => [
                'm_nums' =>$m_nums,
                'order_nums' => $order_nums,
                'goods_nums' => $goods_nums
            ],
        ];

        $emailData = [
            'subject' =>date("y-m-d").'_数据统计邮件',
            // 'content' =>'测试laravel的任务调度',
            'email_addres' =>'3417912281@qq.com'
        ];

        try {
            ToolsEmail::sendHtmlEmail($viewData,$emailData);
            \Log::info('邮件发送成功');
        } catch (\Exception $e) {
            \Log::error('邮件发送失败'.$e->getMessage());
        }
    }
}
