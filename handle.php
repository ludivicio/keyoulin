<?php

	/**
 	 * 处理订单	
     */

	session_start();

	// 验证收货人
	if($_POST["name"] == "") {
		echo json(array('status' => 'failed', 'msg' => '请输入收货人姓名'));
		return;
	} 

	// 验证收货地址
	if($_POST["address"] == "") {
		echo json(array('status' => 'failed', 'msg' => '请输入收货人地址'));
		return;
	}

	// 验证手机号
	if($_POST["phone"] == "") {
		echo json(array('status' => 'failed', 'msg' => '请输入手机号'));
		return;
	} elseif(!is_mobile($_POST["phone"])) {
		echo json(array('status' => 'failed', 'msg' => '手机号不合法，请重新输入'));
		return;
	}
	
	// 验证码是否正确
	$code = $_POST["code"];
	if($code != $_SESSION["captcha"]) {
		echo json(array('status' => 'failed', 'msg' => '验证码输入错误'));
		return;
	} 

	// 过滤非法字符
	$name = htmlspecialchars($_POST["name"]);
	$phone = $_POST["phone"];
	$address = htmlspecialchars($_POST["address"]);

	$qq = htmlspecialchars($_POST["qq"]);
	$message = htmlspecialchars($_POST["message"]);

	// 获取访问者IP
	$ip = get_ip();

	// 测试得到的数据
	echo "name: " . $name . "<br/>" . "address: " . $address . "<br/>";
	echo "phone: " . $phone . "<br/>" . "qq: " . $qq . "<br/>";
	echo "message: " . $message . "<br/>";
	echo "ip: " . $ip . "<br/>";


	// 打开数据库

	// 保存订单数据

	// 响应浏览器

	
	/**
	 * 验证手机号码是否合法
	 * @param  [type]  $str [description]
	 * @return boolean      [description]
	 */
	function is_mobile($str){    
		return preg_match("/^13[0-9]{1}[0-9]{8}$|15[0189]{1}[0-9]{8}$|189[0-9]{8}$/", $str);   
	}

	/**
	 * 获取访问者的IP
	 * @return [type] [description]
	 */
	function get_ip(){
		
		if(!empty($_SERVER["HTTP_CLIENT_IP"])){
		  $cip = $_SERVER["HTTP_CLIENT_IP"];
		} elseif(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
		  $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		} elseif(!empty($_SERVER["REMOTE_ADDR"])){
		  $cip = $_SERVER["REMOTE_ADDR"];
		} else{
		  $cip = "无法获取！";
		}

		return $cip;
	}

	/**
	 * 返回json数据，并处理中文乱码问题
	 * @param  [type] $array [description]
	 * @return [type]        [description]
	 */
	function json($array) {
	    foreach ( $array as $key => $value ) {   
	        $array[$key] = urlencode($value);   
	    }   
	    return urldecode(json_encode($array));   
	}

?>
