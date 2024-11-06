<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
$dt = date("Y-m-d");
$tim = date("H:i:s");
include("databaseconnection.php");
if(isset($_POST['btncancellation']))
{
	$sql = "INSERT INTO payment(customer_id,card_holder,name,payment_date,payment_type,card_no,cvv_no,total_amt,status,transaction_type,payment_time) VALUES('$_SESSION[customer_id]','$_POST[card_holder]','$_POST[room_booking_id]','$dt','$_POST[payment_type]','$_POST[card_no]','$_POST[cvv_no]','$_POST[totcost]','Cancelled','Cancellation','$tim')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	echo $insid = mysqli_insert_id($con);

	$sql ="UPDATE payment SET status='Cancel' WHERE room_booking_id='$_POST[room_booking_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	
}
if(isset($_POST['btncabbooking']))
{
	$sql = "INSERT INTO payment(customer_id,card_holder,room_booking_id,cab_bookingid,payment_date,payment_type,card_no,cvv_no,exp_date,total_amt,status,transaction_type) VALUES('$_SESSION[customer_id]','$_POST[card_holder]','$_POST[room_booking_id]','$_POST[cal_bookingid]','$dt','$_POST[payment_type]','$_POST[card_no]','$_POST[cvv_no]','$_POST[exp_date]-01','$_POST[totcost]','Active','Cab Booking')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	echo $insid = mysqli_insert_id($con);
	$sql = "UPDATE cab_booking SET status='Active',payment_id='$insid' WHERE cal_bookingid='$_POST[cal_bookingid]' AND status='Pending'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
}
if(isset($_POST['btnfoodorder']))
{
	$paymentdetail  = serialize(array($_POST['card_holder'],$_POST['card_no'],$_POST['cvv_no'],$_POST['exp_date']));	
	$sql = "INSERT INTO payment(customer_id,card_holder,room_booking_id,food_order_id,payment_date,payment_type,card_no,cvv_no,exp_date,total_amt,status,name,mobileno,note,transaction_type) VALUES('$_SESSION[customer_id]','$_POST[card_holder]','$_POST[room_booking_id]','$_POST[room_booking_id]','$dt','$_POST[payment_type]','$_POST[card_no]','$_POST[cvv_no]','$_POST[exp_date]-01','$_POST[totcost]','Active','$_POST[name]','$_POST[contactnumber]','$_POST[note]','Food Order')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	echo $insid = mysqli_insert_id($con);
	$sql = "UPDATE food_order SET status='Active',payment_id='$insid' WHERE status='Pending' AND payment_id='0' AND customer_id='$_SESSION[customer_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
}
if(isset($_POST['btnhotelbooking']))
{
	$sql = "INSERT INTO room_booking(hotel_id,room_typeid,customer_id,no_ofadults,no_ofchildren,check_in,check_out,cost,status,checkintime,checkouttime) VALUES('$_POST[hotelid]','$_POST[room_type]','$_SESSION[customer_id]','$_POST[adults]','$_POST[children]','$_POST[checkin]','$_POST[checkout]','$_POST[cost]','Active','$_POST[checkintime]:00','$_POST[checkouttime]:00')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	$insid = mysqli_insert_id($con);	
	$paymentdetail  = serialize(array($_POST['card_holder'],$_POST['card_no'],$_POST['cvv_no'],$_POST['exp_date']));
	$discount_detail  = serialize(array($_POST['discount_couponcode'],$_POST['discount_expirydate'],$_POST['discount_percentage'],$_POST['discount_max_limit'],$_POST['discount_reason'],$_POST['discount_status']));
	$sql = "INSERT INTO payment(customer_id,room_booking_id,payment_date,payment_type,payment_detail,total_amt,status,name,mobileno,note,transaction_type,discount_amount,discount_detail) VALUES('$_SESSION[customer_id]','$insid','$dt','$_POST[payment_type]','$paymentdetail','$_POST[totcost]','Active','$_POST[name]','$_POST[contactnumber]','$_POST[note]','Hotel Booking','$_POST[discount_amt]','$discount_detail')";
	$qsql = mysqli_query($con,$sql);
	echo $insid = mysqli_insert_id($con);
	echo mysqli_error($con);
	$sqlupd="UPDATE giftcoupon set status='Redeemed' WHERE couponcode='$_POST[discount_couponcode]'";
	mysqli_query($con,$sqlupd);
}
?>