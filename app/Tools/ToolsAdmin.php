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
	function static function buildTree($data,$fid=0){
		if(empty($data)){
			return [];
		}
		static $menus = []; // 定义一个静态变量，用来储存无限级分类的数据

		foreach ($data as $key => $value) {
			if($value['fid'] == $fid){       // 当前循环的内容中fid是否等于函数fid参数
				if(!isset($menus['fid'])){   // 如果数据没有fid的key
					$menus[$value['id']] = $value;
				}else{
					$menus[$id]['son'][$value['id']] = $value;
				}
				unset($data[$key]);
				self::buildTree($data,$value['id']); //执行递归调用
			}
		}

	}
}



