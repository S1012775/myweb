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

<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Data Table</title>
           <link rel="stylesheet" href="my web/css/style.css">
  </head>

  <body>

    <html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Table Style</title>
	
</head>

<body>
<div class="table-title">
</div>
<table class="table-fill">
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
    </body>

  </body>
</html>
