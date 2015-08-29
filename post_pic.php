<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>上传图片</title>

	<style type="text/css">
		body{
			margin:0 auto;
			height:800px;
			width:1024px;
		}
		.place{
			width:600px;
			heigth:700px;
			position:relative;
			left:350px;
			top:100px;
		}
		a{
			color:black;
		}
	</style>
</head>

<body>

    <hr width="100%">
    <?php require("header.php");?>
    
    <hr width="100%">
    	<font face="宋体" size=6><center>图片上传</center></font>
    <div class="place" style="background-color:#FFF">
	<form action="post_pic.php" enctype="multipart/form-data" method="post">
    		<h3>图片分类</h3><select name="type" style="width:200px">
            	<option value="1">水与人类</option>
                <option value="2">水与动物</option>
                <option value="3">水与风景</option>
                <option value="4">水的灵魂</option>
            </select><p />
			<input type="file" name="filename" value="浏览" style="width:200px"><p/>
			<input type="hidden" name="max_file_size" value="200000">
            <h3>图片描述</h3><nobr><textarea name="add" cols="30" rows="5"></textarea><p />
			　　　　　　　<input type="submit" value="上传图片" name="submit"><p/>
	</form>
  
    </div>

</body>
</html>
<?php
if(@$_POST['submit']!=""){
	if($_POST['type']!="" && $_POST['add']!=""){
		if($_POST['type']==1){
			$uploaddir = 'picture/people';
		}
		if($_POST['type']==2){
			$uploaddir = 'picture/animal';
		}
		if($_POST['type']==3){
			$uploaddir = 'picture/view';
		}
		if($_POST['type']==4){
			$uploaddir = 'picture/water';
		}
		$type = $_POST['type'];
		$fileName = $uploaddir."/".$_FILES['filename']['name'];
		if(move_uploaded_file($_FILES['filename']['tmp_name'],  $fileName)){
			echo "上传成功!<p />";   //这样也就成功上传了图片  接下来就要将图片路径上传到数据库
		}
		//将图片的信息存入数据库
		require("config.php");
		$add_pic = "INSERT INTO `img` VALUES('', '$_POST[type]', '$fileName', '$_POST[add]', now())";
		mysql_query($add_pic, $conn) or die("添加到数据库失败:".mysql_error());
			echo "自动跳转到主页!";
				?>
            	<meta http-equiv="refresh" content="1; index.php">";
                <?php
            			
		}
	else{
		echo "信息不全!";
	}
}
	
?>
