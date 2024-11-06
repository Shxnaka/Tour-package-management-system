<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE food_order SET room_booking_id='$_POST[room_booking_id]',item_id='$_POST[item_id]',customer_id='$_POST[customer_id]',item_cost='$_POST[item_cost]',qty='$_POST[qty]',status='$_POST[status]' WHERE food_order_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Food Order record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
	$sql ="INSERT INTO food_order(food_order_id,room_booking_id,item_id,customer_id,item_cost,qty,status) values('$_POST[food_order_id]','$_POST[room_booking_id]','$_POST[item_id]','$_POST[customer_id]','$_POST[item_cost]','$_POST[qty]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) ==  1)
	{
		echo "<script>alert('Food will be deliverd to you..');</script>";
		echo "<script>window.location='food_order.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
	}
}
?>  
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Food order details </h2>

                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="">
<div class="row">
<!-- Hotel Destination Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_hotel_destination fancy-overlay">
		<div class="text">
			
<div class="row"> 
	<div class="col-md-2 boldfont">
		Room Booking
	</div>
	<div class="col-md-10">
		<select name="room_booking_id"  id="room_booking_id" class="form-control">
		<option value="">Select the hotel</option>
	</select>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Food Item
	</div>
	<div class="col-md-10">
	<select name="item_id"  id="item_id" class="form-control">
		<option value="">Select the Food item</option>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Customer
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="customer_id" id="customer_id" class="form-control" value="<?php echo $rsedit['customer_id']; ?>">
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Price of Food
	</div>
	<div class="col-md-10">
	<select name="item_cost"  id="item_cost" class="form-control">
		<option value="">The price of Food </option>
		<select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Quantity
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter quantity" name="qty" id="qty" class="form-control" value="<?php echo $rsedit['qty']; ?>">
	</div>
</div><br>


<div class="row"> 
	<div class="col-md-2 boldfont">
		Status
	</div>
	<div class="col-md-10">
	<select name="status" id="status" class="form-control">
		<option value="">Select status</option>
		<?php
		$arr = array("Active","Inactive");
		foreach($arr as $val)
		{
			if($val == $rsedit['status'])
			{
			echo "<option value='$val' selected>$val</option>";
			}
			else
			{
			echo "<option value='$val'>$val</option>";
			}
		}
		?>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2">
		
	</div>
	<div class="col-md-10">
		<input type="submit" name="submit" id="submit" class="form-control btn btn-warning" style="width: 250px;height:50px;" >
	</div>
</div><br>
</form>
		</div>
	</div>
</div>
<!-- Hotel Destination End -->


						</div>
                    </div>
                </section>
            </div>
            <!-- Main Contant Wrap End -->
     <?php
include("footer.php");
?> 
