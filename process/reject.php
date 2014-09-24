<?php
include 'db.php';
session_start();
$status = "not approved";
$ann_id = $_POST['ann_id'];
$query = "update announcements set status='$status' where ann_id=$ann_id";
mysql_query($query) or die(mysql_error());
header("location: ../fcpage.php");
?>