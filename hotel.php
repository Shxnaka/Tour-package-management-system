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
		$sql = "UPDATE hotel SET location_id='$_POST[location_id]',hotel_name='$_POST[hotel_name]',hotel_type='$_POST[hotel_type]',hotel_description='$_POST[hotel_description]',hotel_address='$_POST[hotel_address]',hotel_map='$_POST[hotel_map]',hotel_pincode='$_POST[hotel_pincode]',hotel_policies='$_POST[hotel_policies]',status='$_POST[status]' WHERE hotel_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Hotel record updated successfully..');</script>";
		}
	}
	else
	{
		$sql ="INSERT INTO hotel(hotel_id,location_id,hotel_name,hotel_type,hotel_description,hotel_address,hotel_map,hotel_pincode,hotel_policies,status) values('$_POST[hotel_id]','$_POST[location_id]','$_POST[hotel_name]','$_POST[hotel_type]','$_POST[hotel_description]','$_POST[hotel_address]','$_POST[hotel_map]','$_POST[hotel_pincode]','$_POST[hotel_policies]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Hotel Record inserted..');</script>";
			echo "<script>window.location='hotel.php';</script>";
		}
	}
}
?>
<?php
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM hotel  WHERE hotel_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Add Hotel</h2>
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
		Hotel Location
	</div>
	<div class="col-md-10">
<select name="location_id" id="location_id" class="form-control">
	<option value="">Select the place</option>
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
		Hotel Name
	</div>
	<div class="col-md-10">
	<input type="text" name="hotel_name" id="hotel_name" class="form-control" value="<?php echo $rsedit['hotel_name']; ?>">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Hotel Type
	</div>
	<div class="col-md-10">
	<select name="hotel_type" id="hotel_type" class="form-control">
		<option value="">Select the hotel type</option>
		<?php
		$arr = array("Resort","Guesthouse","Villa","Cottage","Apartment","Homestays","Hotel");
		foreach($arr as $val)
		{
			if($val == $rsedit['hotel_type'])
			{
			echo "<option value='$val' selected >$val</option>";
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
	<div class="col-md-2 boldfont">
		Hotel Description
	</div>
	<div class="col-md-10">
	<textarea type="text" name="hotel_description" id="hotel_description" class="form-control" ><?php echo $rsedit['hotel_description']; ?></textarea>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Address
	</div>
	<div class="col-md-10">
	<textarea type="text" name="hotel_address" id="hotel_address" class="form-control"><?php echo $rsedit['hotel_address'];?></textarea>
	</div>
</div><br>


<div class="row"> 
	<div class="col-md-2 boldfont">
		Pincode
	</div>
	<div class="col-md-10">
	<input type="text" name="hotel_pincode" id="hotel_pincode" class="form-control" value="<?php echo $rsedit['hotel_pincode']; ?>">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Map
	</div>
	<div class="col-md-10">
	<textarea type="text" name="hotel_map" id="hotel_map" class="form-control"><?php echo $rsedit['hotel_map'];?></textarea>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Hotel Policies
	</div>
	<div class="col-md-10">
	<textarea name="hotel_policies" id="hotel_policies" class="form-control"><?php echo $rsedit['hotel_policies'];?></textarea>
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
