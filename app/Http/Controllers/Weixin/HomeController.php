<?php

namespace App\Http\Controllers\Weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	public function __construct()
	{

	}

    //微信公众号接入方法
    public function index()
    {
    	// 1 接受参数 signature nonce timestamp echostr
    	$nonce      =  $_GET['nonce'];
    	$timestamp  =  $_GET['timestamp'];
    	$signature  =  $_GET['signature'];
    	$echostr    =  $_GET['echostr'];
    	$token      =  "weixin";
    	// 2 形成数组，排序
    	$array      = array($nonce,$timestamp,$token);
    	sort($array);
    	// 3 拼接成字符串 sha1 加密 与$signature 对比
    	$str = sha1( implode( '', $array) );
    	if( $str == $signature ){
    		echo $echostr;
    		exit;
    	}
    }


}
