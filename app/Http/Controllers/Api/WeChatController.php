<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeChatController extends Controller
{
    //获取access_token的值
    public function getAccessToken()
    {
    	//获取缓存中的token值
    	$accessToken = $this->redis->get($this->accessToken)
    }
}
