<?php
require_once("./mylib.php");
require_once("./setting.php");
require_once("./homepagebuilder.php");

myHttp::putHeader();

//URIの引数を読み込み
foreach($_GET as $k=>$e){
	if(!myUri::Check($k))       {$uri=$k;}
	else if(!myUri::Check($e))  {$uri=$e;}
}
if(!isset($uri)){
	$uri=FALSE;
}

//var_dump(array("seturi"=>$uri));

genHtml::addWb(array("seturi"=>$uri));






?>
