<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
include("databaseconnection.php");
$dttime = date("Y-m-d h:i:s");
if($_POST['custtype'] == "Staff")
{	
		$sql = "UPDATE message SET  user_id='$_SESSION[staffid]' WHERE message_id='$_POST[message_id]'";
		$qsql = mysqli_query($con,$sql);
	$textmsg = mysqli_real_escape_string($con,$_POST['message']);
		$sql = "INSERT INTO message_reply(message_id,user_id,message_reply_text,date_time,msg_type) VALUES('$_POST[message_id]','$_SESSION[staffid]','$textmsg','$dttime','$_POST[custtype]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
}
?>