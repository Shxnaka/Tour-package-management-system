 <?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM hotel WHERE hotel_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Hotel detail deleted successfully...');</script>";
		echo "<script>window.location='viewhotel.php';</script>";
	}
}
   ?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>View Hotel Records...</h2>
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
<table id="datatable" class="table table-striped table-bordered">

	<thead>
		<tr>
			<th>Location</th>
			<th>Hotel Name</th>
			<th>Hotel Type</th>
			<th>Hotel Address</th>
			<th>Status</th>
			<th>Others</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$sql ="select hotel.*,tourism_location.location_name from hotel LEFT JOIN tourism_location ON hotel.location_id=tourism_location.location_id";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlimg= "SELECT * FROM hotel_image WHERE hotel_id='$rs[0]'";
			$qsqlimg = mysqli_query($con,$sqlimg);
			$noimg =  mysqli_num_rows($qsqlimg);
			
			$sqlrtype= "SELECT * FROM room_type WHERE hotel_id='$rs[0]'";
			$qsqlrtype = mysqli_query($con,$sqlrtype);
			$nortype =  mysqli_num_rows($qsqlrtype);
			
			$sqlfac= "SELECT * FROM hotel_facility WHERE hotel_id='$rs[0]'";
			$qsqlfac = mysqli_query($con,$sqlfac);
			$noface =  mysqli_num_rows($qsqlfac);
			echo "<tr>
				<td>$rs[location_name]</td>
				<td>$rs[hotel_name]</td>
				<td>$rs[hotel_type]</td>
				<td>$rs[hotel_address],<br><b>PIN -</b> $rs[hotel_pincode]</td>
				<td style='width: 50px;'>$rs[status]</td>
				<td style='width: 50px;'><a href='viewhotelimage.php?hotel_id=$rs[0]' class='btn btn-success' target='_blank' style='background-color: #1b0f0f;width: 120px;'>Image ($noimg)</a> ";
		if($_SESSION['stafftype'] == "Administrator")
		{
			echo "<a href='viewhotelfacility.php?hotel_id=$rs[0]' class='btn btn-success' target='_blank' style='background-color: #d8036f;width: 120px;'>Facility ($noface)</a>";
			echo "<a href='viewroomtype.php?hotel_id=$rs[0]' class='btn btn-success' target='_blank' style='width: 120px;'>Room Type ($nortype)</a>";
		}
		echo "</td>
				<td style='width: 50px;'><a href='hotel.php?editid=$rs[0]' class='btn btn-warning' style='width: 65px;'>Edit</a> ";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo "
				<a href='viewhotel.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()' style='width: 65px;'>Delete</a> ";	
		}		
		echo "		
				<a href='hoteldetail.php?hotel_id=$rs[0]' class='btn btn-info' target='_blank' style='width: 65px;' >View</a>
				</td>
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
