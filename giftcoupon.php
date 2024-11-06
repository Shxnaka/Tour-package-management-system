<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE giftcoupon SET customer_id='$_POST[customer_id]',couponcode='$_POST[couponcode]',expirydate='$_POST[expirydate]',discount_percentage='$_POST[discount_percentage]',max_limit='$_POST[max_limit]',status='$_POST[status]',reason='$_POST[reason]' WHERE giftcouponid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Gift Coupon detailes added..');</script>";
		}
	}
	else
	{
		$sql ="INSERT INTO giftcoupon (customer_id,couponcode,expirydate,discount_percentage,max_limit,status,reason) values('$_POST[customer_id]','$_POST[couponcode]','$_POST[expirydate]','$_POST[discount_percentage]','$_POST[max_limit]','Active','$_POST[reason]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Gift Coupon Generated successfully..');</script>";
			echo "<script>window.location='viewgiftcoupon.php';</script>";
		}	
	}
}
?>  
<?php
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM giftcoupon where giftcouponid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Gift Coupon Details </h2>

                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" onsubmit="return validateform()">
<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $_GET['customer_id']; ?>" >
<div class="row">
<!-- Hotel Destination Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_hotel_destination fancy-overlay">
		<div class="text">
			
<div class="row"> 
	<div class="col-md-12 boldfont">
                                    <div class="text">
<table class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Customer Name</th>
			<th>Address</th>
			<th>Contact Number</th>
			<th>Email ID</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM customer WHERE customer_id='$_GET[customer_id]'";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[customer_name]</td>
			<td>$rs[address],<br>$rs[city] - $rs[pincode]</td>
			<td>$rs[contact_no]</td>
			<td>$rs[email_id]</td></tr>";
	}
	?>
	</tbody>
</table><hr>

<div class="row">
	<div class="col-md-2 boldfont">
		Coupon Code
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter Coupon Code" name="couponcode" id="couponcode" class="form-control" value="<?php echo $rsedit['couponcode']; ?>"><span id="errcouponcode" class="errmsg flash"></span>
	</div>
</div><br>


<div class="row"> 
	<div class="col-md-2 boldfont">
		Expiry Date
	</div>
	<div class="col-md-10">
	<input type="date" placeholder="Select Date" name="expirydate" id="expirydate" class="form-control" value="<?php echo $rsedit['expirydate']; ?>"><span id="errexpirydate" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Discount Percentage
	</div>
	<div class="col-md-10">
		<input type="text" placeholder="Enter Discount Percentage" name="discount_percentage" id="discount_percentage" class="form-control" value="<?php echo $rsedit['discount_percentage']; ?>"><span id="errdiscount_percentage" class="errmsg flash"></span>
	</select>
	</div>
</div><br>



<div class="row"> 
	<div class="col-md-2 boldfont">
		Max limit
	</div>
	<div class="col-md-10">
		<input type="text" placeholder="Enter Max Limit" name="max_limit" id="max_limit" class="form-control" value="<?php echo $rsedit['max_limit'];?>"><span id="errpincode" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Reason
	</div>
	<div class="col-md-10">
		<textarea name="reason" id="reason" class="form-control" ><?php echo $rsedit['reason'];?></textarea>		
		<span id="errreason" class="errmsg flash"></span>
	</div>
</div><br>


<div class="row"> 
	<div class="col-md-2">
		
	</div>
	<div class="col-md-10">
		<input type="submit" name="submit" id="submit" class="form-control btn btn-warning" style="width: 250px;height:50px;" >
	</div>
</div><br>
</form>

	</div>
</div>
	
		</div>
	</div>
</div>
<!-- Hotel Destination End -->


						</div>
                    </div>
                </section>
            </div>
            <!-- Main Contant Wrap End -->
<?php
include("footer.php");
?>