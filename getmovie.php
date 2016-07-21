
<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 500px;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php

require ("../myweb/php/config.php");

$result = mysql_query ( "set names utf8", $link );
$q=$_GET["q"];
$sql="SELECT * FROM movietimes WHERE id = '".$q."'";
$result = mysql_query($sql,$link);

echo "<table>
<tr>
<th>電影名稱</th>
<th>電影時間 </th>
</tr>";

// if($result === FALSE) { 
//     die(mysql_error()); // TODO: better error handling
// }

while($row = mysql_fetch_array($result)) {
    $out=$row['time'];
	$output=explode("其他戲院",$out);
    echo "<td>" . $row['name'] ."<br>"."<img src= '". $row['picture'] . "' style='height:200px;'/>". "</td>";
    echo "<td>" . $output[0] .  $row['filmtime'] . "</td>";
    
    
}
echo "</table>";
mysql_close($link);
?>
</body>
</html>



