<?php
include("header.php");
$totalamt = 0;
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner">
		<div class="container">
			<h2>Cancellation Panel</h2>
		</div>
	</div>
<!-- Sub Banner Start -->
<!--start main -->
            <div class="iqoniq_contant_wrapper">
                <section class="gray-bg aboutus-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="about-us">
                                    <div class="text">		
<center><b style="font-size:25px;color:red;">Room Booking records</b></center>
<table  class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Bill No.</th>
			<th>Hotel</th>
			<th>Room Type</th>
			<?php
			if(!isset($_SESSION['customer_id']))
			{
			?>
			<th>Customer</th>
			<?php
			}
			?>
			<th>Booked for</th>
			<th>Booking date</th>
			<th>Cost</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active'  AND payment.food_order_id='0' AND payment.cab_bookingid='0' AND payment.payment_id='$_GET[paymentid]' ";
	if(isset($_SESSION['customer_id']))
	{
	$sql = $sql . " AND room_booking.customer_id='$_SESSION[customer_id]'";
	}
	$sql = $sql . " ORDER BY room_booking.room_booking_id desc";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$room_booking_id = $rs['room_booking_id'];
		$sqlhotel_image = "SELECT * FROM hotel_image WHERE hotel_id='$rs[1]' AND room_typeid='0'";
		$qsqlhotel_image = mysqli_query($con,$sqlhotel_image);
		$rshotel_image = mysqli_fetch_array($qsqlhotel_image);		
		
		$checkin = date("d-M-Y",strtotime($rs['check_in']));
		$checkout = date("d-M-Y",strtotime($rs['check_out']));
		echo "<tr>
			<th>
			<center>
			<p style='color:red;font-size:25px;'>" . $rs['payment_id'] . "</p>
			</center>
			</th>
			<td>$rs[hotel_image] $rs[hotel_name]</td>
			<td>$rs[room_type]<br>(Rs.$rs[cost] / day)</td>";
			if(!isset($_SESSION['customer_id']))
			{
		echo "<td>$rs[customer_name]</td>";
			}
		echo "<td>Adults : $rs[no_ofadults]<br>Children: $rs[no_ofchildren]</td>
			<td>
			CheckIn : $checkin<br>Checkout : $checkout <br><b style='color:green;'>";
$checkin = strtotime($rs['check_in']);
$checkout = strtotime($rs['check_out']);
$datediff = $checkout - $checkin;
$nodays = round($datediff / (60 * 60 * 24));
$nodays = $nodays +1;
if($nodays == 1 )
{
	echo $nodays . " Day"; 
}
else
{
	echo $nodays . " Days"; 
}
		echo "</b></td>
			<td>Rs.". $rs['cost']*$nodays . "</td>
			</tr>";
		$totalamt = $totalamt + ($rs['cost']*$nodays);
		$amttotbooking = $totalamt;
	}
	?>	
	</tbody>
</table>
			<hr>

			<?php
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active'  AND payment.food_order_id='$room_booking_id' AND payment.cab_bookingid='0' ";
	if(isset($_SESSION['customer_id']))
	{
	$sql = $sql . " AND room_booking.customer_id='$_SESSION[customer_id]'";
	}
	$sql = $sql . " ORDER BY room_booking.room_booking_id desc";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) > 0)
	{
			?>
<center><b style="font-size:25px;color:red;">Food Order</b></center>
				
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Bill No.</th>
			<th>Hotel</th>
			<?php
			if(!isset($_SESSION['customer_id']))
			{
			?>
			<th>Customer</th>
			<?php
			}
			?>
			<th>Food Order date</th>
			<th>No. of <br>Items ordered</th>
			<th>Cost</th>
		</tr>
	</thead>
	<tbody>
	<?php
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqlnoitem = "SELECT * FROM food_order WHERE payment_id='$rs[payment_id]'";
		$qsqlnoitem = mysqli_query($con,$sqlnoitem);
		
		$sqlhotel_image = "SELECT * FROM hotel_image WHERE hotel_id='$rs[1]' AND room_typeid='0'";
		$qsqlhotel_image = mysqli_query($con,$sqlhotel_image);
		$rshotel_image = mysqli_fetch_array($qsqlhotel_image);		
		
		if(mysqli_num_rows($qsqlhotel_image) == 0)
		{
			$imgname = "images/noimage.png";
		}
		else
		{
			if(file_exists("imghotel/$rshotel_image[hotel_image]"))
			{
				$imgname = "imghotel/$rshotel_image[hotel_image]";				
			}
			else
			{
				$imgname = "images/noimage.png";
			}
		}

		$checkin = date("d-M-Y",strtotime($rs['name']));
		$checkout = date("h:i A",strtotime($rs['mobileno']));
		echo "<tr>
			<th><p style='color:red;'>Bill No. $rs[payment_id]</p></th>
			<td>$rs[hotel_name]<br>$rs[room_type]</td>";
			if(!isset($_SESSION['customer_id']))
			{
		echo "<td>$rs[customer_name]</td>";
			}
		echo "
			<td>
			Date : $checkin<br>Time : $checkout <br>";
		echo "</td>
			<td>". mysqli_num_rows($qsqlnoitem) . "</td>
			<td>Rs.". $rs['total_amt'] . "</td>
		</tr>";
		$totalamt = $totalamt + $rs['total_amt'];
		$amtfoodorder = $amtfoodorder+ $rs['total_amt'];
	}
	?>	
	</tbody>
</table>
			
	<hr>
	<?php
	}
	?>
	
