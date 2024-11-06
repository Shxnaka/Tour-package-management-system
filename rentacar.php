<?php
include("header.php");
 $sqlpayment ="SELECT * FROM payment LEFT JOIN room_booking ON payment.room_booking_id=room_booking.room_booking_id where payment_id='$_GET[paymentid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
echo mysqli_error($con);
$rspayment = mysqli_fetch_array($qsqlpayment);
//echo $rspayment['room_booking_id'];
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner" style="background-image: url(images/rentacarkefalonia_by_safecarrental.png);">
		<div class="container">
			<center><h2>Rent a Car</h2></center>
		</div>
	</div>
<!-- Sub Banner Start -->

<!-- Main Contant Wrap Start -->
<div class="iqoniq_contant_wrapper">
	<section>
		<div class="container">
			<div class="row">
<?php	
$i=0;
	$sql = "SELECT * FROM vehicle_type WHERE status='Active' AND hotel_id='$rspayment[hotel_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['vehicle_img'] == "")
		{
				$imgname= "images/noimage.png";
		}
		else
		{
			if(file_exists("imgvehicletype/".$rs['vehicle_img']))
			{
				$imgname= "imgvehicletype/".$rs['vehicle_img'];
			}
			else
			{
				$imgname= "images/noimage.png";
			}
		}
?>
<!-- iqoniq Blog Medium Start -->
<div class="col-md-4 col-sm-6">
	<div class="mg_blog_medium fancy-overlay">
		<h6><a href="cabbooking.php?vehicle_typeid=<?php echo $rs[0]; ?>&paymentid=<?php echo $_GET['paymentid']; ?>"><?php echo $rs['vehicle_type']; ?></a></h6>
		<figure>
			<a href="cabbooking.php?vehicle_typeid=<?php echo $rs[0]; ?>&paymentid=<?php echo $_GET['paymentid']; ?>"><img src="<?php echo $imgname ; ?>" alt="<?php echo $rs['hotel_name']; ?>" style="height: 250px;"></a>
		</figure>
		<div class="text">
			<ul class="blog-meta-list">
				<li><a href="cabbooking.php?vehicle_typeid=<?php echo $rs[0]; ?>&paymentid=<?php echo $_GET['paymentid']; ?>"><i class="fa fa-calendar"></i><span>Cost : Rs. <?php echo $rs['km_cost']; ?>/KM</span></a></li>
			</ul><br>
			<hr>
			<div class="clear"></div>
			
<center><a class="mg_login_btn " href="cabbooking.php?vehicle_typeid=<?php echo $rs[0]; ?>&paymentid=<?php echo $_GET['paymentid']; ?>"><i class="fa fa-car"></i><span>Click Here to Book</span></a></center>
			
		</div>
	</div>
</div>
<!-- iqoniq Blog Medium End -->
<?php
	}
?>				
			</div>
		</div>
	</section>
</div>
<!-- Main Contant Wrap End -->
<?php
include("footer.php");
?>