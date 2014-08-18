<?php

/**
 * xml工具类
 */
class XMLUtils {
	
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
	
	
	public function createTextXMLObjForWeiXin($fromUsername, $toUsername, $time, $msgType, $contentStr) {
		
		$textTpl = "<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName>
					<CreateTime>%s</CreateTime><MsgType><![CDATA[%s]]></MsgType><Content><![CDATA[%s]]></Content><FuncFlag>0</FuncFlag></xml>";
		return sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
	}
}

?>