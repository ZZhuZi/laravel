<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Model\AdminUser;
use Mail;
use App\Tools\ToolsEmail;
class LoginController extends Controller
{
    //
    public function login(){
 		return view('admin.login');
 	}
 	public function index(Request $request){
 		$session = $request->session();
 		if($session->has('user')){          // 如果存在session 信息的话可以不登录
 			return redirect('/admin/login');
 		}
 		return view('admin.login');
 	}
	public function doLogin(Request $request){
		$params = $request->all();
		// dd($params);
		$return = [
			'code' => 2000,
			'msg'  => '登录成功'
		];
		// 用户名不能为空
		if(!isset($params['username']) || empty($params['username'])){
			$return = [
				'code' => 4001,
				'msg'  => '用户名不能为空'
			];
			return json_encode($return);
		}
		// 密码不能为空
		if(!isset($params['password']) || empty($params['password'])){
			$return = [
				'code' => 4002,
				'msg'  => '密码不能为空'
			];
			return json_encode($return);
		}

		// 通过用户名获取用户的信息
		$userInfo = AdminUser::getUserByName($params['username']);
		// dd($userInfo);

		//用户不存在
		if(empty($userInfo)){
			$return = [
				'code' => 4003,
				'msg'  => '用户不存在'
			];
			return json_encode($return);
		}else{
			$postPwd = md5($params['password']);
			if($postPwd !== $userInfo->password){
				$return = [
					'code' => 4001,
					'msg'  => '密码错误',
				];
				return json_encode($return);
			}else{
				$session = $request ->session(); // 获取session的值
				// 储存用户id
				$session ->put("user.user_id",$userInfo->id);   // 用户id
				$session ->put("user.username",$userInfo->username);  // 用户名
				$session ->put("user.image_url",$userInfo->image_url); //图片信息
				$session ->put("user.is_super",$userInfo->is_super); //是否超管

				return json_encode($return);
			}
			

		}

	}

	/*
	*用户退出的页面
	*/
	public function loginout(Request $request){
		$request->session()->forget('user');
		return redirect('/admin/login');
		// return view('/admin/login');

	}

	// 忘记密码
	public function forget()
	{
		return view('admin.forget.forget');
	}

	//发送邮件的接口
	public function sendEmail(Request $request)
	{
		$email = $request->input('email','');
		$username = $request->input('username','');

		//检测邮箱或者用户是否存在

		$adminUsers = new AdminUser();
		$where = [
            'username' => $username,
            // 'email'    => $email
        ];
        $data = $this->getDataInfoByWhere($adminUsers, $where);
        // dd($data);
        if(empty($data)){
            $return= [
                'code' => 4000,
                'msg'  => "用户或邮箱不存在"
            ];
            return json_encode($return);
        }
        try {
            $url = sprintf(env('APP_URL')."/admin/forget/reset?username=%s&email=%s&activeCode=%s",$username,$email, ToolsEmail::createActiveCode($username, $email));
             //发送的是html的邮件
            //视图数据
            $viewData =[
                'url'  => 'admin.forget.email',
                'assign' => [
                    'username' => $username,
                    'url'      => $url,
                ],
            ];
            //邮件数据
            $emailData = [
                'email_address' => $email,
                'subject'       => "管理后台找回密码"
            ];
            //发送邮件
            $res = ToolsEmail::sendHtmlEmail($viewData, $emailData);
        } catch (\Exception $e) {
        	$return = [
        		'code' => $e->getCode(),
        		'msg'  => $e->getMessage(),
        	];
        }
        return json_encode($return);
	}

	   //重置页面
    public function reset(Request $request)
    {
        $params = $request->all();
        // dd($params);
        //验证参数
        if(empty($params)){
            return redirect('/admin/forget/password')->with('msg','参数不能为空');
        }
        //验证用户的信息
        $adminUsers = new AdminUser();
        $where = [
            'username' => $params['username'],
            'email'    => $params['email']
        ];
        $data = $this->getDataInfoByWhere($adminUsers, $where);
        if(empty($data)){
            return redirect('/admin/forget/password')->with('msg','用户或邮箱不存在');
        }
        //验证激活码
        $key = "FORGET_".$params['username']."_".$params['email'];
        $redis = new \Redis();
        $redis->connect('127.0.0.1',6379);
        $activeCode = $redis->get($key);
        if($activeCode != $params['activeCode']){
            return redirect('/admin/forget/password')->with('msg','激活码不存在');
        }
        return view('admin.forget.reset', $params);
    }
    //重新设置密码
    public function save(Request $request)
    {
        $params = $request->all();
        //dd($params);
        if(empty($params['password']) || empty($params['confirm_password'])){
            return redirect()->back()->with('msg', '密码或确认密码不能为空');
        }
        if($params['password']!= $params['confirm_password']){
            return redirect()->back()->with('msg', '密码不一致');
        }
        $adminUsers = new AdminUsers();
         $where = [
            'username' => $params['username'],
            'email'    => $params['email']
        ];
        $object = $this->getDataInfoByWhere($adminUsers, $where);
        $res = $this->storeData($object, ['password' => md5($params['password'])]);
        if(!$res){
            return redirect('/admin/forget/password')->with('msg','密码重置失败');
        }
        
        return redirect('/admin/login');
    }
}
