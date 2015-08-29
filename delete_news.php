<?php
session_start();
	require("config.php");
	$str = $_SERVER['REQUEST_URI'];	
	$place = strrpos($str, "=");
	$str_place = substr($str, $place+1);
	$id=$str_place;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除新闻</title>
</head>

<body>

	<?php
		$delete_essay = "DELETE FROM `news` WHERE id=$id";
		$result = mysql_query($delete_essay, $conn) or die("删除新闻失败:".mysql_error());
		if($result){
			?>
            	<p>删除成功</p>
					<meta http-equiv="refresh" content="1; news_view.php">
            <?php
		}
		
    ?>
</body>
</html>