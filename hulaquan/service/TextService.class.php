<?php

/*
 * 文本处理层
 * 
 * 
 * */
include_once "xml/XMLUtils.class.php";
class TextService{
	
	
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
	
		$keyword = trim($postObj->Content);
		$contentStr="";
		switch ($keyword){
			case "百度地图";
			$contentStr= "<a href='http://map.baidu.com/'>点击进入[".$keyword."]</a>";
			break;
			case "有道翻译";
			$contentStr= "<a href='http://fanyi.youdao.com/'>点击进入[".$keyword."]</a>";
			break;
			default:$contentStr="现在只提供百度地图和有道翻译@all";
		}
		return XMLUtils::getInstance()->createTextXMLObjForWeiXin($postObj->FromUserName, $postObj->ToUserName, time(), "text", $contentStr);
	}
	
	
	
	
}

?>