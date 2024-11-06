<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM tourism_place WHERE tourism_placeid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Tourism Place deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewtourismplace.php';</script>";
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
                    <h2>View Tourism Place</h2>
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
			<th>Location</th>
			<th>Tourism Place</th>
			<th>Description</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT tourism_place.*,tourism_location.location_name FROM tourism_place LEFT JOIN tourism_location ON tourism_location.location_id=tourism_place.location_id";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
$sqlnoloc = "SELECT * FROM `gallery` WHERE tourism_placeid='$rs[0]'";
$qsqlnoloc = mysqli_query($con,$sqlnoloc);
$noloc = mysqli_num_rows($qsqlnoloc);
		echo "<tr>
			<td>$rs[location_name]</td>
			<td>$rs[tourism_place]</td>
			<td>$rs[description]</td>
			<td>$rs[status]</td>
			<td>
			<a href='tourism_place.php?editid=$rs[0]' class='btn btn-info'  style='width: 100%;'>Edit</a>	 ";
		if($_SESSION['stafftype'] == "Administrator")
		{
			echo "<A href='viewtourismplace.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()' style='width: 100%;'>Delete</a>";	
		}		
			echo "<a href='viewgallery.php?tourism_placeid=$rs[0]' class='btn btn-primary' style='width: 100%;'>Gallery ($noloc)</a><br>
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