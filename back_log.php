<?php
session_start();
session_register('User');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员登录</title>
</head>

<body>

	<table height="200px">
    	<tr><td></td></tr>
    </table>
    <form action="back_log.php" method="get">
	<table align="center" bgcolor="#2A5FFF">
    	<th align="center">管理员登录</th>
        <tr><td>用户名:</td><td><input type="text" name="user"></td></tr>
        <tr><td>密　码:</td><td><input type="password" name="password"></td></tr>
        <tr><td>&nbsp;</td><td><input type="submit" name="submit" value="登录"></td></tr>
    </table>
    </form>
    

</body>
</html>
<?php
	if(@$_GET['submit']!=""){
		require("config.php");
		$check_admin = "SELECT * FROM `admin`" ;
		$result = mysql_query($check_admin, $conn) or die("管理员验证失败:".mysql_error());
		while($arr = mysql_fetch_array($result)){
			if($arr['User']==trim($_GET['user']) && $arr['Password']==trim($_GET['password'])){
					$_SESSION['User']=$_GET['user'];
				?>
                	<meta http-equiv="refresh" content="1; index.php">
                <?php
			}
		}
	}
?>