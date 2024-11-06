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
if($_POST['custtype'] == "Customer")
{
	if($countmsg == 0)
	{
	$sql = "INSERT INTO message(chatid,cust_id,user_id,date_time,status) VALUES('$_SESSION[chatid]','$_SESSION[customer_id]','$_SESSION[staffid]','$dttime','Active')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);	
	$msgid = mysqli_insert_id($con);
	$countmsg =1;
	}
	$textmsg = mysqli_real_escape_string($con,$_POST['message']);
	$sql = "INSERT INTO message_reply(message_id,cust_id,user_id,message_reply_text,date_time,msg_type) VALUES('$msgid','$_SESSION[customer_id]','$_SESSION[staffid]','$textmsg','$dttime','$_POST[custtype]')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	//AutoBot starts
	$sqlchatbot = "SELECT * FROM chatbot WHERE received_message='" . $textmsg . "'";
	$qsqlchatbot = mysqli_query($con,$sqlchatbot);
	$rschatbot = mysqli_fetch_array($qsqlchatbot);
	if(mysqli_num_rows($qsqlchatbot) >= 1)
	{
		echo 1;
	}
	else
	{
		echo 0;
	}
	//AutoBot ends
}
?>