<?php
session_start();
	require("config.php");
	$str = $_SERVER['REQUEST_URI'];
	$place = strrpos($str, "=");
	$str_place = substr($str, $place+1);
	$id=$str_place;  //id为 1  代表 people 2 代表动物 3 代表风景  4 代表水本身
?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title><?php  if($id==1) echo "水与人的互动"; if($id==2) echo "水与动物的互动"; if($id==3) echo "水与大自然的契合";
if($id==4) echo "水的灵魂";?></title>


	<style type="text/css">
		body{
			width:1000px;
			margin:0 auto;
			width:1024px;
		}
		.aa{
			position:absolute;
			top:200px;
		}
		.pic{
			position:relative;
			left:300px;
		}
		a{
			text-decoration:none;
		}
	</style>

</head>
<body>

    </p>
	
    <hr width="100%">  <!--导航-->
	<?php  require("header.php");?>
    <hr width="100%">
	
	<h1><center>
	<?php 
		if($id==1){
			echo "水与人的互动"; 
		}
		if($id==2) {
			echo "水与动物的互动"; 
		}
		if($id==3) {
			echo "水与大自然的契合"; 
		}
		if($id==4) {
			echo "探寻水的灵魂";
		}
		
	?>
    </center></h1>
    <p align="right">
    <?php 
		if(isset($_SESSION['User'])){
			echo "<font color=red>当前管理员:".$_SESSION['User']."</font>";
		}
	?>

    <h4><p align="right"><a href="post_pic.php">上传你喜欢的图片</a></p></h4>



	<div class="pic">    
    <?php
			if($id==1){
				$type = 1;
			}
			if($id==2){
				$type = 2;
			}
			if($id==3){
				$type = 3;
			}
			if($id==4){
				$type = 4;
			}
		$abtain_pic = "SELECT * FROM `img` WHERE type=$id ORDER BY time DESC";
		$result_pic = mysql_query($abtain_pic, $conn);  //注意获取到的img  为图片路径
		if(mysql_num_rows($result_pic)==0){
			echo "NO pictures!";
		}
		else{
			echo "<table border=0 cellpadding=0 cellspacing=0>";
			while($arr = mysql_fetch_array($result_pic)){
			echo "<tr>";
			echo "<td><a href=pic.php?id=".$arr['id']."><img src=".$arr['img']." width=650px height=400px></a></td>";
			//管理员进行删除部分
			if(isset($_SESSION['User'])){
				echo "<td valign=top><a href=delete_pic.php?id=".$arr['id']."><font color=red>删除</font></a></td>";
			}
			
			echo "</tr>";
			}
			echo "</table>";
		}
		
    ?>
   </div>

  
<div class="aa">  

	<table border="1" width=200px height=400px cellpadding="0" cellspacing="0" >
		<tr><td>| 看看其他的 |</td></tr>
   	<?php  
		$id++;
		for($i=0; $i<3; $i++){
			if($id>4){
				$id = $id%4;
			}
			if($id==1){
				echo "<tr><td><a href=pic_view.php?type=".$id.">|　水与人类　|</a></td></tr>";
			}
			if($id==2){
				echo "<tr><td><a href=pic_view.php?type=".$id.">|　水与动物　|</a></td></tr>";
			}
			if($id==3){
				echo "<tr><td><a href=pic_view.php?type=".$id.">|　水与风景　|</a></td></tr>";
			}
			if($id==4){
				echo "<tr><td><a href=pic_view.php?type=".$id.">|　水的内在美　|</a></td></tr>";
			}
			$id++;
		}
	?>

	</table>
</div>
</body>
</html>
