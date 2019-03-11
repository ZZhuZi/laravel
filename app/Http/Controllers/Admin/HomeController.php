<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    //
    // public function index(){
    // 	return view ('admin.index');
    // }

    public function index(){
    	// $time = time();
    	// $time1 = strtotime('-1 day'); //1552215600
    	// $time2 = date("Y-m-d",$time1);
    	// int_set('max_exection_time','120');
    	 // set_time_limit(120);
    	// return $time2;

 		return view('admin.index');
 	}



 	protected $table = 'Permission';
 	const 
 	    IS_MENU = 1,
 	    IS_NI_MENU = 2,
 	    END = true;

	public static function getMenus(){
		$menus = self::select('id','fid','name','url')
				->where('is_menu',self::IS_MENU)
				->orderBy('sort')
				->get()
				->;

		

		return redirect('/admin/login');
	}
	/*
	* 无限极分类的数据组装
	* @return array
	*/
	public static function buildTree($data,$fid=0){
		if(empty($data)){
			return [];
		}
		static $menus = [];
		foreach ($data as $key => $value) {
			if($value['fid'] == $fid){
				if(!isset($menus[$fid])){
					$menus[$value['id']] = $value;
				}else{
					$menus[$fid]['son'][$value['id']] = $value;
				}
			}
			unset($data[$key]);
			self::buildTree($data,$value['id']);
		}
	}
	return $menus;
}
