<?php
include 'db.php';
$username = $_POST['username'];
$currentpassword = $_POST['currentpassword'];
$newpassword = $_POST['newpassword'];
$confirmpassword = $_POST['confirmpassword'];
$query = "select * from users where username='$username' and password='$currentpassword'";
$qans = mysql_query($query) or die(mysql_error());
if(mysql_num_rows($qans))
{
	if($newpassword === $confirmpassword)
	{
		mysql_query("update users set password='$newpassword' where username='$username'") or die(mysql_error());
		header("location:../changepassword.php?msg=success");
	}
	else
	{
		header("location:../changepassword.php?msg=nomatch");
	}
}
else
{
	header("location:../changepassword.php?msg=invalid");
}
?>