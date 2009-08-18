<pre>
<?php
$a = $_GET['a']; 
$b = $_GET['b']; 
$c = $_GET['c']; 

echo "<pre>";
var_dump($_GET);
var_dump($_GET['a']);
var_dump($_GET[1]);
//ディレクトリ・ハンドルをオープン
$res_dir = opendir( './data' );

//ディレクトリ内のファイル名を１つずつを取得
while( $file_name = readdir( $res_dir ) ){
	//取得したファイル名を表示
	print "{$file_name}\n";
}

//ディレクトリ・ハンドルをクローズ
closedir( $res_dir );

?>

