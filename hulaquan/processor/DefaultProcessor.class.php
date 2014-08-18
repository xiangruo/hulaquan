<?php
include_once "service/EventService.class.php";
include_once "service/ErrorService.class.php";
include_once "service/TextService.class.php";
class DefaultProcessor{
	
	//保存类实例的静态成员变量
	private static $_instance;
	
	//private标记的构造方法
	private function __construct(){
	}
	
	//创建__clone方法防止对象被复制克隆
	public function __clone(){
		trigger_error('Clone is not allow!',E_USER_ERROR);
	}
	
	public static function getInstance(){
		if(!(self::$_instance instanceof self)){
			self::$_instance = new self;
		}
		return self::$_instance;
	}
	
	
	
	public function doSomething($postObj){
		
		$msgType=$postObj->MsgType;
		$resultStr="";
		switch ($msgType){
			case "event";
				$resultStr= EventService::getInstance()->doSomething($postObj);
				break;
			case "text";
				$resultStr= TextService::getInstance()->doSomething($postObj);
				break;
			default:$resultStr = ErrorService::getInstance()->doError($postObj);
		}
		
		return $resultStr;
		
	}
	
	
	
	
	
	
}




?>