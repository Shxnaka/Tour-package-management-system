<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
include("databaseconnection.php");
$dttime = date("Y-m-d h:i:s");
$sqlmessage = "SELECT * FROM message WHERE chatid='$_SESSION[chatid]' AND status='Active'";
$qsqlmessage = mysqli_query($con,$sqlmessage);
$rsmessage = mysqli_fetch_array($qsqlmessage);
$countmsg =mysqli_num_rows($qsqlmessage);
$msgid=$rsmessage[0];
$textmsg = mysqli_real_escape_string($con,$_POST['message']);
//AutoBot starts
$sqlchatbot = "SELECT * FROM chatbot WHERE received_message='" . $textmsg . "'";
$qsqlchatbot = mysqli_query($con,$sqlchatbot);
$rschatbot = mysqli_fetch_array($qsqlchatbot);
if(mysqli_num_rows($qsqlchatbot) >= 1)
{
	$sql = "INSERT INTO message_reply(message_id,user_id,message_reply_text,date_time,msg_type) VALUES('$msgid','$_SESSION[staffid]','$rschatbot[response_message]','$dttime','Autobot')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
}
//AutoBot ends
?>