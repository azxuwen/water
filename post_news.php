<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>发布新闻</title>
</head>

<body>
	<hr width="100%">
	<?php
		require("header.php");
    ?>
    <hr width=100%>

	<font size="7" ><center>发布新闻</center></font>
    
    <center><form action="post_news.php" method="post">
    	标　　题<p><input type="text" name="title" size=30><p>
        内　　容<pre><textarea name="content" cols=30 rows="10"></textarea></pre><p>
        <input type="submit" name="submit" value="发布新闻"><p>
    </form></center>
</body>
</html>
<?php
	if(@$_POST['submit']!=""){
		if($_POST['title']!="" && $_POST['content']!=""){
			//存入数据库
			require("config.php");
			$insert_news = "INSERT INTO `news` VALUES('', '$_POST[title]','$_POST[content]', now())";
			mysql_query($insert_news, $conn) or die("存入数据库失败:". mysql_error());
			
			echo "<center>新闻发布成功!</center><p>";
		}
		else{
			echo "信息不全面!";
		}
	}
?>