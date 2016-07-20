<?php
require ("config.php");


$commandText = <<<SqlQuery
select id, name, photo,time1,time2,content,
  (select count(*) from singlepage where id = singlepage.id) 
  from singlepage
SqlQuery;

$result = mysql_query ( $commandText, $link );

header("content-type: text/html; charset=utf-8");

// 1. 初始設定
$ch = curl_init();
$x=
// 2. 設定 / 調整參數
curl_setopt($ch, CURLOPT_URL, "http://www.u-movie.com.tw/page.php?ver=tw&page_type=movie&selProgram=9100007172&id=2258&portal=cinema#plot");
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
$entries = $xpath->query("/html/body");

$getdate= date("Y-m-d");
$lastdata = mysql_query ("SELECT updatetime FROM singlepage ORDER BY updatetime  desc limit 1",$link);
$showdate =mysql_fetch_assoc($lastdata);


if($getdate== $showdate['updatetime']){
		$sql= "DELETE from singlepage WHERE updatetime !='$getdate'";
		$insert = mysql_query ( $sql, $link );
 }else{
 foreach ($entries as $entry) {
	 
   $title1 = $xpath->query("./section/div/div/div/div/div[1]", $entry)->item(0)->nodeValue;
   $title2 = $xpath->query("./section/div/div/div/div/div[3]/div/div/div/div/div/h4", $entry)->item(0)->nodeValue;
   $title3 = $xpath->query("./section/div/div/div/div/div[3]/div/ul/li/div", $entry)->item(0)->nodeValue;
   $title4 = $xpath->query("./section/div/div/div/div", $entry)->item(0)->nodeValue;
   $title5 = $xpath->query("//*[@id='page_header']/div[2]/div[1]", $entry)->item(0)->nodeValue;
   
   $sql= "INSERT INTO singlepage (name,photo,time1,time2,content,updatetime) VALUES ('$title1', '$title5','$title2', '$title3','$title4','$getdate')";
   $insert = mysql_query ( $sql, $link );
		
 }
				
 }




?>  