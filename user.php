<?php
require_once("./setting.php");
//user.php
require_once("./mylib.php");
require_once("./homepagebuilder.php");

myHttp::putHeader();


// user.php
//include "./mylib.php";

//URIの引数を読み込み
if(isset($_GET['id']))   { $arg_id  = $_GET['id'];}
if(isset($_GET['name'])) { $arg_scr = $_GET['name'];}
if(isset($_GET['user'])) { $arg_scr = $_GET['user'];}


if($arg_id||$arg_scr){

	if(!($fp=fopen("./data/userlist.json",'r'))){
		die("ERROR. &quot;usrlst&quot; not found!\n");
	}

	$usrlst=json_decode(stream_get_contents($fp),TRUE);
		
	fclose($fp);

	echo "\n";
	if($arg_id!=NULL){
		foreach($usrlst as $k=>$e){
			if(!strcmp($arg_id,$k)){
//				echo "Your Screenname is ",$e,".\n";
				$usrid=$k;
			}
		}
	}else if($arg_scr!=NULL){
		foreach($usrlst as $k=>$e){
			if(!strcasecmp($arg_scr,$e)){
//				echo "Your ID is ".$k.".\n";
				$usrid=$k;
			}
//			echo "\n";
		}
	}
}else{
	echo "引数が不正です";
}


if($usrid){
	if(!($fp=fopen("./data/user".$usrid.".json",'r'))){
		die("ERROR. &quot;usrlst&quot; not found!");
	}
	$usrdat=json_decode(stream_get_contents($fp),TRUE);
	$usrdat=$usrdat["User"];
//	myUtl::putDump($usrdat);
	fclose($fp);
}else{
//	echo "User not found.\n";
}

if($usrdat){
	if(isset($usrdat["Bookmark"])){
//		echo "Bookmark found.\n";
//		var_dump($usrdat["Bookmark"]);
		foreach($usrdat["Bookmark"] as $k=>$e){
//			myUtl::putDump(myUri::Encode($e["uri"]));
			if(!($fp=fopen("./data/".myUri::Encode($e["uri"]).".json",'r'))){
//				echo("ERROR. &quot;usrlst&quot; not found!\n");
			}else{
				$sitedata=json_decode(stream_get_contents($fp),TRUE);
//				myUtl::putDump($sitedata);
				fclose($fp);
				
//				myUtl::putDump($sitedata["Status"]["title"]);
				$e["title"] = $sitedata["Status"]["title"];
				$e["time"]  = date("Y年m月d日 H時i分s秒", $e["epoch"]);
//				myUtl::putDump($e["title"]);		
//				myUtl::putDump($e["time"]);		
//				myUtl::putDump($e);
			}
		}
//		myUtl::putDump($usrdat);
	}else{
//		echo "Bookmark not found.\n";
	}
}
genHtml::user($usrdat);

?>
