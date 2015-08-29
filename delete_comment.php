<?php
session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>删除评论</title>
</head>

<body>
	<hr width="100%">
        <?php require("header.php");?>
		<hr width="100%">	
	<?php
		$id = $_GET['id'];
		//执行删除
		if(isset($_SESSION['User'])){
			require("config.php");
			$delete = "DELETE FROM `comments` WHERE id=$id";
			mysql_query($delete, $conn) or die("删除评论失败:".mysql_error());
			?>
            <p>删除成功!</p>
            <?php
		}
    ?>
</body>
</html>