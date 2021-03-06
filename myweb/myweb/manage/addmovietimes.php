<?php
require ("../php/config.php");

$commandText = <<<SqlQuery
select id, name, time,picture,filmtime,updatetime,updatetype,
  (select count(*) from movietimes where id = movietimes.id) 
  from movietimes
SqlQuery;
$result = mysql_query ( $commandText, $link );
if (isset($_POST["insertmovie"])){
$name=$_POST['name'];
$time=$_POST['time'];
$filmtime=$_POST['filmtime'];
$picture=$_POST['picture'];
$updatetime=$_POST['updatetime'];
if($_POST['name']!="" && $_POST['time']!=""&& $_POST['filmtime']!=""&& $_POST['picture']!=""&& $_POST['updatetime']!=""){
    
mysql_query("insert into movietimes (name, time,filmtime, picture,updatetime,updatetype)value('$name','$time','$filmtime','$picture','$updatetime','手動更新')",$link);
echo "<script>alert('資料送出');</script>";
}
 else {
 	echo "<script>alert('不可有空白');</script>";
 		}
}

if (isset($_POST["modifymovie"])){
$modifyid=$_POST['modifyid'];
$modifyname=$_POST['modifyname'];
$modifytime=$_POST['modifytime'];
$modifyfilmtime=$_POST['modifyfilmtime'];
$modifypicture=$_POST['modifypicture'];
$modifyupdatetime=$_POST['modifyupdatetime'];
if($_POST['modifyid']!="" ){
   mysql_query("UPDATE movietimes SET name='$modifyname' , time='$modifytime',filmtime='$modifyfilmtime' ,picture='$modifypicture', updatetime='$modifyupdatetime' , updatetype='已修改' WHERE id='$modifyid' ",$link);
echo "<script>alert('資料送出');</script>";
}
 else {
 	echo "<script>alert('ID編號不可空白');</script>";
 		}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>InsertMovie</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
    .button {
    background-color:  #333333;
    border: none;
    color: white;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    }
</style>
</head>
<body>
<div class="bs-example col-md-5 ">
    <form method="post">
        <div class="table-title"><h3>新增電影時刻</h3></div>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label >Time</label>
            <input type="text" class="form-control" name="time" placeholder="time">
        </div>
        <div class="form-group">
            <label >Filmtime</label>
            <input type="text" class="form-control" name="filmtime" placeholder="filmtime">
        </div>
        <div class="form-group">
            <label>圖片網址:</label>
        <input type="text" class="form-control" name="picture" placeholder="picture">
        
         </div>
         <div class="form-group">
            <label>上傳日期:</label><br />
            <input type="date" name="updatetime";>
        </div>
        <input type="submit" class="button" name="insertmovie"value="新增">
    </form>
</div>

<div class="bs-example col-md-5 ">
    <form method="post">
        <div class="table-title"><h3>修改電影時刻表</h3></div>
        <div class="form-group">
            <label >ID</label>
            <input type="text" class="form-control" name="modifyid" placeholder="ID">
        </div>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="modifyname" placeholder="Name">
        </div>
        <div class="form-group">
            <label >Time</label>
            <input type="text" class="form-control" name="modifytime" placeholder="Time">
        </div>
        <div class="form-group">
            <label >Filmtime</label>
            <input type="text" class="form-control" name="modifyfimtime" placeholder="Filmtime">
        </div>
        <div class="form-group">
            <label>圖片網址:</label>
        <input type="text" class="form-control" name="modifypicture" placeholder="picture">
        
         </div>
         <div class="form-group">
            <label>修改日期:</label><br />
            <input type="date" name="modifyupdatetime";>
        </div>
        <input type="submit" class="button" name="modifymovie"value="修改">
    </form>
</div>

</body>
</html>                                		