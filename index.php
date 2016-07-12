<?php
header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();
$x=
// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "http://www.u-movie.com.tw/page.php?ver=tw&page_type=series&portal=cinema&portal=cinema&ver=tw");
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
$entries = $xpath->query("//*[@id='page_wrapper']/section/div/div/div[1]/ul/li");


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
<title>UniversalCinema-HOME</title>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/style.css">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
<link href='http://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- start plugins -->
<script type="text/javascript" src="js/jquery.min.js"></script>

<!----font-Awesome----->
   	<link rel="stylesheet" href="fonts/css/font-awesome.min.css">
<!----font-Awesome----->
</head>
<body>
	<script type="text/javascript" src="js/jssor.slider.min.js"></script>
	<script>
        jssor_1_slider_init = function() {
            
            var jssor_1_options = {
              $AutoPlay: true,
              $AutoPlaySteps: 3,
              $SlideDuration: 150,
               $SlideWidth:300 ,
              $SlideSpacing: 3,
              $Cols: 3,
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $Steps: 3
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$,
                $SpacingX: 1,
                $SpacingY: 1
              }
            };
            
            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
            
            //responsive code begin
            //you can remove responsive code if you don't want the slider scales while window resizing
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 809);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            //responsive code end
        };
    </script>
    <style>
        
        /* jssor slider bullet navigator skin 03 css */
        /*
        .jssorb03 div           (normal)
        .jssorb03 div:hover     (normal mouseover)
        .jssorb03 .av           (active)
        .jssorb03 .av:hover     (active mouseover)
        .jssorb03 .dn           (mousedown)
        */
        .jssorb03 {
            position: absolute;
        }
        .jssorb03 div, .jssorb03 div:hover, .jssorb03 .av {
            position: absolute;
            /* size of bullet elment */
            width: 21px;
            height: 21px;
            text-align: center;
            line-height: 21px;
            color: white;
            font-size: 12px;
            background: url('images/b03.png') no-repeat;
            overflow: hidden;
            cursor: pointer;
        }
        .jssorb03 div { background-position: -5px -4px; }
        .jssorb03 div:hover, .jssorb03 .av:hover { background-position: -35px -4px; }
        .jssorb03 .av { background-position: -65px -4px; }
        .jssorb03 .dn, .jssorb03 .dn:hover { background-position: -95px -4px; }

        /* jssor slider arrow navigator skin 03 css */
        /*
        .jssora03l                  (normal)
        .jssora03r                  (normal)
        .jssora03l:hover            (normal mouseover)
        .jssora03r:hover            (normal mouseover)
        .jssora03l.jssora03ldn      (mousedown)
        .jssora03r.jssora03rdn      (mousedown)
        */
        .jssora03l, .jssora03r {
            display: block;
            position: absolute;
            /* size of arrow element */
            width: 55px;
            height: 55px;
            cursor: pointer;
           background: url('images/a03.png') no-repeat;
          
            overflow: hidden;
        }
        .jssora03l { background-position: -3px -33px; }
        .jssora03r { background-position: -63px -33px; }
        .jssora03l:hover { background-position: -123px -33px; }
        .jssora03r:hover { background-position: -183px -33px; }
        .jssora03l.jssora03ldn { background-position: -243px -33px; }
        .jssora03r.jssora03rdn { background-position: -303px -33px; }
    </style>
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
			    <li class="page-scroll"><a href="#about">關於影城</a></li>
				<li class="page-scroll"><a href="#contact">聯絡環球</a></li>
			</ul>
			<a href="#" id="pull"><img src="images/nav-icon.png" title="menu" /></a>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>
</div>
<div class="slider_bg"><!-- start slider -->
<div class="container">
		<div class="row slider">
		<div class="wmuSlider example1"><!-- start wmuSlider example1 -->
			   <div class="kl-title-block clearfix text-left tbk-symbol-- tbk-icon-pos--after-title pbottom-20">
			   	<div><p><br></p><p><br></p></div>
                   	<h2 class="style">熱映中</h2>
                   	<div><p><br></p><p><br></p><p><br></p></div>
				</div>
			   <div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; width: 900px; height: 350px; overflow: hidden; visibility: hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
            <div style="position:absolute;display:block;background:url('imas/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
        </div>
        	
        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 900px; height: 350px; overflow: hidden;">
            <?php foreach ($entries as $entry) 
						{
						    $title = $xpath->query("./div[1]/span/a/img/@src", $entry);
						       //echo  $title->item(0)->nodeValue . "<br>";
						       
						?>
        
        
            <div style="height:150px;">
                <?php  echo "<img src= '". $title->item(0)->nodeValue . "'class='responsive' style='height:350px;'/>"; ?>
            </div>
            
            <a data-u="add" href="http://www.jssor.com" style="display:none"></a>
                    <?php  }?> 
        </div>
        
        
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb03" style="bottom:10px;right:10px;">
            <!-- bullet navigator item prototype -->
            <div data-u="prototype" style="width:21px;height:21px;">
                <div data-u="numbertemplate"></div>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <span data-u="arrowleft" class="jssora03l" style="top:0px;left:8px;width:55px;height:55px;" data-autocenter="2"></span>
        <span data-u="arrowright" class="jssora03r" style="top:0px;right:8px;width:55px;height:55px;" data-autocenter="2"></span>
    </div>
                
			<script src="js/jquery.wmuSlider.js"></script> 
		     <script>
				 $('.example1').wmuSlider();         
			</script>
        </div><!-- end wmuSlider example1 -->
        <div class="clearfix"></div>
      </div>
