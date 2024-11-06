<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$img = rand(). $_FILES["vehicle_img"]["name"];
	move_uploaded_file($_FILES["vehicle_img"]["tmp_name"],"imgvehicletype/".$img);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE vehicle_type SET location_id='$_POST[location_id]',vehicle_type='$_POST[vehicle_type]',hotel_id='$_POST[hotel_id]'";
		if($_FILES["vehicle_img"]["name"] != "")
		{
		$sql = $sql . ",vehicle_img='$img'";
		}
		$sql = $sql . ",km_cost='$_POST[km_cost]',status='$_POST[status]' WHERE vehicle_typeid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Vehicle Type record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO vehicle_type(hotel_id,vehicle_type,vehicle_img,km_cost,status,location_id) values('$_POST[hotel_id]','$_POST[vehicle_type]','$img','$_POST[km_cost]','$_POST[status]','$_POST[location_id]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Vehicle type added successfully..');</script>";
			echo "<script>window.location='vehicle_type.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM vehicle_type where vehicle_typeid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit= mysqli_fetch_array($qsqledit);
}
?>  
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Vehicle type</h2>
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
		Location
	</div>
	<div class="col-md-10">
	<select name="location_id" id="location_id" class="form-control" onchange="funloadhotel(this.value)">
		<option value="">Select Location</option>
		<?php
	$sqltourism_location = "SELECT * FROM tourism_location where status='Active'";
	$qsqltourism_location = mysqli_query($con,$sqltourism_location);
	while($rstourism_location = mysqli_fetch_array($qsqltourism_location))
	{
		if($rstourism_location['location_id'] == $rsedit['location_id'])
		{
		echo "<option value='$rstourism_location[location_id]' selected>$rstourism_location[location_name]</option>";
		}
		else
		{
		echo "<option value='$rstourism_location[location_id]'>$rstourism_location[location_name]</option>";
		}
	}
	?>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Hotel name
	</div>
	<div class="col-md-10" id="divhotel"><?php include("ajaxhotel.php"); ?></div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Vehicle
	</div>
	<div class="col-md-10">
		<input type="text" placeholder="Enter the Vehicle Name" name="vehicle_type" id="vehicle_type" class="form-control" value="<?php echo $rsedit['vehicle_type'];?>">
	</div>
</div><br>
	
<div class="row"> 

	<div class="col-md-2 boldfont">
		Vehicle Image
	</div>
	<div class="col-md-10">
	<input type="file" placeholder="Upload vehicle image" name="vehicle_img" id="vehicle_img" class="form-control">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Kilometer Cost
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Kilometer Cost" name="km_cost" id="km_cost" class="form-control" value="<?php echo $rsedit['km_cost'];?>">
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
<script>
function funloadhotel(location_id)
{
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("divhotel").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ajaxhotel.php?location_id=" + location_id, true);
    xmlhttp.send();
}
</script>