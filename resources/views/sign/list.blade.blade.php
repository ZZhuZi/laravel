<?php 
namespace App\Tools;

/*
* 公共方法
*/
class ToolsAdmin
{
	/*
	* 无限极分类的数据组装函数
	* @param $array $data
	* @param $fid 父类id
	*/
	public static function buildTree($data,$fid=0,$fKey="id"){
		if(empty($data)){
			return [];
		}
		static $menus = []; // 定义一个静态变量，用来储存无限级分类的数据

		foreach ($data as $key => $value) {
			if($value[$fKey] == $fid){       // 当前循环的内容中fid是否等于函数fid参数
				if(!isset($menus[$fid])){   // 如果数据没有fid的key
					$menus[$value['id']] = $value;
				}else{
					$menus[$fid]['son'][$value['id']] = $value;
				}
				unset($data[$key]);
				self::buildTree($data,$value['id'],$fKey); //执行递归调用
			}
		}
		return $menus;

	}

	//创建无限级分类树的结构
	public static function buildTreeString($data,$fid=0, $level=0,$fKey="fid")
	{
		if(empty($data)){
			return [];
		}
		static $tree = [];
		foreach ($data as $key => $value) {
				
			//判断当前的父类id是否递归调用传过来的id
			if($value[$fKey] == $fid){
				$value['level'] = $level;
				$tree[] = $value;
				unset($data[$key]);
				self::buildTreeString($data, $value['id'],$level+1, $fKey);
			}
		}
		return $tree;
	}


	/*
	* 文件上传函数
	* @param $files $object
	* #return string url
	*/
	public static function uploadFile($files,$isOss=true){
		//参数为空
		if(empty($files)){
			return '';
		}
		if($isOss){
			// oss文件上传
			$oss = new ToolsOss();
			$url = $oss->putFile($files);
			return $url;
		}
		// 文件上传目录
		$basePath  = 'uploads/'.date('Y-m-d',time());
		if(!file_exists($basePath)){
			@mkdir($basePath,755,true);  //@错误抑制付  true 循环创建  
		}

		// 文件名字
		$filename = "/".date('YmdHis',time()).rand(0,10000).'.'.$files->extension();

		@move_uploaded_file($files->path(), $basePath.$filename);  // 执行文件上传

		return '/'.$basePath.$filename;
	} 

	/*
	* 获取用户所有权限的主键id
	* 1 根据用户userId查询角色ID
	* 2 根据角色id查询权限id
	*/
	public static function getUserPermissionIds($userId){
		if(!isset($userId) || empty($userId)){
			return [];
		}

		$userRole = new \APP\Model\UserRole(); //
		// $userRole = new UserRole();

		$roles = $userRole->getByUserId($userId); //根据用户id去查询角色id
		if(empty($roles)){
			return [];
		}

		$roleP = new \App\Model\RolePermission();
		// $roleP = new  RolePermission();
		$pids = $roleP->getPermissionByRoleId($roles->role_id); //根据用户的角色id去调用权限id集合

		return $pids;
	}

	/*
	* 获取当前登录用户的所有权限的url地址
	*/
	public static function getUrlsByUserId($userId){
		$pids = self::getUserPermissionIds($userId); //获取所有权限节点id

		$urls = \App\Model\Permissions::getUrlsByIds($pids);
		return $urls;
	}

	public static function buildGoodsSn($string = 16){
		return "JY".date('YmdHis',$string);
	}
}

------------------------------------------------------------------------------------------------

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

-------------------------------------------------------------------------------
<?php 
namespace App\Tools;
use Excel;
error_reporting(E_all&~E_NOTICE);
/*
* Excel 文件批量导入导出的功能
*/
class ToolsExcel
{
	// excel 文件导入的功能
	public static function import($files)
	{
		if(empty ($files)){
			return false;
		}

		$data = Excel::load($files->path(),function($reader){
		})->toArray();
		return $data;
	}
	//文件导出操作
	public static function exportData($exportData,$title="商品数据")
	{
		if(empty($exportData)){
			return false;
		}

		/*
			如果你要导出scv或者xlsx文件，只需有export方法中的参数改成CSV或者xlsx即可。
			如果还有将该Excel文件保存到服务器上，可以使用store方法;
		*/

			Excel::create(iconv('UTF-8','GBK',date('YmdHis').$title),function($excel) use($exportData){
				$excel->sheet('goods',function($sheet) use ($exportData){
					$sheet->rowa($exportData);
				});
			})->export('xls');
	}
}


-------------------------------------------------------------------------------------------
<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        //给用户发送数据统计邮件
        $schedule->command('send_email')->cron('03 19 * * *');

        //自动上架商品计划任务 每分钟执行一次
        $schedule->command('auto_shop')->corn('*/1 * * * *');

         //自动发布文章 每分钟执行一次
        $schedule->command('auto_public_article')->corn('*/1 * * * *');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}





