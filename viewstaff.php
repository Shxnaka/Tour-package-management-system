<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM staff WHERE staffid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Staff record deleted successfully...');</script>";
		echo "<script>window.location='viewstaff.php';</script>";
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
                    <h2>Staff Details</h2>
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
                                        <h4>Staff Details</h4>
                                    </div>
                                    <!-- iqoniq Heading End -->
                                    <div class="text">
<table id="datatable" class="table table-striped table-bordered">

	<thead>
		<tr>
			<th>Staff name</th>
			<th>Staff Type</th>
			<th>Login id</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$sql ="select * from staff";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "
			<tr>
				<td>$rs[staffname]</td>
				<td>$rs[stafftype]</td>
				<td>$rs[loginid]</td>
				<td>$rs[status]</td>
				<td> 
				
				<a href='staff.php?editid=$rs[0]' class='btn btn-warning'>Edit</a> 
				
				| 
				
				<a href='viewstaff.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()'>Delete</a>
				
				</td>
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