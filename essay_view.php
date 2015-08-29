<?php
session_start();
session_register('id_comm');
	require("config.php");  //连接数据库
	$str = $_SERVER['REQUEST_URI'];	
	$place = strrpos($str, "=");
	$str_place = substr($str, $place+1);
	$id=$str_place;
	$_SESSION['id_comm'] = $id;
	$abtain_news = "SELECT * FROM `work` WHERE id=$id";
	$result_news = mysql_query($abtain_news, $conn) or die("获取新闻失败:".mysql_error());
	
	$arr_news = mysql_fetch_array($result_news);

	
	
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>文章展示</title>
        <style type="text/css">
		body{
			
		}
			.new_essay{
				width:200px;
				height:100px;
				position:relative;
				left:850px;
				top:-670px;
			}
			a{
				color:black;
				font-family:黑体;
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
        <!--链接到发表文章-->
		<?php  
		if(isset($_SESSION['User'])){
		echo "<font color=red>当前管理员: ".$_SESSION['User']."</font>";
		}
		?>
        <h3><a href="new_essay.php">发表文章</a></h3>
        
		<font face="宋体" size=6 color=black><center><?php  echo $arr_news['title']; ?></center></font><p />
        <table border="1" cellpadding="0" cellspacing="0" align="center" width="500px">
     
            <tr><td colspan = 2><b><textarea cols="60px" rows="20px"><?php echo $arr_news['content']; ?></textarea></b></td></tr>
            <tr><td>评论列表</td><td align="right"><?php echo "<a href=comment.php?id=".$id.">我要评论</a>"?></td></tr>

            	<?php
					//获取指定文章的评论列表
					$abtain_comment = "SELECT * FROM `comments` WHERE id_work=$id";
					$result_comment = mysql_query($abtain_comment, $conn) or die("获取评论失败:".mysql_error());
					if(mysql_num_rows($result_comment)==0){
						echo "<tr><td colspan=2>No comments!</td></tr>";
					}
					else{
						$order=1;
						while($arr_comment = mysql_fetch_array($result_comment)){
							echo "<tr>";
							if(isset($_SESSION['User'])){
								echo "<td>";
							}
							else{
								echo "<td colspan=2>";
							}
							echo "".$order."楼　　　".$arr_comment['comment']."</td>";
							if(isset($_SESSION['User'])){
								echo "<td><a id=a_type href=edit_comment.php?id=".$arr_comment['id'].">编辑</a>　　　　<a id=a_type href=delete_comment.php?id=".$arr_comment['id'].">删除</a></td>";
							}
							$order+=1;
							echo "</tr>";
						}
					}
                ?>
                </textarea>

        </table>
        <table height=100px><tr><td></td></tr></table>
        <?php
	//加入版权
		require("footer.php");
?>
</body>
</html>
