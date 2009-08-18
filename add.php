<?php
require_once("./mylib.php");
require_once("./setting.php");
require_once("./homepagebuilder.php");

myHttp::putHeader();


class addWb{
function __construct($uri){
	if(myUri::Check($uri)){
		$this->flag=TRUE;
		return 0;
	}else{
		$this->flag=FALSE;
		return -1;
	}
}

}


echo "hoge";

if(!isset($_POST["INPUT_URI"])){
	myUtl::putDump($_POST);
}else{
	myUtl::putDump("error.");	
}
echo "hoge";

//URIの引数を読み込み






?>
