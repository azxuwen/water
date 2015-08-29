<?php
	$local = 'localhost';
	$mysql_user = 'root';
	$mysql_password = '123456';
	$mysql_db = 'water';
	$conn = mysql_connect($local, $mysql_user, $mysql_password) or die ("连接数据库失败:" . mysql_error());
	mysql_select_db($mysql_db, $conn) or die("打开数据库失败:" . mysql_error());
	mysql_query("set names 'utf8'");//编码方式
?>
