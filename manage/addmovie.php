<?php
addmovie();
sqlmovie();
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
        <div class="table-title"><h3>新增電影</h3></div>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label >EnglishName</label>
            <input type="text" class="form-control" name="enname" placeholder="EnglishName">
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
        <div class="table-title"><h3>修改電影</h3></div>
        <div class="form-group">
            <label >ID</label>
            <input type="text" class="form-control" name="modifyid" placeholder="ID">
        </div>
        <div class="form-group">
            <label >Name</label>
            <input type="text" class="form-control" name="modifyname" placeholder="Name">
        </div>
        <div class="form-group">
            <label >EnglishName</label>
            <input type="text" class="form-control" name="modifyenname" placeholder="EnglishName">
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