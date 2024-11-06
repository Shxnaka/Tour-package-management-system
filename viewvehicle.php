<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM vehicle_type WHERE vehicle_typeid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Vehicle detail deleted successfully...');</script>";
		echo "<script>window.location='viewvehicle.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
   ?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Vehicle Details</h2>
                    <ul class="breadcrumb">
                        <li><a href="#">home</a></li>
                        <li class="active"><span>About Us</span></li>
                    </ul>
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
                                    <!-- iqoniq Heading Start -->
                                    <div class="mg_hotel_hd1 text-left">
                                        <h4>Vehicle Details</h4>
                                    </div>
                                    <!-- iqoniq Heading End -->
                                    <div class="text">
<table id="datatable" class="table table-striped table-bordered">

	<thead>
		<tr>
			<th>Vehicle image</th>
			<th>Location</th>
			<th>Hotel</th>
			<th>Vehicle type</th>
			<th>Cost per KM</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$sql ="select vehicle_type.*, tourism_location.location_name,hotel.hotel_name from vehicle_type LEFT JOIN tourism_location ON vehicle_type.location_id=tourism_location.location_id LEFT JOIN hotel ON hotel.hotel_id=vehicle_type.hotel_id";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
		if($rs['vehicle_img'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists('imgvehicletype/'.$rs['vehicle_img']))
		{
			$img = 'imgvehicletype/'.$rs['vehicle_img'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}
			echo "
			<tr>
				<td style='width: 200px;'><img src='$img' style='width: 200px;height: 150px;'></td>
				<td>$rs[location_name]</td>
				<td>$rs[hotel_name]</td>
				<td>$rs[vehicle_type]</td>
				<td>Rs. $rs[km_cost]/KM</td>
				<td>$rs[status]</td>
				<td style='width: 100px;'>		
				
				<a href='vehicle_type.php?editid=$rs[0]' class='btn btn-warning' style='width: 100%;margin-bottom: 10px;'>Edit</a><br>";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo " <a href='viewvehicle.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()' style='width: 100%;'>Delete</a>";	
		}		
		echo "		</td>
			</tr>
			";			
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