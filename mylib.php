<?php
/* myLib.php by k.usami */

class myUri{
function Encode($str){
	$pattern=array("/_/","/%/");
	$replace=array("___","_");
	return preg_replace($pattern,$replace,rawurlencode($str));
}

function Decode($str){
	$pattern=array("/___/","/_/","/\|\|\|/");
	$replace=array("|||","%","_");
	return rawurldecode(preg_replace($pattern,$replace,$str));
}

function Check($uri){
	return preg_match("/https?\\:\\/\\/(([a-zA-Z0-9][-a-zA-Z0-9\\.]*\\.[a-zA-Z]{2,4})|[12][0-9]{0,2}(\\.[0-9]{1,3}){3})(:[0-9]{1,5})?\\/([-a-zA-Z0-9_\\?%\\\$&=\\(\\)\\[\\]\\/\\.#\\{\\}\\+:;@\'\"]*)?/",$uri);
// /https?\:\/\/(([a-zA-Z0-9][-a-zA-Z0-9\.]*\.[a-zA-Z]{2,4})|[12][0-9]{0,2}(\.[0-9]{1,3}){3})(:[0-9]{1,5})?\/([-a-zA-Z0-9_\?%\$&=\(\)\[\]\/\.#\{\}\+:;@\'\"]*)?/
// /(https?\:\/\/(([a-zA-Z0-9][-a-zA-Z0-9\.]*\.[a-zA-Z]{2,4})|([12][0-9]{0,2}(\.[0-9]{1,3}){3}))(:[0-9]{1,5})?)$/
}

function CheckRoot($uri){
	if(preg_match("/https?\\:\\/\\/(([a-zA-Z0-9][-a-zA-Z0-9\\.]*\\.[a-zA-Z]{2,4})|[12][0-9]{0,2}(\\.[0-9]{1,3}){3})(:[0-9]{1,5})?\\/([-a-zA-Z0-9_\\?%\\\$&=\\(\\)\\[\\]\\/\\.#\\{\\}\\+:;@\'\"]*)?/",$uri)){
		return 0;
	}
}

function test(){
	header("Content-Type: text/html; charset=UTF-8"); 
	echo "<pre>";
	$test=array("http://www.hogehoge.com/","こんにちは","a_b___c__d%efg");
	foreach($test as $e){
		echo "raw: ".$e."\n";
		echo "enc: ".myUri::Encode($e)."\n";
		echo "dec: ".myUri::Decode(myUri::Encode($e))."\n";
		echo "\n";
	}
	echo "</pre>";
}

function test2(){
	echo "<pre>";
	var_dump(myUri::Check("https://127.0.0.1/hogeho#ge"));
	var_dump(myUri::Check("http://localhost.jp/aaaaa"));
	var_dump(myUri::Check("http://ggggg.com:8080/?p"));
}
}//end class

class myUtl{
function putDump($out){
		echo "<pre>";
		var_dump($out);
		echo "</pre>";
}

}//end class

//myUri::test2();

?>