<?php

class myHttp{
	const charset="UTF-8";
	
	function putHeader(){
		if(!headers_sent()){
			header("Content-Type: text/html; charset=".myHttp::charset);
			return 0;
		}else{
			return -1;
		}
	}
}

class wbms{

	const owner="k.usami";
	const site="./site.php";
	const user="./user.php";
	const addb="./addWb.php";
	
	function settings(){
		return array(
			"owner"=>wbms::owner,"site"=>wbms::site,
			"user" =>wbms::user ,"addb"=>wbms::addb
		);
	}
}

?>