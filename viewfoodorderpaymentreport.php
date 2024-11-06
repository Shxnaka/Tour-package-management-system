<?php
include("header.php");
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner">
		<div class="container">
			<h2>Food Order Payment Report</h2>
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
		
<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active'  AND payment.food_order_id!='0' AND payment.cab_bookingid='0'";
	if(isset($_SESSION['customer_id']))
	{
	$sql = $sql . " AND room_booking.customer_id='$_SESSION[customer_id]'";
	}
	$sql = $sql . " ORDER BY room_booking.room_booking_id desc";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
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
			<th><p style='color:red;'>$rs[payment_id]</p></th>
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
			<td>Rs. ". $rs['total_amt'] . "</td>
			<td><a href='foodorderreceipt.php?paymentid=$rs[payment_id]' class='btn btn-info' target='_blank'>Receipt</a></td>
		</tr>";
	}
	?>	
	</tbody>
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