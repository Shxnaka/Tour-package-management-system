<?php
include("databaseconnection.php");
$sqlroomtype ="SELECT * FROM room_type where room_typeid='$_GET[room_type]'";
$qsqlroomtype = mysqli_query($con,$sqlroomtype);
$rsroomtype = mysqli_fetch_array($qsqlroomtype);
?>
<div id="divadults">
<select id="adults" name="adults"  class="mg_selectric" style="height:50px;">
	<option value="">Adults</option>
	<?php
	for($i=1; $i<=$rsroomtype['max_adults'];$i++)
	{
		if($i == $_GET['adults'])
		{
			echo "<option value='$i' selected>$i</option>";
		}
		else
		{
			echo "<option value='$i' >$i</option>";
		}
	}
	?>
</select>
</div>	