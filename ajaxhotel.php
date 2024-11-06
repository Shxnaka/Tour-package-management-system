<?php
error_reporting(0);
include("databaseconnection.php");
?>
<select name="hotel_id" id="hotel_id" class="form-control">
	<option value="">Select Hotel</option>
	<?php
	$sqlhotel = "SELECT * FROM hotel where status='Active'";
	if(isset($_GET['location_id']))
	{
		$sqlhotel = $sqlhotel . " AND location_id='$_GET[location_id]'";
	}
	else
	{
		$sqlhotel = $sqlhotel . " AND location_id='$rsedit[location_id]'";
	}
	$qsqlhotel = mysqli_query($con,$sqlhotel);
	while($rshotel = mysqli_fetch_array($qsqlhotel))
	{
		if($rshotel['hotel_id'] == $rsedit['hotel_id'])
		{
		echo "<option value='$rshotel[hotel_id]' selected>$rshotel[hotel_name]</option>";
		}
		else
		{
		echo "<option value='$rshotel[hotel_id]'>$rshotel[hotel_name]</option>";
		}
	}
	?>
</select>