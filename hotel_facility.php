<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$img = rand() . $_FILES["facility_img"]["name"];
	move_uploaded_file($_FILES["facility_img"]["tmp_name"],"imgfacility/".$img);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE hotel_facility SET hotel_id='$_POST[hotel_id]',room_typeid='$_POST[room_typeid]',facility_type='$_POST[facility_type]'";
		if($_FILES["facility_img"]["name"] != "")
		{
		$sql = $sql . ",facility_img='$img'";
		}
		$sql = $sql . ",status='$_POST[status]' WHERE hotel_facilityid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Hotel facility record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO hotel_facility(hotel_facilityid,hotel_id,room_typeid,facility_type,facility_img,status) values('$_POST[hotel_facilityid]','$_POST[hotel_id]','$_POST[room_typeid]','$_POST[facility_type]','$img','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Hotel facility record added successfully ..');</script>";
			echo "<script>window.location='hotel_facility.php?hotel_id=$_GET[hotel_id]';</script>";
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
	$sqlhotel_facility ="SELECT * FROM hotel_facility WHERE hotel_facilityid='$_GET[editid]'";
	$qsqlhotel_facility =mysqli_query($con,$sqlhotel_facility);
	$rshotel_facility = mysqli_fetch_array($qsqlhotel_facility);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Hotel Facility - <?php echo $rshotel['hotel_name']; ?></h2>
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
		<option value="">Select the room type</option>	
		<?php
		$sqlroom_type = "SELECT * FROM room_type where hotel_id='$rshotel[hotel_id]'";
		$qsqlroom_type = mysqli_query($con,$sqlroom_type);
		while($rsroom_type = mysqli_fetch_array($qsqlroom_type))
		{
			if($rsroom_type['room_typeid'] == $rshotel_facility['room_typeid'])
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
		Facility
	</div>
	<div class="col-md-10">
	<textarea name="facility_type" id="facility_type" class="form-control" ><?php echo $rshotel_facility['facility_type']; ?></textarea>	
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Facility image
	</div>
	<div class="col-md-10">
	<input type="file"  name="facility_img" id="facility_img" class="form-control" >
	<?php
	if(isset($_GET['editid']))
	{
		if($rshotel_facility['facility_img'] == "")
		{
		}
		else if(file_exists("imgfacility/" . $rshotel_facility['facility_img']))
		{
		echo "<img src='imgfacility/$rshotel_facility[facility_img]' style='width: 150px;height:100px;'>";
		}
	}
	?>
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
			if($val == $rshotel_facility['status'])
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
