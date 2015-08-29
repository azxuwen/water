<html>
	<head>
    	<style type="text/css">
			#aa{
				font-weight:800;
			}
			.header{
				/*background-color:#FF0;*/
			}
			a{
				color:black;
			}
			a:hover{
				color:gray;
			}
		</style>
    </head>
    <body>
    	<div class="header">
      <!--  <?php $count_rand = mt_rand(1, 4);?>-->
      <!--因为这个网站有四种类型的图片，直接放到一起的话，感觉有点乱 ， 所以我决定 用生成随机数的方法， 随机跳到 访问者意想不到的页面-->
|    　    <a id="aa" href="index.php">首页</a>　|　
		<?php  echo "<a id=aa href='pic_view.php?type=".$count_rand."'>图片区</a>";?>　|　
        <a id="aa" href="more_new.php">美文区</a>　|　
        <a id="aa" href="news_view.php">最新资讯</a>　|　
        <a id="aa" href="aboutus.php">关于我们</a>　|　
        <a id="aa" href="javascript:window.external.addFavorite('http://localhost/Water/index.php', '水世界')">加入收藏</a>　|　
        </div>
    </body>
</html>