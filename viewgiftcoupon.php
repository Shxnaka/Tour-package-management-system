<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM giftcoupon WHERE giftcouponid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Gift Coupon deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewgiftcoupon.php';</script>";
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
                    <h2>View Gift Coupon</h2>
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
			<th>Coupon code</th>
			<th>Coupon Detail</th>
			<th>Reason</th>
			<th>Coupon Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM giftcoupon LEFT JOIN customer ON giftcoupon.customer_id=customer.customer_id";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[customer_name]<br>$rs[address],<br>$rs[city] - $rs[pincode]<br>Ph. No. $rs[contact_no] ,<br> Email - $rs[email_id]</td>
			<td><b>$rs[couponcode]</b></td>
			<td>
			<b>Expires - </b> " . date("d-M-Y",strtotime($rs['expirydate'])) . "<br>
			<b>Discount - </b> " . $rs['discount_percentage'] . "%<br>
			<b>Max limit - </b> Rs. " . $rs['max_limit'] . "</td>
			<td>$rs[reason]</td>";
			if($rs['status'] == 'Active')
			{
			echo "<td>Unused</td>";
			}
			else
			{
			echo "<td>Redeemed</td>";
			}
		echo "<td>
			<a href='giftcoupon.php?editid=$rs[0]&customer_id=$rs[customer_id]' class='btn btn-info'>Edit</a>";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo "<A href='viewgiftcoupon.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a>";
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