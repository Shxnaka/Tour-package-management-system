<?php
include("databaseconnection.php");
?>
<span><label>Room Type</label></span>
						    	<span><select name="room_typeid" id="room_typeid" class="form-control">
								<option value="">Select</option>
								<?php
	//This program links primary key to foreign key
	//Select record from room_type
	$sqlroomtype = "SELECT * FROM room_type WHERE hotel_id='$_GET[hotelid]'";
	$qsqlroomtype = mysqli_query($con,$sqlroomtype);
	while($rsroomtype = mysqli_fetch_array($qsqlroomtype))
	{
		//if statement executes in the update statement
		if($rsroomtype['room_typeid'] == $rsedit['room_typeid'])
		{
			echo "<OPTION selected value='$rsroomtype[room_typeid]'>$rsroomtype[room_type]</option>";
		}
		//else statement executes in the else statement
		else
		{
			echo "<OPTION value='$rsroomtype[room_typeid]'>$rsroomtype[room_type]</option>";
		}
	}
	?>
								</select></span>