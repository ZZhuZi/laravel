<?php 
namespace App\Tools;
use Excel;
error_reporting( E_ALL&~E_NOTICE );
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
		// dd($files);
		$data = Excel::load($files->path(),function($reader){
		})->toArray();
		// dd($data);
		return $data;
	}
	//文件导出操作
	public static function exportData($exportData,$title="商品数据")
	{
		if(empty($exportData)){
			return false;
		}

		/*
	    * 如果你要导出csv或者xlsx文件，只需将 export 方法中的参数改成csv或xlsx即可。
	    * 如果还要将该Excel文件保存到服务器上，可以使用 store 方法：
		*/
		// dd($exportData);
			Excel::create(iconv('UTF-8', 'GBK', date("YmdHis").$title),function($excel) use ($exportData){
				$excel->sheet('goods',function($sheet) use ($exportData){
					$sheet->rows($exportData);
				});
			})->export('csv');
	}
}





