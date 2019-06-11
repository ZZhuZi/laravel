<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Bonus;
use App\Model\Batch;
use App\Jobs\BonusBatchJob;
use App\Tools\ToolsAdmin;

class BatchController extends Controller
{
    //批次的列表
    public function list(){
    	$batch = new Batch();
    	$assign['batch_list'] = $this->getPageList($batch);
        // dd($assign['batch_list']);
    	return view('admin.batch.list',$assign);
    }

    //添加页面
    public function add(){
    	return view('admin.batch.add');
    }

    // public function store(Request $request){
    // 	$params = $request->all();
    // 	$params = $this->delToken($params);
    // 	$params['file_path'] = ToolsAdmin::uploadFile($params['file_path'],false);
    // 	$params['status'] = 2;

    // 	$batch = new Batch();
    // 	$res = $this->storeData($batch,$params);

    // 	if(!$res){
    // 		return redirect()->back()->with('msg','添加批次失败');
    // 	}
    // 	return redirect('/admin/batch/list');
    // }

    public function store(Request $request)
    {
        $params = $request->all();
        unset($params['_token']);

        $files = $params['file_path'];
    
        $path = "uploads/".date("Y-m-d",time());  //文件存储目录
        if(!file_exists($path)){
            @mkdir($path,755,true);
        }

        $filename= "/".date('YmdHis',time()).rand(10000,99999).".".$files->extension();
        @move_uploaded_file($files->path(),$path.$filename); 
        $params['file_path'] = $path.$filename;

        $params['status'] = 2;

        $batch = new Batch();
        $res = \DB::table('jy_batch')->insert($params);
        if(!$res){
            return redirect()->back()->with('msg','添加批次失败');
        }
        return redirect('/admin/batch/list');

    }

   // // 执行批次
   //  public function doBatch($id){
   //  	//获取批次的信息
   //  	$batch = new Batch();
   //  	$batchInfo = $this->getDataInfo($batch,$id)->toArray();
   //      dd($batchInfo);
   //  	// 获取上传文件的内容

   //      $fileContent = file_get_contents($batchInfo['file_path']);
 
   //  	$arr = explode("\r\n",$fileContent);

   //  	// 发送红包批次
   //  	if($batchInfo['type'] == 1){
   //  		$arr = array_chunk($arr,3);
   //  		// 红包id                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
   //  		$bonusId = $batchInfo['content'];
   //          // dd($bonusId);
   //  		$bonus = new Bonus();
   //  		$bonusInfo = $this->getDataInfo($bonus,$bonusId);

   //  		// 循环队列
   //  		foreach ($arr as $key => $value) {
   //  			$data = [
   //  				'user_id' => $value,
   //  				'bonus_id' => $bonusId,
   //  				'expires' =>$bonusInfo->expires
   //  			];
 
   //  			// 实例化队列任务类
   //  			$job = new BonusBatchJob($data);

   //  			//执行任务分发
   //  			dispatch($job);
   //  		}
   //  	}

    // 	// 修改批次状态为已处理
    // 	$batch = Batch::find($id);
       
    // 	$this->storeData($batch,['status'=>3]);

    // 	return redirect('/admin/batch/list');
    // }

    public function doBatch($id)
    {
        $batch = new Batch();
        $batchInfo = $this->getDataInfo($batch,$id)->toArray();
        $file_path = file_get_contents($batchInfo['file_path']);
        $arr = explode("\r\n",$file_path);
        if($batchInfo['type'] == 1){
            $arr = array_chunk($arr,3);
            $bonusId = $batchInfo['content'];
            // dd($bonusId);
            $bonus = new Bonus();
            $bonusInfo = $this->getDataInfo($bonus,$bonusId);
            // dd($bonusInfo);
            foreach ($arr as $key => $value) {
                $data = [
                    "user_id" => $value,
                    "bonus_id" =>$bonusId,
                    "expires" =>$bonusInfo->expires
                ];
                // dd($data);
                $job = new BonusBatchJob($data);
                disPatch($job);
            }
        }
        // dd($arr);
        $batch = Batch::find($id);
        $this->storeData($batch,['status'=>3]);
    //  $this->storeData($batch,['status'=>3]);

        return redirect('/admin/batch/list');
    }
}
