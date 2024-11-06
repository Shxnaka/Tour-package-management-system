<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
include("databaseconnection.php");
$sql ="DELETE FROM chatbot WHERE received_message='$_POST[message_reply_text]'";
mysqli_query($con,$sql);
$sql ="INSERT INTO chatbot (received_message,response_message) values('$_POST[message_reply_text]','$_POST[response_message]')";
$qsql = mysqli_query($con,$sql);
echo 1;
?>