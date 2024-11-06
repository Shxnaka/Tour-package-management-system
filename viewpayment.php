<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM payment WHERE payment_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Payment record deleted successfully...');</script>";
	}
}
?>
<!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Transaction Report</h2>
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
			<th>Customer</th>
			<th>Transaction type</th>
			<th>Payment Date</th>
			<th>Payment Type</th>
			<th>Total Amount</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM payment LEFT JOIN customer ON payment.customer_id=customer.customer_id LEFT JOIN room_booking ON payment.room_booking_id=room_booking.room_booking_id  LEFT JOIN food_order ON payment.food_order_id=food_order.food_order_id LEFT JOIN cab_booking ON payment.cab_bookingid=cab_booking.cal_bookingid  where payment.status!='' ";
	if(isset($_SESSION['customer_id']))
	{
	$sql = $sql . " AND payment.customer_id='$_SESSION[customer_id]' ";
	}
	$sql = $sql . " ORDER BY payment.payment_id DESC";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[0]</td>
			<td>$rs[customer_name]</td>";
			if($rs['transaction_type'] == "Hotel Booking")
			{
		echo "<td><b style='color:blue;'>" .$rs['transaction_type'] . "</b></td>";
			}
			if($rs['transaction_type'] == "Food Order")
			{
		echo "<td><b style='color:green;'>" .$rs['transaction_type'] . "</b></td>";
			}
			if($rs['transaction_type'] == "Cab Booking")
			{
		echo "<td><b style='color: orange;'>" .$rs['transaction_type'] . "</b></td>";
			}
			if($rs['transaction_type'] == "Cancellation")
			{
		echo "<td><b style='color:red;'>" .$rs['transaction_type'] . "</b></td>";
			}
		echo "<td>" . date("d-M-Y",strtotime($rs['payment_date'])) . "</td>
			<td>$rs[payment_type]</td>
			<th style='color:green;'>Rs. $rs[total_amt]</th>
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
<!--start main -->
<?php
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