<!DOCTYPE html>
<html lang="zh-CN">
	<head>
	<meta charset="utf-8" />
	<title>生成二维码</title>
	<style type="text/css">
		body {
			background: url(./qrcode/2.jpg);
		}		
	</style>
	</head>
	<body>
		
		<h1 align="center" >生成二维码</h1>
		<form action="#" method="post" align="center">	
			<textarea class="shuru" name="info" placeholder="&nbsp;请输入文字内容"></textarea><br/>
			<input name="submit" type="submit" value="输入完毕" /> <br /><br />
		</form>		
	</body>
</html>

<?php	
	include "./qrcode/phpqrcode.php";
 	include "tool.php";	
	if(isset($_POST['submit'])){		
		$data = "$_POST[info]";
		QRcode::png($data,"./pic/test.png",QR_ECLEVEL_L,10,2,false);	
	    $QR = "./pic/test.png"; //已经生成的原始二维码图
	    $Logo = './pic/logo.png';
	    $Logo_re = './pic/test_logo.png';
	    $QR = imagecreatefromstring(file_get_contents($QR));
	    $Logo = imagecreatefromstring(file_get_contents($Logo));
	    $QR_width = imagesx($QR); //二维码图片宽度
	    $QR_height = imagesy($QR); //二维码图片高度
	    $logo_width = imagesx($Logo); //logo图片宽度
	    $logo_height = imagesy($Logo); //logo图片高度
	    $logo_qr_width = $QR_width / 5;
	    $scale = $logo_width / $logo_qr_width;
	    $logo_qr_height = $logo_height / $scale;
	    $from_width = ($QR_width - $logo_qr_width) / 2;
	    //logo嵌入二维码
	    $fore = imagecopyresampled($QR, $Logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);
	    //输出图片
	    imagepng($QR, $Logo_re);
	    if($fore){
	    	skip('tool.php','ok','恭喜你，二维码成功生成！');
	    }else{
	    	skip('tool.php','error','对不起，二维码生成失败，请重试！');
	    }
	}
?>