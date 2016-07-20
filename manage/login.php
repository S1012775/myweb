<?php
session_start();
require ("../php/config.php");


if (isset($_POST['username']) and isset($_POST['password'])){
$username = $_POST['username'];
$password = $_POST['password'];
$query = "SELECT * FROM `management` WHERE username='$username' and password='$password'";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
if ($count == 1){
$_SESSION['username'] = $username;
}else{
  $wrong="Wrong username or password!!";
  }
}
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
header("Location: message.php");

}else{

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

    <form class="form" method="post" action="#">

      <p class="field">
        <input type="text" name="username" placeholder="Username" required/>
        <i class="fa fa-user"></i>
      </p>

      <p class="field">
        <input type="password" name="password" placeholder="Password" required/>
        <i class="fa fa-lock"></i>
      </p>

      <p class="submit"><input type="submit" name="sent" value="Login"></p>
        <p><?php echo $wrong?></p>

    </form>
  </div> <!--/ Login-->

<div class="copyright">
    <p>Copyright &copy; 2014. Created by <a href="http://febbygunawan.com" target="_blank">Febby Gunawan</a></p>
    
    
    
    
    
  </body>
</html>
