<?php  
require ("../php/config.php");
session_start();
$delete_id=$_GET['del']; 
$sql = "delete from message where id='$delete_id'";
$result = mysql_query ( $sql, $link );

if($result)  
{  
    header("location:message.php");
}  
  
?>  