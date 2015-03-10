<?php
	
	/**
	 * 订单列表
	 */
	
	// 读取数据库配置
	$config = require('conf.php');

	$db = mysql_connect($config['DB_HOST'],$config['DB_USER'],$config['DB_PWD']);
	
	if (!$db) {
	  	die('数据库连接失败: ' . mysql_error());
	} 

	mysql_select_db($config['DB_NAME'], $db);
	
	$sql = "select * from orders where status = 1 order by time desc"; 
	
	$query = mysql_query($sql, $db);

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<title>订单列表</title>

	<link rel="stylesheet" type="text/css" href="Public/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="Public/css/style.css" />

	<!-- jQuery -->
	<script type="text/javascript" src="Public/js/jquery-1.11.2.min.js"></script>
	<!-- Bootstrap -->
	<script type="text/javascript" src="Public/js/bootstrap.min.js"></script>

</head>

<body>
	<div class="container-fluid">
		<div class="row">
			<h3 class="text-center">订单列表</h3>
		</div>
	</div>
	<br>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12">
				<table class="table table-striped">
  					<thead>
  						<tr>
  							<th class="text-center">收货人姓名</th>
  							<th class="text-center">联系方式</th>
  							<th class="text-center">收货地址</th>
  							<th class="text-center">订单时间</th>
  							<th class="text-center">QQ</th>
  							<th class="text-center" width="40%">留言</th>
  							<th class="text-center">IP</th>
  							<th class="text-center">操作</th>
  						</tr>
  					</thead>
  					<tbody>

  					<?php 
						while($row = mysql_fetch_array($query)){ 
					?> 

  						<tr>
  							<td><?php echo $row['name']; ?></td>
  							<td><?php echo $row['phone']; ?></td>
  							<td><?php echo $row['address']; ?></td>
  							<td><?php echo $row['time']; ?></td>
  							<td><?php echo $row['qq']; ?></td>
  							<td><?php echo $row['message']; ?></td>
  							<td><?php echo $row['ip']; ?></td>
  							<td><a href="javascript:void()" onclick="del(<?php echo $row['id']; ?>)">删除</a></td>
  						</tr>
  					
  					<?php 
						} 
					?> 
  					
  					</tbody>
  				</table>
			</div>
		</div>
	</div>

	<script type="text/javascript">

		function del(id){
			if(confirm('您确定要删除该订单信息？')) {
				var url = "delete.php?id=" + id;
				$.get(url, function(data) {
					var json = eval("("+data+")");
					alert(json.msg);
					if(json.status == 'success') {
						window.location.href = '__order__.php';
					}
				});
			}
		}
	</script>
</body>
</html>