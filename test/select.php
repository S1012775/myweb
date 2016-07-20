<?php
require ("config.php");
header("content-type: text/html; charset=utf-8");
$link = mysql_connect ( $dbhost, $dbuser, $dbpass ) or die ( mysql_error () );
$result = mysql_query ( "set names utf8", $link );
mysql_selectdb ( $dbname, $link );
$commandText = <<<SqlQuery
select id, name, time, 
  (select count(*) from movietimes where id = movietimes.id) 
  from movietimes 
SqlQuery;


$result = mysql_query($commandText,$link);

?>
<html>
<head>
    <meta charset="UTF-8">
<script src="selectuser.js"></script>
</head>
<body>

<form>
   
            <select name="users" onchange="showUser(this.value)">
              <option value="">請選擇電影</option>
              <option value=""><?php
                    while ($row = mysql_fetch_assoc($result)) {
                        
                          echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>' . "\n";
                     }?></option>
              
              </select>
            </form>
            <br>
            <div id="txtHint"><b></b></div>
</body>
</html>
