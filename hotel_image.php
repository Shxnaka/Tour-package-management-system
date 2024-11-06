<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$img = rand() . $_FILES["hotel_image"]["name"];
	move_uploaded_file($_FILES["hotel_image"]["tmp_name"],"imghotel/".$img);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE hotel_image SET hotel_id='$_POST[hotel_id]',room_typeid='$_POST[room_typeid]',hotel_image='$img',image_description='$_POST[image_description]',status='$_POST[status]' WHERE hotel_imageid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Hotel image record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO hotel_image(hotel_id,room_typeid,hotel_image,image_description,status) values('$_POST[hotel_id]','$_POST[room_typeid]','$img','$_POST[image_description]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Hotel image uploaded..');</script>";
			echo "<script>window.location='hotel_image.php?hotel_id=" . $_GET['hotel_id'] .  "';</script>";
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
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Hotel Image - <?php echo $rshotel['hotel_name']; ?></h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" enctype="multipart/form-data">
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
<select name="room_typeid" id="room_typeid" class="form-control">
	<option value="">Select the Room type</option>
	<?php
	$sqlroom_type = "SELECT * FROM room_type where hotel_id='$rshotel[hotel_id]'";
	$qsqlroom_type = mysqli_query($con,$sqlroom_type);
	while($rsroom_type = mysqli_fetch_array($qsqlroom_type))
	{
		if($rsroom_type['room_typeid'] == $rsedit['room_typeid'])
		{
		echo "<option value='$rsroom_type[room_typeid]' selected>$rsroom_type[room_type]</option>";
		}
		else
		{
		echo "<option value='$rsroom_type[room_typeid]'>$rsroom_type[room_type]</option>";
		}
	}
	?>
</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Hotel image
	</div>
	<div class="col-md-10">
	<input type="file" name="hotel_image" id="hotel_image" class="form-control">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Image Description
	</div>
	<div class="col-md-10">
	<textarea name="image_description" id="image_description" class="form-control"></textarea>
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
