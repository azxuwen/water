<?php
session_start();
	$id = $_GET['id'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除图片</title>
</head>

<body>
	<?php
		if(isset($_SESSION['User'])){  //这个只有后台可以看到的页面 最好还是安全一些
			require("config.php");
			
			//首先要现在硬盘上 删除掉该图片 所以要获得该图片的路劲
			$sql_pic = "Select img.img From `img` Where id=$id";
			$result_pic = mysql_query($sql_pic, $conn) or die("打开img失败:" . mysql_error());
			$arr_pic = mysql_fetch_array($result_pic);
			unlink($arr_pic['img']);

			//执行删除语句
			$delete_pic = "DELETE FROM `img` WHERE id=$id";
			$result = mysql_query($delete_pic, $conn) or die("删除失败!".mysql_error());
			if($result){
				echo "<p>删除成功!</p>";
				echo "<p>页面将自动返回主页</p>";
				?>
                	<meta http-equiv="refresh" content="2; index.php">
                <?php
			}
		}
    ?>
</body>
</html>