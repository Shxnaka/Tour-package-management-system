<?php
include("header.php");
if(isset($_POST["submitorder"]))
{
	$item_id = $_POST['item_id'];
	$qty = $_POST['qty'];
	$item_cost = $_POST['item_cost'];
	for($i=0;$i<count($item_id);$i++)
	{
		if($qty[$i] != 0)
		{
			$sql = "INSERT INTO food_order(room_booking_id,item_id,customer_id,item_cost,qty,status) VALUES('$_POST[room_booking_id]','$item_id[$i]','$_SESSION[customer_id]','$item_cost[$i]','$qty[$i]','Pending')";
			mysqli_query($con,$sql);
			echo mysqli_error($con);
			$insid= mysqli_insert_id($con);
		}
	}
	echo "<script>window.location='displayitemorder.php?foororderid=$insid&paymentid=$_GET[paymentid]';</script>";
}
else
{
	$sql ="DELETE FROM food_order WHERE status='Pending'";
	mysqli_query($con,$sql);
}
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner">
		<div class="container">
			<h2>Online Food Order</h2>
		</div>
	</div>
<!-- Sub Banner Start -->
                <!-- Pricing Table Section Start-->
                <section class="pricing_wrap">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Kindly enter quantity to Order Food items..</h6>
                            <h4>Online Food Order</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">	
			<div class="span_of_2">
				
<form method="post" action="">

<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
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
			<th>Adult</th>
			<th>Children</th>
			<th>Check-in date</th>
			<th>Check-out date</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active' AND payment.payment_id='$_GET[paymentid]'   ";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$hotelid=  $rs['hotel_id'];
		echo "<input type='hidden' name='room_booking_id' value='$rs[room_booking_id]' >";
		$checkin = date("d-M-Y",strtotime($rs['check_in']));
		$checkout = date("d-M-Y",strtotime($rs['check_out']));
		echo "<tr>
			<td>$rs[hotel_name]</td>
			<td>$rs[room_type]</td>";
			if(!isset($_SESSION['customer_id']))
			{
		echo "<td>$rs[customer_name]</td>";
			}
		echo "<td>$rs[no_ofadults]</td>
			<td>$rs[no_ofchildren]</td>
			<td>$checkin</td>
			<td>$checkout</td>
		</tr>";
	}
	?>	
	</tbody>
</table>
<hr>
	<table id="dataTables" class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th>Image</th>
				<th>Item Type</th>
				<th>Item Name</th>
				<th>Item Description</th>
				<th>Item Cost</th>
				<th>Quantity</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$sql = "SELECT * FROM item LEFT JOIN food_category ON item.food_category_id=food_category.food_category_id WHERE item.hotel_id='$hotelid' AND item.status='Active'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		while($rs = mysqli_fetch_array($qsql))
		{
			if($rs['item_img'] == "")
			{	
				$imgname = "images/noimage.png";
			}
			else
			{
				if(file_exists("imgitem/".$rs['item_img']))
				{
					$imgname=  "imgitem/".$rs['item_img'];
				}
				else
				{
					$imgname = "images/noimage.png";
				}
			}
			echo "<tr>
				<td><img src='$imgname' style='width:100px;height:100px;'></td>
				<td>$rs[food_category]</td>
				<td>$rs[item_name]</td>
				<td>$rs[item_description]</td>
				<td>Rs.$rs[item_cost]</td>
				
	<td  style='width:100px;'>
	<input type='hidden' name='item_id[]' value='$rs[item_id]' >
	<input type='hidden' name='item_cost[]' value='$rs[item_cost]' >
	<input type='number' class='form-control' name='qty[]' max='200' value='0'  style='width:100px;' min='0' >
	</td></tr>";
		}
		?>	
		</tbody>
	</table>
<hr>
<center><input type="submit" name="submitorder" value="Click here to Order" class="btn btn-info"></center>
</form>
				<div class="clear"></div>
			</div>
	</div>
</div>
</div>		
<!--start main -->
                    </div>
                    </div>
                </section>
<?php
include("datatable.php");
include("footer.php");
?>