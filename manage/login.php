<?php
session_start();
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


?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login form</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="../css/loginstyle.css" rel='stylesheet' type='text/css' />
    <link href="../css/style.scss" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../css/reset.css">
    <script src="../js/prefixfree.min.js"></script>
  </head>

  <body>
    <div class="login">
    <h1>Login</h1>

    <form class="form" method="post">

      <p class="field">
        <input type="text" name="username" placeholder="Username" required/>
        <i class="fa fa-user"></i>
      </p>

      <p class="field">
        <input type="password" name="password" placeholder="Password" required/>
        <i class="fa fa-lock"></i>
      </p>

      <p class="submit"><input type="submit" name="login" value="Login"></p>
        <p><?php echo $wrong?></p>

    </form>
  </div> <!--/ Login-->

<div class="copyright">
    <p>Copyright &copy; 2014. Created by <a href="http://febbygunawan.com" target="_blank">Febby Gunawan</a></p>
    
    
    
    
    
  </body>
</html>
