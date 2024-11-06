<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM room_type WHERE room_typeid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Room Type deatils deleted successfully...');</SCRIPT>";
		//echo "<script>window.location='viewroomtype.php';</script>";
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
                    <h2>View Room Type - <?php echo $rshotel['hotel_name']; ?></h2>
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
                                    <div class="text"><a href='room_type.php?hotel_id=<?php echo $_GET['hotel_id']; ?>' class='btn btn-success' target='_blank'>Add Room Type</a>
<hr>	
<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Room Type</th>
			<th>Max Adults</th>
			<th>Max Children</th>
			<th>No. of Rooms</th>
			<th>Cost</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM room_type WHERE hotel_id='$_GET[hotel_id]'";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[room_type]</td>
			<td>$rs[max_adults]</td>
			<td>$rs[max_children]</td>
			<td>$rs[available_rooms]</td>
			<td>$rs[cost]</td>
			<td>$rs[status]</td>
			<td>
			<a href='room_type.php?editid=$rs[0]&hotel_id=$rs[hotel_id]' class='btn btn-info'>Edit</a> ";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo " | 
			
			<A href='viewroomtype.php?delid=$rs[0]&hotel_id=$rs[hotel_id]' class='btn btn-danger' onclick='return confirmdel()'>Delete</a>";	
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