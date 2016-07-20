<?php

header("content-type: text/html; charset=utf-8");
$html = file_get_contents('http://www.u-movie.com.tw/page.php?ver=tw&page_type=movie&selProgram=9100007172&id=2258&portal=cinema#plot');
$dom = new DOMDocument();
@$dom->loadHTML($html);
// grab all the on the page
$xpath = new DOMXPath($dom);
$hrefs = $xpath->evaluate("/html/body/section/div/div/div");
for ($i = 0; $i < $hrefs->length; $i++) {
 $href = $hrefs->item($i);
 $url = $href->getAttribute('href');
 echo $url.'';
}

///html/body/section/div/div/div/div/div[4]/div/div[1]/ul
?>