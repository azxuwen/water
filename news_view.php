<?php
session_start();
	require("config.php");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻资讯</title>
	<style type="text/css">
	body{
		margin:0 auto;
		width:1024px;
	}
		.news{
			position:relative;
			width:800px;
			height:450px;
			margin:0 auto;
			
		}
		a{
			color:black;
			text-decoration:none;
		}
		a:hover{
			color:gray;
		}
		#a_type {
			color:red;
		}
	</style>

</head>

<body>
	<hr width="100%">
        <?php require("header.php");?>
		<hr width="100%">	
        <?php  
			if(isset($_SESSION['User'])){
				echo "<font color=red>当前管理员:".$_SESSION['User']."</font>";
				echo "<p align=right>管理员<a href=post_news.php><b>添加</b></a>新闻</p>";
			}
		?>
        <h2><center>最新资讯</center></h2>
	<div class="news">
	<?php
		//将新闻列表展示在网页内
		$abtain_news = "SELECT * FROM `news` ORDER BY time DESC ";
		$result_news = mysql_query($abtain_news, $conn) or die("获取新闻列表失败:".mysql_error());
		echo "<table align=center border=1 width=850px cellpadding=0 cellspacing=0>";
		if(mysql_num_rows($result_news)==0){
			echo "<tr><td>暂无新闻,敬请期待!</td></tr> ";
		}
		else{
			while($arr = mysql_fetch_array($result_news)){
				echo "<tr height=20px>";
					if(isset($_SESSION['User'])){
						echo "<td><a id=a_type href=update_news.php?id=".$arr['id'].">修改</a></td>";
						echo "<td><a id=a_type href=delete_news.php?id=".$arr['id'].">删除</a></td>";
					}
				
				echo "<td align=left><a href=news.php?id=".$arr['id'].">".$arr['title']."</a></td>";
				echo "<td align=right>".$arr['time']."</td>";
				echo "</tr>";
			}
			
		}
		echo "</table>";
    ?>
    </div>
    <?php
		require("footer.php");
    ?>
</body>
</html>