</div>
</div>

 <script>
        jssor_1_slider_init();
    </script>

<div><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p><p><br></p></div>
<div class="main_bg"  id="about"><!-- start about us -->
<div >
	<div class="row about">
		<!--<div class="col-md-3 about_img">-->
		<!--	<img src="images/cinema.jpg" alt="" class="responsive"/>-->
		<!--</div>-->
		<div class="col-md-12 about_text">
			<h3>我們在哪?</h3>
					<h4>高雄市苓雅區大順三路108號 <br>07-722-0066</h4>
			
			<div >
			<iframe width="600" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJ3bN-Wb8EbjQRsbYBUxnfI-k&key=AIzaSyABzEc8UloW9JiNeR6F9n70iR0p818dCIs" allowfullscreen></iframe>
			</div>
		</div>
		<div class="col-md-9 about_text">
			<h3>票價資訊</h3>
			<div class="pricing-container">
		<div class="pricing-switcher">
			<p class="fieldset">
				<input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
				<label for="monthly-1">2D</label>
				<input type="radio" name="duration-1" value="yearly" id="yearly-1">
				<label for="yearly-1">3D</label>
				<span class="switch"></span>
			</p>
		</div>
		<ul class="pricing-list bounce-invert">
			<li>
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2>全票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">230</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li>*一般成人票價(早午夜場除外)</li>
							</ul>
						</div>
						
					</li>
					<li data-type="yearly" class="is-hidden">
						<header class="pricing-header">
							<h2>全票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">280</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li>*一般成人票價(早午夜場除外)</li>
							</ul>
						</div>
						
					</li>
				</ul>
			</li>
			<li class="exclusive">
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2>優待票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">210</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li>*學生出示學生證、軍警相關證明文件<br>
									*年滿12歲以上之孩童</li>
							</ul>
						</div>
						
					</li>
					<li data-type="yearly" class="is-hidden">
						<header class="pricing-header">
							<h2>優待票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">260</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
							<li>*學生出示學生證、軍警相關證明文件<br>
									*年滿12歲以上之孩童</li>
							</ul>
						</div>
						
					</li>
				</ul>
			</li>
			<li>
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2>日月光票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">200</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li>*中午12點(含)前及晚間12點(含)後場次可享優惠票價</li>
							</ul>
						</div>
						</li>
					<li data-type="yearly" class="is-hidden">
						<header class="pricing-header">
							<h2>日月光票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">240</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li>*中午12點(含)前及晚間12點(含)後場次可享優惠票價</li>
							</ul>
						</div>
						
					</li>
				</ul>
			</li>
			</li>
			<li class="exclusive">
				<ul class="pricing-wrapper">
					<li data-type="monthly" class="is-visible">
						<header class="pricing-header">
							<h2>愛 心 票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">110</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li>*65歲以上人士(憑身份證件)<br>
								*身心障礙人士與陪同者限一名(憑殘障手冊)</li>
							</ul>
						</div>
						
					</li>
					<li data-type="yearly" class="is-hidden">
						<header class="pricing-header">
							<h2>愛 心 票</h2>
							<div class="price">
								<span class="currency">$</span>
								<span class="value">140</span>
								<span class="duration">tw</span>
							</div>
						</header>
						<div class="pricing-body">
							<ul class="pricing-features">
								<li>*65歲以上人士(憑身份證件)<br>
								*身心障礙人士與陪同者限一名(憑殘障手冊)</li>
							</ul>
						</div>
						
					</li>
				</ul>
			</li>
			
		</ul>
	</div>
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js'></script>

        <script src="js/index.js"></script>
			
			<div >
			
			</div>
		</div>
	</div>
</div>
</div>
<div class="footer_bg" id="contact"><!-- start footer -->
<div class="container">
	<div class="row footer">
		<div class="col-md-8 contact_left">
			<h3>聯絡我們</h3>
			<p>請填寫表格</h4>
			<form method="post" action="contact-post.html">
				<input type="text" value="Name " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
				<input type="text" value="Email " onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
				<input type="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}">
				<textarea onfocus="if(this.value == 'Your Message here....') this.value='';" onblur="if(this.value == '') this.value='Your Message here....;" >Your Message here....</textarea>
				<span class="pull-right"><input type="submit" value="submit us"></span>
			</form>
		</div>
		<div class="col-md-4  contact_right">
		
		</div>		
	</div>
</div>
</div>
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