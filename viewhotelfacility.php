<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM hotel_facility WHERE hotel_facilityid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Gallery deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewhotelfacility.php?hotel_id=$_GET[hotel_id]';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
$sqlhotel ="select hotel.*,tourism_location.location_name from hotel LEFT JOIN tourism_location ON hotel.location_id=tourism_location.location_id WHERE hotel.hotel_id='$_GET[hotel_id]'";
$qsqlhotel = mysqli_query($con,$sqlhotel);
$rshotel = mysqli_fetch_array($qsqlhotel);
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>View Hotel facility  - <?php echo $rshotel['hotel_name']; ?></h2>
                </div>
            </div>
            <!-- Sub Banner End -->
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">
                <section class="gray-bg aboutus-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="about-us">
                                    <div class="text">
<a href='hotel_facility.php?hotel_id=<?php echo $_GET['hotel_id']; ?>' class='btn btn-success' target='_blank'>Add hotel Facility</a>
<hr>
<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Facility Image</th>
			<th>Facility type</th>
			<th>Room Type</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT  hotel_facility.*,room_type.room_type FROM hotel_facility LEFT JOIN room_type ON hotel_facility.room_typeid=room_type.room_typeid  WHERE hotel_facility.hotel_id='$_GET[hotel_id]'";
	$qsql =mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr><td style='width: 150px;' >";
		if($rs['facility_img'] == "")
		{
		}
		else if(file_exists("imgfacility/" . $rs['facility_img']))
		{
		echo "<img src='imgfacility/$rs[facility_img]' style='width: 150px;height:100px;'>";
		}
		echo "</td>";
		echo "<td>$rs[facility_type]</td>
		<td>$rs[room_type]</td>
			<td>$rs[status]</td>
			<td>
			<a href='hotel_facility.php?editid=$rs[0]&hotel_id=$_GET[hotel_id]' class='btn btn-info'>Edit</a> ";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo " | 
			
			<A href='viewhotelfacility.php?delid=$rs[0]&hotel_id=$_GET[hotel_id]' class='btn btn-danger' onclick='return confirmdel()'>Delete</a>";	
		}		
		echo "		</td>
		</tr>";
	}
	?>
	</tbody>
</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- iqoniq Contant Wrapper End-->  
<?php
include("footer.php");
?>
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>