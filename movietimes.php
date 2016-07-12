<?php
header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();
// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "http://www.atmovies.com.tw/showtime/t07704/a07/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, 0);
// 3. 執行，取回 response 結果
$pageContent = curl_exec($ch);
// 4. 關閉與釋放資源
curl_close($ch);
$doc = new DOMDocument();
libxml_use_internal_errors(true);
$doc->loadHTML($pageContent);

$xpath = new DOMXPath($doc);
$entries = $xpath->query("//*[@id='theaterShowtimeTable']");
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
<title>UniversalCinema-movietimes</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="css/style.css">
<meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>
	<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();
			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	</script>
<!----font-Awesome----->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<body>
<div class="header_bg" id="home"><!-- start header -->
<div class="container">
	<div class="row header text-center specials">
		<div class="h_logo">
			<a href="index.html"><img src="images/logo.png" alt="" class="responsive"/></a>
		</div>
		<nav class="top-nav">
			<ul class="top-nav nav_list">
			<li><a href="movie.php">電影介紹</a></li>
				<li class="page-scroll"><a href="movietimes.php">場次查詢</a></li>
				<li class="logo page-scroll"><a title="hexa" href="index.php"><img src="images/logo.png" alt="" class="responsive"/></a></li>
			    <li class="page-scroll"><a href="index.php">關於影城</a></li>
				<li class="page-scroll"><a href="index.php">聯絡環球</a></li>
			</ul>
			<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="blog"><!-- start main -->
	<div class="container">
		<div class="main row">
			<div class="col-md-12 ">
				<div class="clearfix"><h5>場次時間表 <?php	echo  date("Y-m-d") . "<br>";?></h5></div>
				<h2 class="style">Movie Times</h2>
		<div >

<table >
<thead>
<tr>
				<?php foreach ($entries as $entry) 
					{
					     $title3 = $xpath->query("./li[2]/ul[1]/li[1]/a/img/@src", $entry);
					    $title1 = $xpath->query("./li[1]/a", $entry);
					    $title4 = $xpath->query("./li[2]/ul[1]/li[2]", $entry);
					    $title2 = $xpath->query("./li[2]/ul[2]", $entry);
				?>
				<th class="text-left"><?php echo  $title1->item(0)->nodeValue . "<br>";?></th>
				<th></th>
				
				</tr>
				</thead>
				<tbody class="table-hover">
				<tr>
				<td class="text-left"><?php echo "<img src= '". $title3->item(0)->nodeValue . "' style='height:200px;'/>"; ?></td>
				<td class="text-left"><?php echo  $title2->item(0)->nodeValue . "<br>";?>
				      <p><?php echo  $title4->item(0)->nodeValue . "<br>";?></p></td>
				</tr>
				<?php }?>
				</tbody>
				</table>	
						</div>
			
				<div class="news_letter"></div>
			</div>
			
		</div>
	</div>
</div><!-- end main -->

<div class="footer1_bg"><!-- start footer1 -->
	<div class="container">
		<div class="row  footer">
			<div class="copy text-center">
				<p class="link"><span>&#169; All rights reserved | Template by&nbsp;<a href="http://w3layouts.com/"> W3Layouts</a></span></p>
				<a href="#home" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"> </span></a>
			</div>
		</div>
		<script type="text/javascript">
				$(function() {
				  $('a[href*=#]:not([href=#])').click(function() {
				    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			
				      var target = $(this.hash);
				      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
				      if (target.length) {
				        $('html,body').animate({
				          scrollTop: target.offset().top
				        }, 1000);
				        return false;
				      }
				    }
				  });
				});
		</script>
		<!---- start-smoth-scrolling---->		
	</div>
</div>
</body>
</html>