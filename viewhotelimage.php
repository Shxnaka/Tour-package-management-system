<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM hotel_image WHERE hotel_imageid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Hotel image deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewhotelimage.php?hotel_id=" . $_GET['hotel_id'] . "';</script>";
	}
}
$sqlhotel ="select hotel.*,tourism_location.location_name from hotel LEFT JOIN tourism_location ON hotel.location_id=tourism_location.location_id WHERE hotel.hotel_id='" . $_GET['hotel_id'] . "'";
$qsqlhotel = mysqli_query($con,$sqlhotel);
echo mysqli_error($con);
$rshotel = mysqli_fetch_array($qsqlhotel);
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>View Hotel Image  - <?php echo $rshotel['hotel_name']; ?></h2>
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
<a href='hotel_image.php?hotel_id=<?php echo $_GET['hotel_id']; ?>' class='btn btn-success' target='_blank'>Upload Image</a>
<hr>						
<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Hotel image</th>
			<th>Room Type</th>
			<th>Image Description</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT hotel_image.*,room_type.room_type FROM hotel_image LEFT JOIN room_type ON hotel_image.room_typeid=room_type.room_typeid WHERE hotel_image.hotel_id='$_GET[hotel_id]'";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['hotel_image'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists('imghotel/'.$rs['hotel_image']))
		{
			$img = 'imghotel/'.$rs['hotel_image'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}
		echo "<tr>
			<td style='width: 160px;' ><img src='$img' style='width: 150;height: 125px;' ></td>
			<td>$rs[room_type]</td>
			<td>$rs[image_description]</td>
			<td>$rs[status]</td>
			<td> ";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo " <A href='viewhotelimage.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()'>Delete</a>";	
		}		
		echo "		
			
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