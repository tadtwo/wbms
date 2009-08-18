<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>site.php</title>
<pre>
<?php
//site.php
require_once("./setting.php");
require_once("./mylib.php");
require_once("./homepagebuilder.php");
echo "A";
if(isset($_GET['uri']))      {$site_uri=$_GET['uri'];}
else if(isset($_GET['url'])) {$site_uri=$_GET['url'];}

if(isset($site_uri)){

	if(!($fsitedata=fopen("./data/".myUri::Encode($site_uri).".json",'r'))){
		echo "&quot;usilst&quot; not found!\n";
		echo myUri::Encode($site_uri).".json\n";
	}else{
		$sitedata=json_decode(stream_get_contents($fsitedata),TRUE);
		fclose($fsitedata);
//		var_dump($sitedata);
	}
}

if(isset($sitedata)&&$sitedata!==NULL){
	foreach($sitedata["Users"] as $k=>$e){
		echo $e["user_id"]."\n";
		if(ereg("[0-9]{3}",$e["user_id"])){
			if(!($fuserdata=fopen("./data/user".$e["user_id"].".json",'r'))){
				echo "&quot;usilst&quot; not found!\n";
				echo myUri::Encode($site_uri).".json\n";
			}else{
				$userdata=json_decode(stream_get_contents($fuserdata),TRUE);
				$userdata=$userdata["User"];
//				var_dump($userdata["Bookmark"]);
				foreach($userdata["Bookmark"] as $lk=>$le){
//					var_dump(strcmp($site_uri,$le["uri"]));
					if(strcmp($site_uri,$le["uri"])==0){
//						var_dump($le);
//						var_dump($le["nickname"]);
						$bm_users[]=array("scr"=>$userdata["scr_name"],"cmt"=>$le["comment"],
										  "epc"=>$le["epoch"],"nam"=>$userdata["nickname"]);
					}
				}
			}
		}
	}
//	var_dump($bm_users);
}else{
	var_dump("error.");
}

echo "</pre>";
if(isset($bm_users)){
	echo "<dl>";
	foreach($bm_users as $k=>$e){
		echo "<pre>";
		var_dump($k);
		var_dump($e);
		echo "</pre>";
		echo "<dt>".$e["nam"]."(".$e["scr"].")さん</dt>";
		echo "<dd>".$e["cmt"]."</dd>";
		echo "<dd>".date("Y年m月d日 H時i分s秒", $e["epc"])."</dd>";
	}
}


?>