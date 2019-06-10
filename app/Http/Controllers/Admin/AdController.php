<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Ad;
use App\Model\AdPosition;
use App\Tools\ToolsAdmin;
use App\Tools\ToolsOss;


use Excel;

class AdController extends Controller
{
    //
    protected $position = null;
    protected $ad = null;

    public function __construct(){
    	$this->position = new AdPosition();
    	$this->ad = new Ad();
    }

      //广告位展示页面
    public function list(){
      // dd(\Config::get('oss'));  //获取config 中的oss配置信息
    	// $ad = new Ad();
    	// $assign['list'] = $ad->getAdList();

    	$assign['list'] = $this->ad->getAdList();

        $oss = new ToolsOss();

        // dd($assign['list']);
        //处理图片对象
        foreach ($assign['list'] as $key => $value) {
           // dd($value['image_url']);
           // $value['image_url'] = $oss->getUrl($value['image_url'],true); // oss 文件查看
           // $value['image_url'] = '/'.$value['image_url'];     // 本地文件查看
          $value['image_url'] = file_exists($value['image_url'])? '/'.$value['image_url'] : $oss->getUrl($value['image_url'], true) ;

          $assign['list'][$key] = $value;
        }

        // dd($_SERVER);

    	return view('/admin/ad/list',$assign);
    }

    public function add(){
    	// $position = new AdPosition();
    	// $assign['position'] = $position->getList();

    	$assign['position'] = $this->position->getList();
    	return view('/admin/ad/add',$assign);
    }

    public function store(Request $request){
    	$params = $request->all();
    	// dd($params);
    	if(!isset($params['image_url']) || empty($params['image_url'])){
    		return redirect()->back()->with('msg','请选择图片');
    	}


// --------------------------------------------------------------------------------
       // // oss文件上传测试
       //  $files = $params['image_url'];
       //  // dd($files);

       //  $accessKeyId='LTAIU8rwB9JQT9l4';//访问阿里云access权限的账号id
       //  $accessKeySecret='lcq9dgyPToSphLE8tpQbzBFT4SFECA';//访问阿里云access权限的账号密钥
       //  $endpoint= 'http://oss-cn-beijing.aliyuncs.com';//权限的节点信息
       //  $bucket='lmz';//存储空间的名称

       //  $object = "uploads/".date('Y-m-d')."/".date('YmdHis',time()).rand(10000,99999).'.'.$files->extension(); //文件名称
       //  $filePath = $files->path();

       // try{
       //      $ossClient = new OssClient($accessKeyId, $accessKeySecret, $endpoint);

       //      $ossClient->uploadFile($bucket, $object, $filePath);
       //  } catch(OssException $e) {
       //      printf(__FUNCTION__ . ": FAILED\n");
       //      printf($e->getMessage() . "\n");
       //      return;
       //  }

       //  dd("success");


        // $oss = new ToolsOss();
        // $filePath = $oss->putFile($params['image_url']); 
        // dd($filePath);
        // $url = $oss->getUrl($filePath,true);
        // dd($url);

// ---------------------------------------------------------------------------------------
    	$params['image_url'] = ToolsAdmin::uploadFile($params['image_url'],true);  // 文件上传 上传至oss上
      // $params['image_url'] = ToolsAdmin::uploadFile($params['image_url'],false);

      // dd($params['image_url']);
    	$params = $this->delToken($params);
    	$ad = new Ad();
    	$res = $this->storeData($ad,$params);

    	if(!$res){
    		return redirect()->back()->with('msg','广告位添加失败');
    	}

    	return redirect('/admin/ad/list');
    }

    public function edit($id){
    	$ad = new Ad();
    	$assign['info'] = $this->getDataInfo($ad,$id);
    	$assign['position'] = $this->position->getList();

    	return view('/admin/ad/edit',$assign);
    }


    public function doEdit(Request $request){
    	$params = $request->all();
		if(isset($params['image_url']) && !empty($params['image_url'])){
    		// return redirect()->back()->with('msg','请选择图片');
    		$params['image_url'] = ToolsAdmin::uploadFile($params['image_url']);

    	}

    	$params = $this->delToken($params);

    	$ad = Ad::find($params['id']);

    	$res = $this->storeData($ad,$params);

    	if(!$res){
    		return redirect()->back()->with('msg','广告位添加失败');
    	}

    	return redirect('/admin/ad/list');
    }

    //删除广告
    public function del($id)
    {
        $ad = new Ad();
        $res = $this->delData($ad,$id);
        return redirect('/admin/ad/list');
    }

}
