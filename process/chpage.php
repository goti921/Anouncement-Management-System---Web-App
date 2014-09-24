<?php
session_start();
include 'db.php';
$username = $_SESSION['username'];
$chapter = $_SESSION['chapter'];
$announcement = $_POST['announcement'];
$final = mysql_real_escape_string($announcement);
$date = date("Y-m-d H:i:s");
$query = "insert into `announcements`
          (posted_by,announcement,chapter,date) value
          ('$username','$final','$chapter','$date')";
$qans = mysql_query($query) or die(mysql_error());
header("location: ../chpage.php?msg=posted");
?>