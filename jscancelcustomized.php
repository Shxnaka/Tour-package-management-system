<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
include("databaseconnection.php");
$sql ="UPDATE item SET status='Cancelled' WHERE item_id='$_POST[item_id]'";
$qsql = mysqli_query($con,$sql);
?>