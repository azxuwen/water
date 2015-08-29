<?php
	require("header.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发表文章</title>
	<style type="text/css">
		
		
	</style>

</head>

<body>

	

	<center><h2>发表文章</h2></center>
    
    
    	     <table width="500px" height="300px" border="1" cellpadding="0" cellpadding="0" align="center">
                    <form action=new_essay.php method="post">
            	<tr><td><strong>标题</strong></td><td><input type="text" name="title" size="60"></td></tr>
                <tr><td><strong>内容</strong></td><td valign="top"><textarea cols="50" rows="20" name="content"></textarea></td></tr>	
                <tr><td>&nbsp;</td><td align="right"><input type="submit" name="submit" value="提交"></td></tr>
                    </form>
            </table>

</body>
</html>

<?php
	if(@$_POST['submit']!=""){
			//将用户的文章添加到数据库
		require("config.php");
		$add_essay = "INSERT INTO `work` VALUES('','$_POST[title]', '$_POST[content]', now() )";
		mysql_query($add_essay, $conn) or die("文章提交到数据库失败:".mysql_error());
		
		echo "<font face=幼圆 size=5 color=#FFFFFF>提交成功!</font><p />";
		echo "<font face=幼圆 size=5>页面将自动跳转到主页，若没有跳转，请点击<a href=index.php>这里</a></font><p />";
		?>
        	<meta http-equiv="refresh" content="1;index.php">
       <?php 
		require("footer.php");
	}
	
?>





