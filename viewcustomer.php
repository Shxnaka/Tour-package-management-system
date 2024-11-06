<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM customer WHERE customer_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Customer deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewcustomer.php';</script>";
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
                    <h2>View Customer</h2>
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
			<th>Customer Name</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>Email ID</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM customer";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[customer_name]</td>
			<td>$rs[address],<br>$rs[city] - $rs[pincode]</td>
			<td>$rs[contact_no]</td>
			<td>$rs[email_id]</td>
			<td>$rs[status]</td>
			<td>
			<a href='customer.php?editid=$rs[0]' class='btn btn-info'>Edit</a>";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo "<A href='viewcustomer.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a>";
		}
			echo "</td></tr>";
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
function confirmdelete()
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