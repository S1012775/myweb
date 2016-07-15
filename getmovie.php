
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
echo $_GET["q"];
require ("config.php");
header("content-type: text/html; charset=utf-8");
$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
$q=$_GET["q"];
$sql="SELECT * FROM movietimes WHERE id = '".$q."'";
$result = mysql_query($sql,$link);
echo "<table>
<tr>
<th>name</th>
<th>time</th>
</tr>";

if($result === FALSE) { 
    die(mysql_error()); // TODO: better error handling
}

while($row = mysql_fetch_array($result)) {
    
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['time'] . "</td>";
    
    
}
echo "</table>";
mysql_close($link);
?>
</body>
</html>



