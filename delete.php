<?php

	/**
 	 * 删除订单	
     */

	if($_SERVER['REQUEST_METHOD'] != "GET") die;

	// 验证订单ID
	if($_GET["id"] == "") {
		return;
	} 

	$id = $_GET['id'];

	if(!is_numeric($id)) {
		return;
	}

	// 读取数据库配置
	$config = require('conf.php');

	$db = mysql_connect($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD']);
	
	if (!$db) {
	  	echo json(array('status' => 'failed', 'msg' => '订单删除失败！'));
	  	return;
	} 

	mysql_select_db($config['DB_NAME'], $db);
	
	$sql = "UPDATE orders SET status = 0 WHERE id = " . $id;

	$res = mysql_query($sql, $db);

	if (!$res) {
		echo json(array('status' => 'failed', 'msg' => '订单删除失败！'));
		die;
  	} else {
  		echo json(array('status' => 'success', 'msg' => '订单删除成功！'));
  	}

	mysql_close($db);

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
