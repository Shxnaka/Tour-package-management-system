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
		$sql = "UPDATE room_booking SET hotel_id='$_POST[hotel_id]',room_typeid='$_POST[room_typeid]',customer_id='$_POST[customer_id]',no_ofadults='$_POST[no_ofadults]',no_ofchildren='$_POST[no_ofchildren]',check_in='$_POST[check_in]',check_out='$_POST[check_out]',cost='$_POST[cost]',status='$_POST[status]' WHERE room_booking_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Room Booking record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
	$sql ="INSERT INTO staff(staffid,staffname,stafftype,loginid,password,status) values('$_POST[staffid]','$_POST[staff]','$_POST[room_typeid]','$_POST[customer_id]','$_POST[no_ofadults]','$_POST[no_ofchildren]','$_POST[check_in]','$_POST[check_out]','$_POST[cost]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) ==  1)
	{
		echo "<script>alert('room booking details..');</script>";
		echo "<script>window.location='room_booking.php';</script>";
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
                    <h2>Room Booking</h2>
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
		Hotel
	</div>
	<div class="col-md-10">
		<select name="hotel_id" id="hotel_id" class="form-control">
		<option value="">Select the hotel name</option>
	</select>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Room 
	</div>
	<div class="col-md-10">
	<select name="room_typeid" id="room_typeid" class="form-control">
		<option value="">Select the room</option>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Customer
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="customer_id" id="customer_id" class="form-control" value="<?php echo $rsedit['customer_id'];?>">
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		No. of Adults
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="no_ofadults" id="no_ofadults" class="form-control" value="<?php echo $rsedit['no_ofadults'];?>">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		No. of Children
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="no_ofchildren" id="no_ofchildren" class="form-control" value="<?php echo $rsedit['no_ofchildren'];?>">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Check In
	</div>
	<div class="col-md-10">
	<select name="check_in" id="check_in" class="form-control">
		<option value="">Check IN</option>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Check Out
	</div>
	<div class="col-md-10">
	<select name="check_out" id="check_out" class="form-control">
		<option value="">Check Out</option>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Cost
	</div>
	<div class="col-md-10">
	<select name="cost" id="cost" class="form-control">
		<option value="">Cost</option>
	</select>
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
		<input type="submit" name="submit" id="submit" class="form-control btn btn-warning " style="width: 250px;height:50px;" >
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
