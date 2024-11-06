<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM cab_booking WHERE cab_bookingid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Cab Booking record deleted successfully...');</script>";
	}
}
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner">
		<div class="container">
			<h2>View Transaction Report</h2>
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
			<div class="span_of_2">
<?php
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active' AND payment.food_order_id='0' AND payment.cab_bookingid='0'";
	if(isset($_SESSION['customer_id']))
	{
	$sql = $sql . " AND room_booking.customer_id='$_SESSION[customer_id]'";
	}
	$sql = $sql . " ORDER BY room_booking.room_booking_id desc";
	//echo $sql;
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
?>
<?php
if(mysqli_num_rows($qsql) == 0)
{
?>
<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>No Bookings Done yet..</th>
		</tr>
	</thead>
</table>
<?php
}
else
{
?>	
<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Bill No.</th>
			<th style="width: 50px;">Hotel</th>
						<?php
			//if(!isset($_SESSION['customer_id']))
			{
			?>
			<th>Customer</th>
			<?php
			}
			?>
			<th>Booking Detail</th>			
			<th>Room Booking Cost</th>
			<th>Food order Cost</th>
			<th>Cab Booking Cost</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	while($rs = mysqli_fetch_array($qsql))
	{
		$amtfoodorder = 0;
		$amtcabbooking = 0;
		######
		$sqlfoodorder = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active'  AND payment.food_order_id!='0' AND payment.cab_bookingid='0' AND room_booking.room_booking_id='$rs[room_booking_id]'";
		if(isset($_SESSION['customer_id']))
		{
		$sqlfoodorder = $sqlfoodorder . " AND room_booking.customer_id='$_SESSION[customer_id]'";
		}
		$sqlfoodorder = $sqlfoodorder . " ORDER BY room_booking.room_booking_id desc";
		$qsqlfoodorder = mysqli_query($con,$sqlfoodorder);
		echo mysqli_error($con);
		while($rsfoodorder = mysqli_fetch_array($qsqlfoodorder))
		{
			$amtfoodorder = $amtfoodorder + $rsfoodorder['total_amt'];
		}		
		######
		
		######
		$sqlcab_booking = "SELECT * FROM cab_booking LEFT JOIN payment  ON payment.payment_id=cab_booking.payment_id LEFT JOIN room_booking ON payment.room_booking_id=room_booking.room_booking_id LEFT JOIN vehicle_type ON cab_booking.vehicle_typeid=vehicle_type.vehicle_typeid LEFT JOIN customer ON cab_booking.customer_id=customer.customer_id  ";
		$sqlcab_booking = $sqlcab_booking . " WHERE cab_booking.cal_bookingid!='0' AND payment.room_booking_id='$rs[room_booking_id]' ";
		if(isset($_SESSION['customer_id']))
		{
		  $sqlcab_booking = $sqlcab_booking . " AND cab_booking.customer_id='$_SESSION[customer_id]'";
		}
		$qsqlcab_booking = mysqli_query($con,$sqlcab_booking);
		while($rscab_booking = mysqli_fetch_array($qsqlcab_booking))
		{
			$amtcabbooking = $amtcabbooking + $rscab_booking['cost'];
		}
		######
		
		$sqlhotel_image = "SELECT * FROM hotel_image WHERE hotel_id='$rs[1]' AND room_typeid='$rs[room_typeid]'";
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

		$checkin = date("d-M-Y",strtotime($rs['check_in']));
		$checkout = date("d-M-Y",strtotime($rs['check_out']));
		echo "<tr>
			<th>
			<center>
			<p style='color:red;font-size:25px;'><br>
			$rs[payment_id]</p>
			</center>
			</th>
			<td>$rs[hotel_image] $rs[hotel_name]<br><img src='$imgname' style='width:150px;height:100px;'></td>";
			echo "<td>
			$rs[customer_name]<br>
			$rs[address], $rs[city] - $rs[pincode]	
			
			</td>";
			echo "<td>$rs[room_type]<br>(Rs. $rs[cost] / day)<br>";			
		echo "<b>CheckIn :</B> $checkin<br><b>Checkout :</b> $checkout <br><b style='color:green;'>";
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
$total = ($rs['cost']*$nodays) - $rs['discount_amount']; 
		echo "</b></td>
			<td>Rs. ". $total . "</td>
			<td>Rs. " . $amtfoodorder . "</td>
			<td>Rs. " . $amtcabbooking . "</td>
			<td style='width: 125px;'><center><a href='bookingreceipt.php?paymentid=$rs[payment_id]' class='btn btn-primary' style='width: 125px;' target='_blank'>VIEW BOOKING<br> REPORT</a>";	
			echo "</center></td></tr>";
	}
	?>	
	</tbody>
</table>
<?php
}
?>	
	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
<!--start main -->
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