<?php
namespace App\Tools;
class Single
{
	static private $instance;
	private $config;
	private function __construct($config){
		$this->config = $config;
		echo "实力化";
	}
	private function __clone(){

	}
	public static function getInstance($config){
		// dd($self::$instance instanceof self);

		if(!self::$instance instanceof self ){
			self::$instance = new self($config);
		}
		return self::$instance;
	}
	public function getName(){
		// echo $this->config;
		return $this->config;
	} 
}
// -----------------------------------------
// namespace App\Tools;
// class Single
// {
// 	static private $instance;
// 	private $config;
// 	private function __construct($config){
// 		$this->config = $config;
// 		echo "实力化2";
// 	}
// 	private function __clone(){

// 	}
// 	public static function getInstance($config){
// 		if(!self::$instance instanceof self){
// 			                                       // instanceof 检测一个变量是否属于某个类的实例
// 			self::$instance = new self($config);
// 		}
// 		return self::$instance;
// 	}
// 	public function  getName(){
// 		echo $this->config;
// 	}
// }

// class Single
// {
// 	static private $instance;
// 	private $config;
// 	private function __construct($config){
// 		$this->config = $config;
// 	}
// 	private function __clone(){

// 	}
// 	public static function getInstance($config){
// 		if(!self::$instance instanceof self){
// 			self::$instance = new self($config);
// 		}
// 		return self::$instance;
// 	}
// 	public function getName(){
// 		echo $this->config;
// 	}
// }

// class Single
// {
// 	static private $instance;
// 	private $config;
// 	private function __construct($config){
// 		$this->config = $config;
// 		echo "实例化成功";
// 	}
// 	private function __clone(){

// 	}
// 	public static function getInstance($config){
// 		if($self::$instance instanceof self){
// 			self::$instance = new self($config);
// 		}
// 		return self::$instance;
// 	}
// 	public function getName(){
// 		echo $this->config;
// 	}
// }

// class Signle
// {
// 	static private $instance;
// 	private $config;
// 	private function __construct($config){
// 		$this->config = $config;
// 		echo "实例化成功";
// 	}
// 	private static function getInstance($config){
// 		if($self::$instance instanceof self){
// 			self::$instance = new  self($config);
// 		}
// 		return self::$instance;
// 	}
// 	public function getName(){
// 		echo $this->config;
// 	}
// }