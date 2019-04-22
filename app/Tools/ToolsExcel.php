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





