<?php
include 'db.php';
session_start();
$ann_id = $_POST['ann_id'];
$reminder_id = $ann_id;
$username = $_SESSION['username'];
$query = "insert into `reminder` (reminder_id,username) values ($reminder_id,'$username')";
mysql_query($query) or die(mysql_error());
header("location: ../stupage.php");
?>