<?php
//homepagebuilder.php
require_once("./mumu.php");
require_once("./mylib.php");
require_once("./setting.php");

class genHtml{
	function site($out){
		myHttp::putHeader();
		$t = MuParser::parse_from_file('./site.html'); // テンプレートファイル読み込み
		$out["Settings"]=wbms::settings();
//		myUtl::putDump($out);
		echo $t->render($out); // テンプレートへの値の埋め込み、出力
	}
	function user($out){
		myHttp::putHeader();
		$t = MuParser::parse_from_file('./user.html'); // テンプレートファイル読み込み
		$out["Settings"]=wbms::settings();
//		myUtl::putDump($out);
		echo $t->render($out); // テンプレートへの値の埋め込み、出力
	}
	function addWb($out){
		myHttp::putHeader();
		$t = MuParser::parse_from_file('./addWb.html'); // テンプレートファイル読み込み
//		myUtl::putDump($out);
		$out["Settings"]=wbms::settings();
		echo $t->render($out); // テンプレートへの値の埋め込み、出力
	}
}


?>