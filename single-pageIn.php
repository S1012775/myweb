<?php
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
$entries = $xpath->query("/html/body/section/div/div/div/div");

// /html/body/section/div/div/div/div
///html/body/section/div/div/div/div/div[4]/div/div[1]/ul
?>  