<?php
include 'db.php';
session_start();
$ann_id = $_POST['ann_id'];
$saved_id = $ann_id;
$username = $_SESSION['username'];
$query = "insert into `saved` (saved_id,username) values ($saved_id,'$username')";
mysql_query($query) or die(mysql_error());
header("location: ../stupage.php");
?>