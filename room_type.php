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
		$sql = "UPDATE room_type SET hotel_id='$_POST[hotel_id]',room_type='$_POST[room_type]',max_adults='$_POST[max_adults]',max_children='$_POST[max_children]',cost='$_POST[cost]',status='$_POST[status]',available_rooms='$_POST[available_rooms]' WHERE room_typeid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Room Type record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO room_type(hotel_id,room_type,max_adults,max_children,cost,available_rooms,status) values('$_POST[hotel_id]','$_POST[room_type]','$_POST[max_adults]','$_POST[max_children]','$_POST[cost]','$_POST[available_rooms]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Room type inserted successfully..');</script>";
			echo "<script>window.location='room_type.php?hotel_id=" . $_GET['hotel_id'] . "';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
$sqlhotel ="select hotel.*,tourism_location.location_name from hotel LEFT JOIN tourism_location ON hotel.location_id=tourism_location.location_id WHERE hotel.hotel_id='$_GET[hotel_id]'";
$qsqlhotel = mysqli_query($con,$sqlhotel);
$rshotel = mysqli_fetch_array($qsqlhotel);
?>
<?php
if(isset($_GET['editid']))
{
	$sqlroom_type ="SELECT * FROM room_type WHERE room_typeid='$_GET[editid]'";
	$qsqlroom_type =mysqli_query($con,$sqlroom_type);
	$rsroom_type = mysqli_fetch_array($qsqlroom_type);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Room Type  - <?php echo $rshotel['hotel_name']; ?></h2>
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
<?php
$sqlhotel1 = "SELECT * FROM hotel where hotel_id='$rshotel[hotel_id]'";
$qsqlhotel1 = mysqli_query($con,$sqlhotel1);
while($rshotel1 = mysqli_fetch_array($qsqlhotel1))
{
echo "<option value='$rshotel1[hotel_id]'>$rshotel1[hotel_name]</option>";
}
?>
	</select>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Room type
	</div>
	<div class="col-md-10">
	<input type="text" name="room_type" id="room_type" class="form-control" placeholder="Enter room type" value="<?php echo $rsroom_type['room_type']; ?>" >
	</div>
</div><br>


<div class="row"> 
	<div class="col-md-2 boldfont">
		Max adults
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="max_adults" id="max_adults" class="form-control" value="<?php echo $rsroom_type['max_adults'];?>">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Max Children
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="max_children" id="max_children" class="form-control" value="<?php echo $rsroom_type['max_children'];?>">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Cost
	</div>
	<div class="col-md-10">
	<input type="text" name="cost" id="cost" class="form-control" placeholder="Enter Cost" value="<?php echo $rsroom_type['cost'];?>" >
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Number of Rooms
	</div>
	<div class="col-md-10">
	<input type="number" min="1" name="available_rooms" id="available_rooms" class="form-control" placeholder="Number of Rooms" value="<?php echo $rsroom_type['available_rooms'];?>" >
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
			if($val == $rsroom_type['status'])
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
