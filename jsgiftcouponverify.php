<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
$dt = date("Y-m-d");
include("databaseconnection.php");
if(isset($_POST['btngiftcoupon']))
{
$sqlgiftcoupon = "SELECT * FROM giftcoupon WHERE couponcode='$_POST[giftcoupon]' AND status='Active' AND expirydate>='$dt' AND customer_id='$_SESSION[customer_id]'";
$qsqlgiftcoupon = mysqli_query($con,$sqlgiftcoupon);
$rsgiftcoupon = mysqli_fetch_array($qsqlgiftcoupon);
if(mysqli_num_rows($qsqlgiftcoupon) == 0)
{
	$data['couponcode'] = 0;
	$data['expirydate'] = 0;
	$data['discount_percentage'] = 0;
	$data['max_limit'] = 0;
	$data['reason'] = 0;
	$data['status'] = 0;
}
else
{
	$data['couponcode'] = $rsgiftcoupon['couponcode'];
	$data['expirydate'] = $rsgiftcoupon['expirydate'];
	$data['discount_percentage'] = $rsgiftcoupon['discount_percentage'];
	$data['max_limit'] = $rsgiftcoupon['max_limit'];
	$data['reason'] = $rsgiftcoupon['reason'];
	$data['status'] = $rsgiftcoupon['status'];
}
echo json_encode(array($data));
}
?>