<?php

//login
function login(){
    require ("../php/config.php");
    if(isset($_POST['login'])) {
$username = $_POST['username'];
$password = $_POST['password'];  
$result = mysql_query("SELECT * FROM `management` WHERE username='$username' and password='$password'");
$row  = mysql_fetch_array($result);
if(is_array($row)) {
$_SESSION["username"] = $row['username'];
$_SESSION["password"] = $row['password'];
} else {
$wrong = "Invalid Username or Password!";
}

}
if(isset($_SESSION["username"])) {

  header("Location:message.php");
}

}
?>