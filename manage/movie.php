<?php
 session_start();
require ("../php/config.php");
$commandText = <<<SqlQuery
select id, name, enname, picture,updatetime,updatetype,
  (select count(*) from movies where id = movies.id) 
  from movies
SqlQuery;
$lastresult = mysql_query ( $commandText, $link );


if (!isset($_SESSION["username"])){
//   	header("location:login.php");   
//   	exit();
  }


 
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/button.css">
        <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
    </head>
    <body>
        
        <div class="table-title"><h3>Manage Only</h3>  </div>
        
         <div class="col-md-12 ">
        <a href="message.php"><button class ="bluebutton"type="button" name="logout">Message</button></a>
        <a href="movie.php">	<button class ="bluebutton"type="button" >Movie</button></a>
        <a href="movietimes.php">	<button class ="bluebutton"type="button" >MovieTimes</button></a>
        </div>
        
        <div class="col-md-12 ">
            
			<?php include '../manage/addmovie.php';?>
			</div >
       
        
        <table class="table table-inverse">
              
            <table class="table-fill">
            <thead>
            <tr>
            <th class="text-left">#ID</th>
            <th class="text-left">picture</th>
            <th class="text-left">Name</th>
            <th class="text-left">English</th>
            <th class="text-left">Updatetime</th>
            <th class="text-left">Updatetype</th>
             <th class="text-left">Setting</th>
            
            </tr>
            </thead>
            <?php   while($row= mysql_fetch_assoc($lastresult)){
            $user_id=$row['id'];
            ?>
            <tbody class="table-hover">
            <tr>
            <td class="text-left" name="id"><?php echo $user_id ?></td>
            
            <td class="text-left"><?php echo "<img src= '". $row['picture'] . "' style='height:200px;'/>" ?></td>
            <td class="text-left"><?php echo $row['name'] ?></td>
             <td class="text-left"><?php echo $row['enname'] ?></td>
             <td class="text-left"><?php echo $row['updatetime'] ?></td>
             <td class="text-left"><?php echo $row['updatetype'] ?></td>
            <td class="text-left"> <a href="delmovie.php?del=<?php echo $user_id ?>"><button class="delbutton" >Delete</button></a></td>
            </tr>
            
            </tbody>
            <?php }?>
            </table>
            
			<div class="col-md-12 ">
            <span class="pull-right">
                <a href="logout.php"><button class ="allbutton"type="button" name="logout">Log out</button></a>
                <a href="../index.php">	<button class ="allbutton"type="button" >Home</button></a>
            </span>
            </div >

  
</table>
    </body>
</html>