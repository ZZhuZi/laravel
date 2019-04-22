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
    	$accessKeySecret = $congfig['accessKeySecret']; //访问阿里云access权限的账号秘钥
    	$this->endpoint = $config['endpoint'];  //权限节点信息
    	$this->bucket = $config['bucket']; //权限空间的名字

    	try {
    		//实例化oss客户端对限
    		$this->ossClient = new ossClient($accessKeyId,$accessKeySecret,'http://'.$this->endpoint);
    	} catch (\Exception $e) {
    		\Log::error('Oss对象存储类实例化失败',[$e->getMessage,$e->getCode()]);

    	}

    }

    //oss文件上传的函数
    public function putFile($files)
    {
    	//文件上传的目录
    	$bassPath = 'uploads/'.date('Y-m-d',time());
    	//文件名字
    	$filename = '/'.date('YmdHis',time()).rand(0,10000).'.'.$files->extension();

    	//文件要上传的路径
    	$object = $basePath.$filename;
    	try {
    		//判断文件是否已经存在
    		$exists = $this->ossClient->doesObjectExist($this->bucket,$object);

    		if($exists){
    			\Log::error('上传的文件已经存在，文件路径是：'.$object);
    			return $object;
    		}
    		//执行文件的上传
    		$this->ossClient->uploadFile($this->bucket,$object,$files->path());
    	} catch (\Exception $e) {
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

    	return "http://".$this->bucket.'.'.$this->endpoint.'/'.$filePath;

    }

}
