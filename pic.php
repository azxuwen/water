<?php
	require("config.php");
	$str = $_SERVER['REQUEST_URI'];
	$place = strrpos($str, "=");//  = 位置
	$str_place = substr($str, $place+1);
	$id=$str_place;  //现在获得$id
//	echo $id;   //作为id的值
	//echo strlen($id)."<p />";
	
	//接下来要获得$type
	$str1 = $_SERVER['REQUEST_URI'];
	//echo strpos($str1, "=")."<p />";
	$type_place = substr($str1, -8, 2);
	//echo $type_place."<p />";
	$place = strrpos($type_place, "=");//  = 位置
	$str_place = substr($type_place, $place+1);
//	echo $str_place; //作为type的值 

	require_once("config.php");  //连接数据库
		$abtain_pic = "SELECT * FROM `img` WHERE id=$id";  //sql语句
		$result_pic = mysql_query($abtain_pic, $conn) or die("获取图片失败:".mysql_error());
		$arr = mysql_fetch_array($result_pic);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  echo $arr['add']; ?></title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<link rel="stylesheet" type="text/css" href="css/slickmenu.css"/>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.jslickmenu.js"></script>
<script type="text/javascript" src="js/script.js"></script>

	<style type="text/css">
		#place{
			position:relative;
			left:800px;
			top:500px;
		}
		.place{
			position:relative;
			margin:0 auto;
			top:350px;
		}

	</style>
</head>

<body>
	<?php  require("header.php");?>


 <div id="menu">
    <ul>
    
    <?php
			
			
				echo "<li><a href=#><img src=".$arr['img']." width=400px height=400px alt=".$arr['add']."></a></li>";
			
	?>
    </ul>
  		<div id="place">
        	<h4>分享至:　　<a href="#">QQ</a>　  <a href="#">人人网</a>　　<a href="#">微博</a></h4>
        </div> 
  </div>
  
</div>
<div class="place">
	<?php  require("footer.php");?>
</div>
 
	
</body>
</html>