<?php
name App\Tools;
use Mail;
class ToolsEmail
{
	// 发送纯文件邮件
	public static function sendEmail($emailData)
	{
		//发送纯文本
		$res = Mail::rew($emailData['content'],function($message) use($emailData){
			$to = $emailData['email_address'];
			$message->to($to)->subject($emailData['subject']);
		});

		return $res;
	}

	//发送htmlde 邮件信息
	public static function sendHtmlEmail($viewData,$emailData)
	{
		$res = Mail::send($viewData['url'],$viewData['assign'],function($message) use($emailData){
			$to = $emailData['email_address'];
			$message->to($to)->subject($emailData['subject']);
		});
		return $res;
	}

	// 设置激活码
	public static function createActiveCode($username,$email)
	{
		$rand = rand(1000000,999999);
		$key = "FORFET_".$username."_".$email;

		$redis = new \Redis();

		$redis->connect('127.0.0.1',6379);

		$redis->setex($key,1800,$rand);

		return $rand;
	}
}