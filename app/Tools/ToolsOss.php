<?php

namespace App\Tools;

use OSS\OssClient;
use OSS\Core\OssException;

class ToolsOss
{
    //
    protected $ossClient = null;
    protected $endpoint  = null;
    protected $bucket    = null;

    public function __construct(){
    	//获取oss的配置信息
    	$config = \Config::get('oss');

    	$accessKeyId = $config['accessKeyId']; //访问阿里云access权限的账号
    	$accessKeySecret = $config['accessKeySecret']; //访问阿里云access权限的账号秘钥
    	$this->endpoint = $config['endpoint'];  //权限节点信息
    	$this->bucket = $config['bucket']; //存储空间的名字

    	try {
    		//实例化oss客户端对限
    		$this->ossClient = new OssClient($accessKeyId,$accessKeySecret,'http://'.$this->endpoint);
    	} catch (OssException $e) {
    		\Log::error('Oss对象存储类实例化失败',[$e->getMessage,$e->getCode()]);

    	}

    }

    // 文件名随机生成
    public static function fileName($files)
    {
       $filename = "/".date('YmdHis',time()).rand(10000,99999).".".$files->extension(); 
       return $filename;
    }

    //oss文件上传的函数
    public function putFile($files)
    {
    	//文件上传的目录
    	$basePath = 'uploads/'.date('Y-m-d',time());
        // dd($files);     //图片是对象
    	//文件名字
    	// $filename = "/".date('YmdHis',time()).rand(10000,99999).".".$files->extension();
        $filename = ToolsOss::fileName($files);
    	//文件要上传的路径
    	$object = $basePath.$filename;
    	try {
    		//判断文件是否已经存在
    		$exists = $this->ossClient->doesObjectExist($this->bucket,$object);

    		if($exists){
    			\Log::error('上传的文件已经存在,文件路径是：'.$object);
    			return $object;
    		}
    		//执行文件的上传
    		$this->ossClient->uploadFile($this->bucket,$object,$files->path());
    	} catch (OssException $e) {
    		\Log::error('Oss文件上传失败',[$e->getMessage(),$e->getCode()]);
    		return $object;
    	}

    	return $object;
    }

    //访问文件的路径
    public function getUrl($filePath,$private = false)
    {
    	$timeout = 3600;

    	//私有的路径
    	if($private){
    		$signUrl = $this->ossClient->signUrl($this->bucket,$filePath,$timeout);

    		return $signUrl;
    	}
        // dd($signUrl);

    	return "http://".$this->bucket.'.'.$this->endpoint.'/'.$filePath;

    }

}
