<?php
session_start();
	$id_comm = $_SESSION['id_comm'];
	require("config.php");
	$str = $_SERVER['REQUEST_URI'];
	$place = strrpos($str, "=");
	$str_place = substr($str, $place+1);
	$id=$str_place;
	$value = $id;
	//评论页面
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>评论页面</title>
	<style type="text/css">
		body{
			margin:0 auto;
			width:1024px;
		}
		a{
			color:black;
			text-decoration:none;
		}
		a:hover{
			color:gray;
		}
	</style>


</head>

<body>
	<hr width="100%">
    <?php  require("header.php");?>
    	<hr width="100%">

        

		<table border=1 align="center" width="500px" height="300px" cellpadding="0" cellspacing="0">
        	<form action="comment.php" method="post">
            	<tr><td><textarea name="comment" cols="58px" rows="15px"></textarea></td></tr>
                <tr><td align="right"><input type="submit" name="submit" value="提交评论"></td></tr>
            </form>
        </table>
</body>
</html>
<?php
	if(@$_POST['submit']!=""){
		if($_POST['comment']!=""){
			$add_comment = "INSERT INTO `comments` VALUES('', '$id_comm', '$_POST[comment]', now())";
			mysql_query($add_comment, $conn) or die("提交评论失败:".mysql_error());
			?>
            	<meta http-equiv="refresh" content="1; more_new.php">
            <?php
		}
	}
?>