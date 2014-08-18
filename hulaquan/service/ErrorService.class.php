<?php

include_once "xml/XMLUtils.class.php";
class ErrorService{
	
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
	
	
	
	
	public function doError($postObj){
		//return XMLUtils::getInstance()->createTextXMLObjForWeiXin($postObj->FromUserName, $postObj->ToUserName, time(), "text", "选项飞跑了!");
		return XMLUtils::getInstance()->createTextXMLObjForWeiXin("sss", "fff", time(), "text", "选项飞跑了!");
	}

	
	
	
	
	
	
}




?>