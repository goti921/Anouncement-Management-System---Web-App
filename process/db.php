<?php
$db_user = "root";
$db_pass = "";
$db_server = "localhost";
$db_name = "ams";
$con = mysql_connect($db_server,$db_user,$db_pass) or die(mysql_error());
mysql_select_db($db_name,$con);
?>