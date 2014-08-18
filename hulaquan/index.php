<?php
include_once "processor/DefaultProcessor.class.php";
$postStr =isset($GLOBALS["HTTP_RAW_POST_DATA"]) ? $GLOBALS["HTTP_RAW_POST_DATA"] : "" ;
//$postStr = $GLOBALS ["HTTP_RAW_POST_DATA"];


if(!empty($postStr)){
		$postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
		//获取发送方和接接收方的ID
		echo  DefaultProcessor::getInstance()-> doSomething($postObj);
}else{
	echo  DefaultProcessor::getInstance()-> doSomething($postObj);
}

?>