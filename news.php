<?php
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
<title>单个新闻展示</title>

	<style type="text/css">
		body{
			margin:0 auto;
		}
		.news{
			width:600px;
			margin:0 auto;
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
        <?php require("header.php");?>
		<hr width="100%">	
        
	<div class="news">
    	<?php
			//获取指定的新闻
			$abtain_new = "SELECT * FROM `news` WHERE id=$id";
			$result_new = mysql_query($abtain_new, $conn) or die ("获取新闻失败:".mysql_error());
			$arr = mysql_fetch_array($result_new);
			echo "<table border=1 cellpadding=0 cellspacing=0>";
			echo "<tr><td align=center><font face=黑体 size=6>".$arr['title']."</font></td></tr>";
			echo "<tr><td><font face=黑体 size=3>　　".$arr['content']."</font></td></tr>";
			echo "<tr><td align=right>".$arr['time']."</td></tr>";
			

			echo "<tr><td align=right>分享到:<a href=http:\\qzone.qq.com target=top>QQ</a>　<a href=http:\\renren.com>人人网</a></td></tr>";
			echo "</table>";
        ?>
    </div>
    <?php  require("footer.php");?>
</body>
</html>