<?php
$sql = "SELECT * FROM cab_booking LEFT JOIN payment  ON payment.payment_id=cab_booking.payment_id LEFT JOIN room_booking ON payment.room_booking_id=room_booking.room_booking_id LEFT JOIN vehicle_type ON cab_booking.vehicle_typeid=vehicle_type.vehicle_typeid LEFT JOIN customer ON cab_booking.customer_id=customer.customer_id  ";
$sql = $sql . " WHERE cab_booking.cal_bookingid!='0' AND payment.room_booking_id='$room_booking_id' ";
if(isset($_SESSION['customer_id']))
{
$sql = $sql . " AND cab_booking.customer_id='$_SESSION[customer_id]'";
}

	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsql) > 0)
	{
?>	
	<center><b style="font-size:25px;color:red;">Cab Bookings</b></center>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Bill No.</th>
			<th>Room Booking</th>
			<th>Customer</th>
			<th>Vehicle Type</th>
			<th>Booking Date & Time</th>
			<th>From Location</th>
			<th>To Location</th>
			<th>Cost/KM</th>
			<th>Total K.M</th>
			<th>Total Amount</th>
		</tr>
	</thead>
	<tbody>
	<?php

	while($rs = mysqli_fetch_array($qsql))
	{
$sqlhotel = "select * from hotel WHERE hotel_id='$rs[hotel_id]'";
$qsqlhotel = mysqli_query($con,$sqlhotel);
$rshotel = mysqli_fetch_array($qsqlhotel);
		
$bookdttime = date("d-M-Y",strtotime($rs['booking_datetime'])). " " . date("h:i A",strtotime($rs['booking_datetime']));
		echo "<tr>
			<td><p style='color:red;'>$rs[payment_id]</p></td>
			<td>$rshotel[hotel_name]</td>
			<td>$rs[customer_name]</td>
			<td>$rs[vehicle_type]</td>
			<td>$bookdttime</td>
			<td>$rs[flocation]</td>
			<td>$rs[tlocation]</td>
			<td>Rs. $rs[9]</td>
			<td>$rs[total_km]</td>
			<td>Rs." . $rs['total_km'] * $rs[9]  . "</td>
		</tr>";
		$totalamt = $totalamt + ($rs['total_km'] * $rs[9]);
		$amtcab =$amtcab  + ($rs['total_km'] * $rs[9]);
	}
	?>	
	</tbody>
</table>
<hr>
<?php
	}
	?>


<input type="hidden" name="room_booking_id" id="room_booking_id" value="<?php echo $room_booking_id; ?>">
<input type="hidden" name="totalamt" id="totalamt" value="<?php echo $totalamt/2; ?>">
	<center><b style="font-size:25px;color:red;">Total Amount</b></center>
<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
		<th>HOTEL BOOKING</th>
		<td>Rs. <?php echo $amttotbooking; ?></td>
		</tr>

		<tr>
		<th>FOOD ORDER</th>
		<td>Rs. <?php echo $amtfoodorder; ?></td>
		</tr>

		<tr>
		<th>CAB BOOKING</th>
		<td>Rs. <?php echo $amtcab; ?></td>
		</tr>

		<tr>
		<th>Total Amount</th>
		<td>Rs. <?php echo $amttotbooking + $amtfoodorder+ $amtcab; ?></td>
		</tr>

	
		
	</thead>
</table>
			
	                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- iqoniq Contant Wrapper End-->  
<?php
include("datatable.php");
include("footer.php");
?>
<script>
function confirmdelete()
{
	if(confirm("Are you sure you want to delete this record??") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<script>
$('#btnpayment').bind('click', function(e) {
	
		var onlynumbers = /^[0-9]*$/;
	
	var onlycharacter = /^[a-zA-Z\s]*$/;
	
	var mobno = /^[789]\d{9}$/;
	var ifscregex = /^[A-Za-z]{4}\d{7}$/;
	
	if(document.getElementById("payment_type").value == "")
	{
		alert("Kindly select Account Type..");
		return false;
	}
	else if(document.getElementById("card_holder").value == "")
	{
		alert("Kindly enter Account holder name...");
		return false;
	}
	else if(!document.getElementById("card_holder").value.match(onlycharacter))
	{
		alert("Account holder Name should contain only Character..");
		return false;
	}
	else if(document.getElementById("card_no").value == "")
	{
		alert("Bank account number should not be empty...");
		return false;
	}
	else if(document.getElementById("card_no").value.length > 20)
	{
		alert("Bank Account number should not exceed more than 20 digit...");
		return false;
	}
	else if(document.getElementById("card_no").value.length < 10)
	{
		alert("Bank Account number should contain more than 10 digit...");
		return false;
	}
	else if(document.getElementById("cvv_no").value == "")
	{
		alert("IFSC code should not be empty....");
		return false;
	}
	else if(document.getElementById("cvv_no").value.length < 5)
	{
		alert("IFSC code should contain more than 5 digits...");
		return false;
	}
	/*
	else if(document.getElementById("exp_date").value == "")
	{
		alert("Kindly select the Expiration Date...");
		return false;
	}	
	*/
	else
	{
	
		var payment_type = $('#payment_type').val();
		var card_holder = $('#card_holder').val();
		var card_no = $('#card_no').val();
		var cvv_no = $('#cvv_no').val();
		var exp_date = $('#exp_date').val();
		var room_booking_id = $('#room_booking_id').val(); 
		var totalamt = $('#totalamt').val(); 	
		
			$.post("payment.php",
			{
				'payment_type': payment_type,
				'card_holder': card_holder,
				'card_no': card_no,
				'cvv_no': cvv_no,
				'exp_date': exp_date,
				'totcost':totalamt,
				'room_booking_id':room_booking_id,
                'btncancellation': "btncancellation"
			},
			function(data, status){
				alert("Cancellation request sent successfully.. Amount will be credited to your account within 2-3 working days..");
				window.location='cancellationreceipt.php?paymentid='+data;				
			});
	}
});
</script>