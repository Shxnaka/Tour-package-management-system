<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM food_order WHERE food_order_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Food order deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewfoodorder.php';</script>";
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
                    <h2>View Food Order</h2>
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
			<th>Room Booking Id</th>
			<th>Item Id</th>
			<th>Customer Id</th>
			<th>Item Cost</th>
			<th>Quantity</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM food_order";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[room_booking_id]</td>
			<td>$rs[item_id]</td>
			<td>$rs[customer_id]</td>
			<td>$rs[item_cost]</td>
			<td>$rs[qty]</td>
			<td>$rs[status]</td>
			<td>
			<a href='food_order.php?editid=$rs[0]' class='btn btn-info'>Edit</a> ";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo "
			
			<A href='viewfoodorder.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()'>Delete</a>";	
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