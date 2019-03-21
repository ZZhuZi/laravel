<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //小说首页banner图
    public function banners(Request $request){
    	$num = $request->input('num',3);


    }

    //最新小说
    public function newList(){
    	
    }

    //
    public function clicksList(){
    	
    }

    //获取首页伴儿图接口
    bannerList:function(){
    	var that = this;
    	wx.request({
    		url:'http://www.laravel.com/api/home/banners',
    		data:{num:3},
    		methods:'post',
    		dataType:"json",
    		success:function(res){
    			
    		}
    	})
    },

}
