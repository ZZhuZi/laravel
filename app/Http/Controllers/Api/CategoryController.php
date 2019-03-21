<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    //获取分类列表接口
    public function getCategory(){
    	$category = new Category();

    	$cList = $category->getCategory();
    	$return = [
    		'code' =>2000,
    		'msg'  =>"获取分类接口",
    		'data' =>$cList
    	];
    	return json_encode($return);
    }

    
}
