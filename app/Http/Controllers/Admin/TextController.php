<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// // use Config;
use App\Tools\Single;
use Illuminate\Support\Facades\DB;
class TextController extends Controller
{
//     //
    public function index(){
    	// dd(GET /admin/text/index);


//  // ------------------------------------------------------------------
//     	// return view('admin/text/lazyload');    //懒加载页面

//  // ------------------------------------------------------------------

//     	// $data = \DB::table('jy_goods')->orderBy('id','desc')->paginate(5)->toArray();
//     	// dd(is_php('7.1'));
//     	// dd(json_encode($data['data']));
//     	// dd($data['data']);
//     	// dd($data);
    	
//  // ------------------------------------------------------------------

//  // ------------------------------------------------------------------
//     				// 正则正则正则正则
//     	// ---------------------------------
//     	// $a = "1aaa11";
//     	// // $a = ["1aaa","2bbbb"];
//     	// // dd($a);
//     	// // $b = "/^1[a-c]{2,3}\d{1,}$/";
//     	// $b = "/^1[a-c]{2,3}$/";

//     	// // $c = preg_match($b, $a,$match,PREG_OFFSET_CAPTURE);
//     	// $c = preg_match($b,  substr ( $a , 3 ), $match);

//     	// if($c){
//     	// 	echo "12";
//     	// }else{
//     	// 	echo "34";
//     	// }
//     	// dd($match,$c);
//     	// dd($c);

//     	// // print_r($c);die;
//     	// return preg_match($b, $a);
//  // ------------------------------------------------------------------
		// 单例模式
    	// $db1 = Single::getInstance(3);
    	// dd($db1 -> getName());
    	// Single(1);v
    	// $db2 = Single::getInstance(2);
    	// $db2 -> getName();
    	// -----------------------------------------------------
    	// // // 冒泡排序
    	// $arr = array(23,5,26,4,85,9,10,2,55,44,21,39,11,16,88,421,226,588);
    	// $m = count($arr);
    	// for ($i=0; $i <= $m ; $i++) { 
    	// 	for ($n=$m-1; $n > $i ; $n--) { 
    	// 		if($arr[$n] > $arr[$n-1]){
    	// 			$a = $arr[$n-1];
    	// 			$arr[$n-1] = $arr[$n];
    	// 			$arr[$n] = $a;
    	// 		} 
    	// 	}
    	// }
     //  // dd($m);
    	// // dd($arr);

    	// for ($i=0; $i <= $m ; $i++) { 
    	// 	for ($n=0; $n <$m-$i-1 ; $n++) { 
    	// 		if($arr[$n] < $arr[$n+1]){
    	// 			$a= $arr[n+1];
    	// 			$arr[$n+1] = $arr[$n];
    	// 			$arr[$n] = $a;
    	// 		}
    	// 	}
    	// }

     //  dd($arr);
    	// -----------------------------------------------------------------------
    	// 递归查询目录结构
    	
    	// 框架 
    	// 数据库 用过的种类  mysql 
    	// redis 雪崩 击穿 穿透
    	// mvp mvc mvvm 
    	// sql 连表查询 

// $ar = '1';
//       // $ar =null ;
// // dd(empty($ar));
// dd(isset($ar));

      define("A",["2",8]);
      dd(A);




    	// 登录
    	return view('text.index');
   }
   public function login(Request $request)
   {
   		
   		return view('text.login');
   }
   public function doLogin(Request $request)
   {
   		$params = $request ->all();
   		$return = [
   			'code' => 2000,
   			'msg'  => '成功'
   		];
   		unset($params['_token']);
   		$name = $params['name'];
   		$user = DB::table('text_user')->where('name',$name)->where('password',$params['password'])->first();
   		$id = $user->id;
   		DB::update('update text_user set token = replace(uuid(),"-","") where id = ?',[$id]);
   		$data = DB::table('text_user')->select('token')->where('id',$id)->first();
   		$token = $data->token;
   		$return['data'] = $token;
   		return json_encode($return);
   }

   public function checkedToken(Request $request)
   {
   		$params = $request->all();
   		$token = $params['token'];
   		$return = [
   			'code' => 2000,
   			'msg'  => '成功'
   		];
   		if(!isset($token)||empty($token)){
   			$return = [
   				'code' => 4001,
   				'msg'  => 'token不存在'
   			];
   			return json_encode($return);
   		}
   		$data = DB::table('text_user')->where('token',$token)->first();
   		if(empty($data)){
   			$return = [
   				'code' => 4002,
   				'msg'  => 'token 错误'
   			];
   			return json_encode($return);
   		}
   		$return['data'] = $data;
   		return json_encode($return);
   }

}

