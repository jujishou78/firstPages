<?php 
function skip($url,$pic,$message){
$html=<<<A
	<!DOCTYPE html>
	<html lang="zh-CN">
	<head>
	<meta charset="utf-8" />
	<title></title>
	</head>
	<body>		
		<div align="center" class="notice" >
			{$pic}，{$message} <br /><br />
			<img src="pic/test_logo.png" width="300"/> <br />

		</div>
	</body>
	</html>
A;
	echo $html;
}
?>