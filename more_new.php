<?php
session_start();
	require("config.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>文章列表</title>
	<style type="text/css">
		a{
			color:black;
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
    <?php  
		if(isset($_SESSION['User'])){
			echo "<font color=red>当前管理员:".$_SESSION['User']."</font>";
		}
	?>
	<h1><center> 美文展示</center></h1>
    	<h4 align=right><a href="new_essay.php">发布文章</a><h4>
	<?php
		//获取各个文章的信息  在work表中
		$abtain_essay = "SELECT * FROM `work`";
		$result_essay = mysql_query($abtain_essay, $conn) or die("获取文章失败:".mysql_error());
		if(mysql_num_rows($result_essay)==0){
			echo "No  essay!<p />";
		}
		else{
			echo "<table width=800px height=400px align=center>";
			echo "<form action=more_new.php method=post>";
			while($arr = mysql_fetch_array($result_essay)){
				$str_essay = substr($arr['content'], 0, 60);
				echo "<tr>";
				//这里只有管理员可以看得见 分别完成 删除文章 和 修改文章的功能
				if(isset($_SESSION['User'])){
				echo "<td><a href=delete_essay.php?id=".$arr['id']."><font color=red>删除</font></a></td>";
				echo "<td><a href=update_essay.php?id=".$arr['id']."><font color=red>编辑</font></a></td>";
				}
				echo "<td align=left><a href='essay_view.php?id=".$arr['id']."'>".$arr['title']."</a></td><td align=right>".$str_essay."</td></tr>";
			}
			echo "</table>";
		}
		echo "</form>";
	
		echo "<table height=50px ><tr><td></td></tr></table>";
		//加入版权
		require("footer.php");
    ?>

</body>
</html>
