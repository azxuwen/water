<?php
session_start();
	$str = $_SERVER['REQUEST_URI'];
	$place = strrpos($str, "=");
	$str_place = substr($str, $place+1);
	$id=$str_place;    //记录修改的文章id
	$temp = $id;
	
	require("config.php");

	if(isset($_SESSION['User'])){
	//将题目和内容显示出来 并可以编辑
	$update_blog = "SELECT * FROM `work` WHERE id=$id";
	$result_update_blog = mysql_query($update_blog, $conn);
	echo "<hr width=100%>";
	require("header.php");
		echo "<hr width-100%>";
	echo "<font color=red>当前管理员:".$_SESSION['User']."</font>";
	echo "<table align=center width=700px height=600px border=1>";
	echo "<tr><th><b>文章修改</b></th></tr>";
	echo "<form action=update_essay.php method=POST>";
	while(@$arr = mysql_fetch_array($result_update_blog)){
		//echo "<tr><td><input type=hidden name=hidden value=$id></td></tr>";//尝试通过hidden 将$id传送到条件那里
		//貌似行不通
		//还是通过表单将$id  传送过去吧
		//事实上 行得通   原来hidden 就是这种用途啊 现在知道了
		echo "<tr><td><input type=hidden name=uid value=$id ></td></tr>";
		echo "<tr><td align=center><textarea name=update_subject cols=100 rows=4>".$arr['title']."</textarea></td></tr>";
		echo "<tr><td align=center><textarea name=update_body cols=100 rows=18>".$arr['content']."</textarea></td></tr>";
		echo "<tr><td align=right><textarea name=update_dateposted cols=100 rows=1>".$arr['time']."</textarea></td>";
		echo "</tr>";
		echo "<tr><td align=right><input type=submit name=submit_update value=提交修改></td></tr>";
	}
	echo "</form>";
	echo "</table>";
	}
	else{
		echo "<font color=red>请不要擅自进入后台!</font>";
	}

?>	
<?php
	//将修改的数据传送到数据库中
	if(@$_POST['submit_update']!=""){
		$add_update_blog = "UPDATE `work` SET title='$_POST[update_subject]',content='$_POST[update_body]',  time=now() WHERE id='$_POST[uid]'";
		mysql_query($add_update_blog, $conn) or die("修改失败:".mysql_error());
		?>
			<html>
            	<meta http-equiv="refresh" content="1;more_new.php">
            </html>
		<?php
	}
?>