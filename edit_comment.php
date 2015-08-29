<?php
session_start();
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑评论</title>
</head>

<body>
	
    <hr width="100%">  <!--导航-->
	<?php  require("header.php");?>
    <hr width="100%">
    
    
	<?php
		if(isset($_SESSION['User'])){
			$id  = @$_GET['id'];
			//调出该评论
			require("config.php");
			$abtain_comm = "SELECT * FROM `comments` WHERE id=$id";
			$result = mysql_query($abtain_comm, $conn);
			$arr = @mysql_fetch_array($result);
			echo "<form action=edit_comment.php method=post>";
				echo "<textarea name=new_comm cols=30px rows=10px>".$arr['comment']."</textarea>";		
				echo "<input type=hidden name=uid value=$id>";
				echo "<input type=submit  value=提交修改 name=submit>";
			echo "</form>";
		}
		else{
			echo "请不要得瑟!";
		}
	
    ?>
</body>
</html>
<?php
	//对管理员新修改的评论进行处理
	if(@$_POST['submit']!=""){
		if($_POST['new_comm']!=""){
			$update_comm = "UPDATE `comments` SET comment='$_POST[new_comm]' WHERE id='$_POST[uid]'";
			mysql_query($update_comm, $conn) or die("修改失败:".mysql_error());
			?>
            <p>修改成功!</p>
            <?php
			
		}
	}
?>