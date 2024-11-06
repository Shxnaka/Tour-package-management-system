<?php
session_start();
unset($_SESSION['customerid']);
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
date_default_timezone_set("Asia/Calcutta");
$dttim = date("Y-m-d H:i:s");
include("databaseconnection.php");
$sql = "INSERT INTO customer(customer_name,email_id,mobile_no,note,status) VALUES('$_POST[customer_name]','$_POST[email_id]','$_POST[mobile_no]','$_POST[note]','Waiting List')";
$qsql= mysqli_query($con,$sql);
$_SESSION['customerid'] = mysqli_insert_id($con);
echo $sqlcountchat = "SELECT count(*) FROM customer WHERE status='Waiting List' AND customer_id<='$_SESSION[customerid]'";
$qsqlcountchat= mysqli_query($con,$sqlcountchat);
mysqli_error($con);
$rscountchat = mysqli_fetch_array($qsqlcountchat);
$countno = $rscountchat[0];
$message= "<label style='color: blue;'>Please wait for the next available agent.</label> <br> <label style='color: red;'>You are currently number "  . $countno . " in the queue...</label>";
$message =  mysqli_real_escape_string($con,$message);
$sql = "INSERT INTO message(sender_id,receiver_id,message_date_time,message,status,product_id) VALUES('0','$_SESSION[customerid]','$dttim','$message','Employee','$_SESSION[customerid]')";
$qsql= mysqli_query($con,$sql);
echo mysqli_error($con);
?>