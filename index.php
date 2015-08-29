<?php
session_start();
	require("config.php");  //连接数据库

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>水的魅力</title>
	<style type="text/css">
		body{
			margin:0 auto;
			width:1020px;
			height:1000px;
			/*border:1px solid gray;*/
		}

		.banner{
			margin:0px auto;
			width:1020px;
			height:230px;	
		}
		.logo{
			position:relative;
			left:-16px;
			top:-10px;
			float:left;
		}
		input{
			position:relative;
			top:-90px;
			left:612px;
		}
		
		a:link, a:visited ,a:active{
			color:black;
			text-decoration: none;
		}
		
		.aa:hover{
			background-color:#FF0;
			color:black;   
		}  		
		img{
			margin-left:16px;
			margin-top:10px;
			border:none;
		}
		#div1{
			width:340px;
			height:400px;
			float:left;
		}
		#a_type{
			margin-left:175px;
		}
		hr{
			size:10px;
			color:black;
		}
		#img{
			position:relative;
			left:370px;
			top:-87px;
		}
		#foot{
			position:relative;
			top:750px;
		}

		
	</style>
</head>
<body>
	<!--原banner
	<div class="banner">	
    	<div class="logo">
        	<img usemap="#banner" src="picture/banner.jpg"  width="1020px" height="100px">
            <map name="banner">
            	<area shape="rect" coords="530px, 0px, 590px, 40px" href="#" />
            	<area shape="rect" coords="765px, 0px, 882px, 40px" href="#" />
                <area shape="rect" coords="885px, 0px, 1120px, 40px" target="_blank" href="heart/aboutus.php" />
            </map>
            <input type="text" name="#">
            
        </div>

    </div>-->
    <!--每页的导航-->
    <div class="banner">
    	<font face="黑体" size="7">欢迎光临水世界网</font>
        <?php  if(isset($_SESSION['User'])) echo "　　　<font color=red>当前管理登录:".$_SESSION['User']."</font>        <font color=red><a href=logout.php>退出</a></font>";
			echo "<p>";
		?>
        <!--网站介绍-->
        <table width="900" height="10" border="0">
          <center><marquee scrollamount="7" valign="middle" align="center" onmouseover="stop()" onmouseout="start()" behavior="sroll" direction="top" height=100 bscrollamount="1" scrolldely="1000"><strong>首先欢迎光临，本网站是为爱水爱生活的您专门打造，这里拥有水的一切，不论是漂亮的美图，优美的文章，还是最新鲜的新闻资讯，你可以在本站的任何位置发现水的魅力！</strong></marquee></center>
		</table>
        
        <hr width="100%">
    	<?php  require("header.php");?>
        <hr width="100%">
    </div>
    
    <!--下面是各个图片展示-->
    <a class="aa">
   		 <div class="aa" id="div1">
    		 <span><font face="黑体">　水与人</font><a id="a_type" href="pic_view.php?id=1"><img src="picture/1364721824529_20080524151801310.gif"></a></span><br>
      	     
             	<?php
					//获取数据库图片
					$abtion_people = "SELECT * FROM `img` WHERE type=1 ORDER BY time DESC LIMIT 1";
					$result_people=mysql_query($abtion_people, $conn) or die("获取图片失败:".mysql_error());
					if(mysql_num_rows($result_people)==0){
						echo "<font color=red>没有图片，去<a href='post_pic.php'>上传</a>吧。</font>";
					}
					else{
					$arr = mysql_fetch_array($result_people);
					echo "<a href=#><img src=".$arr['img']." width=301 height=300></a><br /><p>";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>".$arr['add']."</b>";
					}
                ?> 
              
   		 </div>
    </a>
    
     <a class="aa">
   		 <div class="aa" id="div1">
    		 <span><font face="黑体">　水与动物</font><a id="a_type" href="pic_view.php?id=2"><img src="picture/1364721824529_20080524151801310.gif"></a></span><br>
             	<?php
					//获取数据库图片
					$abtion_people = "SELECT * FROM `img` WHERE type=2 ORDER BY time DESC LIMIT 1";
					$result_people=mysql_query($abtion_people, $conn) or die("获取图片失败:".mysql_error());
					if(mysql_num_rows($result_people)==0){
						echo "<font color=red>没有图片, 去<a href='post_pic.php'>上传</a>吧。</font>";
					}
					else{
					$arr = mysql_fetch_array($result_people);
					//echo $arr['img'];
					echo "<a href=#><img src=".$arr['img']." width=301 height=300></a><p />";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>".$arr['add']."</b>";
					}
                ?>
   		 </div>
    </a>
    
    
    <a  class="aa">
   		 <div class="aa" id="div1">
    		 <span><font face="黑体" >美文展现</font><a id="a_type" href="more_new.php"><img src="picture/1364721824529_20080524151801310.gif"></a></span><br>
      	     <a href="#">
             	<?php
					//获取数据库中的文章
					$abtain_work = "SELECT work.title,work.id FROM `work` ORDER BY time DESC LIMIT 10";
					$result_work = mysql_query($abtain_work, $conn) or die("获取文章失败:". mysql_error());
					if(mysql_num_rows($result_work)==0){
						echo "No essay!";
					}
					else{
						echo "<table width=301 height=350 cellpadding=0 cellspacing=0>";
						while($arr_work = mysql_fetch_array($result_work)){
							
							echo "<tr height=10px><td><a href='essay_view.php?id=".$arr_work['id']."'><font face=宋体 size=3>".$arr_work['title']."</a></td></tr>";
							
						}
						echo "</table>";
					}
                ?>
             
             
             </a> 
   		 </div>
    </a>
    
   
    <a class="aa">
   		 <div class="aa" id="div1">
    		 <span><font face="黑体">　水与美景</font><a id="a_type" href="pic_view.php?id=3"><img src="picture/1364721824529_20080524151801310.gif"></a></span><br>
            	 <?php
					//获取数据库图片
					$abtion_people = "SELECT * FROM `img` WHERE type=3 ORDER BY time DESC LIMIT 1";
					$result_people=mysql_query($abtion_people, $conn) or die("获取图片失败:".mysql_error());
					if(mysql_num_rows($result_people)==0){
						echo "<font color=red>没有图片，去<a href='post_pic.php'>上传</a>吧。</font>";
					}
					else{
					$arr = mysql_fetch_array($result_people);
					//echo $arr['img'];
					echo "<a href=#><img src=".$arr['img']." width=301 height=300></a><p />";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>".$arr['add']."</b>";
					}
					
                ?>
   		 </div>
    </a>
    
    
    
    <a class="aa">
   		 <div class="aa" id="div1">
    		 <span><font face="黑体">水的灵魂</font><a id="a_type" href="pic_view.php?id=4"><img src="picture/1364721824529_20080524151801310.gif"></a></span><br>      	    
             	<?php
					//展示水的本身
					//获取数据库图片
					$abtion_people = "SELECT * FROM `img` WHERE type=4 ORDER BY time DESC LIMIT 1";
					$result_people=mysql_query($abtion_people, $conn) or die("获取图片失败:".mysql_error());
					if(mysql_num_rows($result_people)==0){
						echo "<font color=red>没有图片，去<a href='post_pic.php'>上传</a>吧。</font>";
					}
					else{
					$arr = mysql_fetch_array($result_people);
					//echo $arr['img'];
					echo "<a href=#><img src=".$arr['img']." width=301 height=300></a><p />";
					echo "&nbsp;&nbsp;&nbsp;&nbsp;<b>".$arr['add']."</b>";
					}
                ?> 
   		 </div>
    </a>
    
   
    <a  class="aa">
   		 <div class="aa" id="div1">
    		 <span><font face="黑体">水闻资讯</font><a id="a_type" href="news_view.php"><img src="picture/1364721824529_20080524151801310.gif"></a></span><br>
      	     <a href="#">
             	<?php
					//获取数据库中的新闻
					$abtain_work = "SELECT * FROM `news` ORDER BY time DESC LIMIT 10";
					$result_work = mysql_query($abtain_work, $conn) or die("获取新闻失败:". mysql_error());
					if(mysql_num_rows($result_work)==0){
						echo "No news!";
					}
					else{
						echo "<table width=301 height=350 cellpadding=0 cellspacing=0>";
						while($arr_work = mysql_fetch_array($result_work)){
							
							echo "<tr height=10px><td><a href=news.php?id=".$arr_work['id']."><font face=宋体 size=3>".$arr_work['title']."</font></a></td></tr>";
							
						}
						echo "</table>";
					}
                ?>
             </a> 
   		 </div>
      
    </a>
            
        
        
 	</div>

 

    <!--最下面的版权部分-->
    	
        	<?php require("footer.php");?>
       
</body>
</html>
