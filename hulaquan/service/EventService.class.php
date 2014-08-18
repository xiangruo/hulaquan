<?php

include_once "xml/XMLUtils.class.php";
class EventService{
	
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
	
		$eventObj=$postObj->Event;
		$contentStr="";
		switch ($eventObj){
			case "subscribe";
			$contentStr= "欢迎关注呼啦圈@hulaquan365";
			break;
			case "unsubscribe";
			$contentStr= "感谢关注呼啦圈@hulaquan365";
			break;
			default:$contentStr="事件异常@hulaquan365";
		}
		return XMLUtils::getInstance()->createTextXMLObjForWeiXin($postObj->FromUserName, $postObj->ToUserName, time(), "text", $contentStr);
	}

	
	
	
	
	
	
}




?>