<?php  
session_start(); 
// unset($_SESSION["username"]);
// unset($_SESSION["password"]); 
session_destroy();
echo "<script>alert('You have cleaned session');</script>";

header("Location: ../index.php");
?>  