<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM tourism_location WHERE location_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Tourism Loaction deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewtourismlocation.php';</script>";
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
                    <h2>View Tourism Loaction</h2>
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
<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Location Image</th>
			<th style="width: 250px;">Location Name</th>
			<th>Description</th>
			<th style="width: 100px;">Status</th>
			<th style="width: 70px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM tourism_location";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqlnoloc = "SELECT * FROM `tourism_place` WHERE status='Active' AND location_id='" . $rs['location_id'] . "'";
		$qsqlnoloc = mysqli_query($con,$sqlnoloc);
		$noloc = mysqli_num_rows($qsqlnoloc);
		if($rs['location_img'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists("imglocation/" . $rs['location_img']))
		{
			$img = "imglocation/" . $rs['location_img'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}
		echo "<tr>
			<td style='width: 100px;'><img src='$img' style='width: 125px; height: 75px;' ></td>
			<td><b>$rs[location_name]</b><br> ($noloc Locations)</td>
			<td>$rs[description]</td>
			<td>$rs[status]</td>
			<td>
			<a href='tourism_location.php?editid=$rs[0]' class='btn btn-info' style='width: 100%;margin-bottom: 5px;' >Edit</a>";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo "  <A href='viewtourismlocation.php?delid=$rs[0]' class='btn btn-danger' style='width: 100%;' onclick='return confirmdel()'>Delete</a>";	
		}		
		echo "	</td></tr>";
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