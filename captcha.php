<?php

 	// 生成验证码 
	session_start();	
	require './ValidateCode.class.php';  //先把类包含进来，实际路径根据实际情况进行修改。
	
	$vc = new ValidateCode();  //实例化一个对象
	$vc->doimg();  
	$_SESSION['captcha'] = $vc->getCode();//验证码保存到SESSION中

?>
