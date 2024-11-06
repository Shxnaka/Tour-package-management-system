<?php
if (!isset($_SESSION)) { session_start(); }
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
$hidechatbanner = 0;
include("databaseconnection.php");
$dttime = date("Y-m-d h:i:s");
$sqlmessage = "SELECT * FROM message WHERE chatid='" . $_SESSION['chatid'] . "' AND status='Active'";
$qsqlmessage = mysqli_query($con,$sqlmessage);
echo mysqli_error($con);
$rsmessage = mysqli_fetch_array($qsqlmessage);
$countmsg =mysqli_num_rows($qsqlmessage);
if($countmsg == 0)
{
	$msgid=0;
	$rsmessagecust_id = 0;
	$rsmessageuser_id = 0;
}
else
{
	$msgid=$rsmessage[0];
	$rsmessagecust_id = $rsmessage['cust_id'];
	$rsmessageuser_id = $rsmessage['user_id'];
}
if($rsmessagecust_id == 0 )
{
	$cname = "Customer";
}
else
{
	$sqlcustomer = "SELECT * FROM customer WHERE customer_id='$rsmessage[cust_id]'";
	$qsqlcustomer = mysqli_query($con,$sqlcustomer);
	echo mysqli_error($con);
	$rscustomer = mysqli_fetch_array($qsqlcustomer);
	$cname = $rscustomer['customer_name'];
}
if($rsmessageuser_id == 0 )
{
	$sname = "Staff";
}
else
{
	$sname = "Staff";
	/*
	$sqluser = "SELECT * FROM staff WHERE customer_id='$rsmessage[user_id]'";
	$qsqluser = mysqli_query($con,$sqluser);
	echo mysqli_error($con);
	$rsuser = mysqli_fetch_array($qsqluser);
	$sname = $rsuser['staff_name'];
	*/
}
?>
<?php
if(isset($_SESSION['customer_id']))
{
	//Welcome message for New registered user starts here
    $sqlcustomerreg ="SELECT * FROM customer WHERE customer_id='" . $_SESSION['customer_id'] . "'";
	$qsqlcustomerreg = mysqli_query($con,$sqlcustomerreg);
	$rscustomerreg = mysqli_fetch_array($qsqlcustomerreg);
	if($rscustomerreg['address'] == "")
	{
		$hidechatbanner = 1;
?>
			<div class="chat-box-left">
				<strong style="color:#0c6817;">Welcome message:</strong>
				Thanks for Registering The travel way Tourism Booking Portal. Kindly update your profile details. If you need any further assistance please contact with us.
			</div>
<?php
	}
	//Welcome message for New registered user ends here
	//Check Booking done or not - starts here
	$sqlchkbooking ="SELECT * FROM room_booking LEFT JOIN hotel ON hotel.hotel_id=room_booking.hotel_id LEFT JOIN tourism_location ON tourism_location.location_id=hotel.location_id WHERE room_booking.customer_id='" . $_SESSION['customer_id'] . "' AND room_booking.check_in>='" . $dttime . "' LIMIT 1";
	$qsqlchkquery = mysqli_query($con,$sqlchkbooking);
	$rschkquery = mysqli_fetch_array($qsqlchkquery);
	if(mysqli_num_rows($qsqlchkquery) ==0)
	{
		$hidechatbanner = 1;
			if($rscustomerreg['address'] != "")
		{
?>
			<div class="chat-box-left">
				<strong style="color:#0c6817;">Notification:</strong>
				You have not done any bookings yet. <a href="displaytourismlocation.php"><b style="color: red;">Click here</b></a> to book your travel.
			</div>
<?php		
		}
	}
	//Check Booking done or not - ends here
	//Check Booking done starts here
	if(mysqli_num_rows($qsqlchkquery) ==1)
	{
		$sqlpayments ="SELECT * FROM payment  WHERE room_booking_id='" . $rschkquery['room_booking_id'] . "' and cab_bookingid='0' AND 	food_order_id='0'	AND customer_id='" . $_SESSION['customer_id'] . "'   LIMIT 1";
		$qsqlpayments = mysqli_query($con,$sqlpayments);
		echo mysqli_error($con);
		$rschkpayments = mysqli_fetch_array($qsqlpayments);
		$hidechatbanner = 1;
?>
			<div class="chat-box-left">
				<strong style="color:#0c6817;">Reminder:</strong>
				Hello, You have booked your journey for <b><?php echo $rschkquery['location_name']; ?></b>. Booking scheduled for <b><?php echo date("d-m-Y",strtotime($rschkquery['check_in'])); ?></b>. <a href="hotelbookingreceipt.php?paymentid=<?php echo $rschkpayments[0]; ?>"><b style="color: red;">Click here</b></a> to know more about it.
			</div>
<?php		
	}
	//Check Booking done ends here
	//Check Food Order starts here
	if(mysqli_num_rows($qsqlchkquery) ==1)
	{
		$sqlpayments ="SELECT * FROM payment  WHERE room_booking_id='" . $rschkquery['room_booking_id'] . "' AND customer_id='" . $_SESSION['customer_id'] . "'  AND food_order_id!=0 ORDER BY payment_id LIMIT 1";
		$qsqlpayments = mysqli_query($con,$sqlpayments);
		$rschkpayments = mysqli_fetch_array($qsqlpayments);
		$hidechatbanner = 1;
		if(mysqli_num_rows($qsqlpayments) == 1)
		{
?>
			<div class="chat-box-left">
				<strong style="color:#0c6817;">Food Order Reminder:</strong>
				Hello, You have Ordered Food for <b><?php echo date("d-m-Y",strtotime($rschkpayments['name'])); ?> <?php echo $rschkpayments['mobileno']; ?></b>. <a href="foodorderreceipt.php?paymentid=<?php echo $rschkpayments[0]; ?>"><b style="color: red;">Click here</b></a> to know more about it.
			</div>
<?php
		}
	}
	//Check Food Order ends here
	//Check CabBooking starts here
	if(mysqli_num_rows($qsqlchkquery) ==1)
	{
		$sqlpayments ="SELECT * FROM payment  WHERE room_booking_id='" . $rschkquery['room_booking_id'] . "' AND customer_id='" . $_SESSION['customer_id'] . "'  AND cab_bookingid!=0 ORDER BY payment_id LIMIT 1";
		$qsqlpayments = mysqli_query($con,$sqlpayments);
		$rschkpayments = mysqli_fetch_array($qsqlpayments);
		$hidechatbanner = 1;
		if(mysqli_num_rows($qsqlpayments) == 1)
		{
			$sqlcab_bookings ="SELECT * FROM cab_booking  WHERE cal_bookingid='" . $rschkpayments['cab_bookingid'] . "'";
			$qsqlcab_bookings = mysqli_query($con,$sqlcab_bookings);
			$rscab_bookings = mysqli_fetch_array($qsqlcab_bookings);
?>
			<div class="chat-box-left">
				<strong style="color:#0c6817;">Cab Booking Alert:</strong>
				Hello, You have booked Cab for <b><?php echo date("d-m-Y h:i A",strtotime($rscab_bookings['booking_datetime'])); ?> <?php echo $rschkpayments['mobileno']; ?></b>. <a href="cabbookingreceipt.php?paymentid=<?php echo $rschkpayments[0]; ?>"><b style="color: red;">Click here</b></a> to know more about it.
			</div>
<?php
		}
	}
	//Check CabBooking ends here
}
?>
<?php
if($countmsg != 0)
{
?>
	<?php
	$sqlreplymsg = "SELECT * FROM message_reply  WHERE message_id='$msgid' ORDER BY date_time";
	$qsqlreplymsg = mysqli_query($con,$sqlreplymsg);
	while($rsreplymsg = mysqli_fetch_array($qsqlreplymsg))
	{
		if($rsreplymsg['msg_type'] == 'Autobot' )
		{
	?>            
			<div class="chat-box-left">
				<strong style="color:#9B0305;"><?php echo $sname; ?>:</strong>
				<?php echo "<br>".$rsreplymsg['message_reply_text']; ?>
			</div>
		<?php
		}
		else
		{
			if($rsreplymsg['msg_type'] != 'Customer' )
			{
		?>            
			<div class="chat-box-left">
				<strong style="color:#9B0305;"><?php echo $sname; ?>:</strong>
				<?php echo "<br>".$rsreplymsg['message_reply_text']; ?>
			</div>
			<?php
			}
			if($rsreplymsg['msg_type'] != 'Staff' )
			{
			?>
			<div class="chat-box-right">
				<strong style="color:#1A4512;"><?php echo $cname; ?>:</strong>
				<?php echo "<br>".$rsreplymsg['message_reply_text']; ?>
			</div>
		<?php
			}
		}
	}
	?>
<?php
}
else
{
	if($hidechatbanner == 0)
	{
?>
	<div class="chat-box-right">
		<strong style="color:#1A4512;font-family:'Comic Sans MS', cursive">Staff:</strong><br> <strong style="font-family:'Comic Sans MS', cursive">How can I help you?</strong><br>
		<img src="onlinechat/img/livechat.gif" width="235" height="130" alt=""/>
	</div>
<?php
	}
}
?>
<!--   <hr class="hr-clas" /> -->