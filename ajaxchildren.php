<?php
include("databaseconnection.php");
$sqlroomtype ="SELECT * FROM room_type where room_typeid='$_GET[room_type]'";
$qsqlroomtype = mysqli_query($con,$sqlroomtype);
$rsroomtype = mysqli_fetch_array($qsqlroomtype);
?>
<div id="divchildren">
	<select id="children" name="children"  class="mg_selectric" >
		<option value="">Children</option>
		<?php
		if(mysqli_num_rows($qsqlroomtype) >= 1)
		{
			for($i=0; $i<= $rsroomtype['max_children'];$i++)
			{
				if($i == $_GET['children'])
				{
					echo "<option value='$i' selected>$i</option>";
				}
				else
				{
					echo "<option value='$i' >$i</option>";
				}
			}
		}
		?>
	</select>
</div>