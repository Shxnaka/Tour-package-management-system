<?php 
include("header.php");
$sql ="select hotel.*,tourism_location.location_name from hotel LEFT JOIN tourism_location ON hotel.location_id=tourism_location.location_id WHERE hotel.hotel_id='$_GET[hotel_id]'";
$qsql = mysqli_query($con,$sql);
$rs = mysqli_fetch_array($qsql);
?>
<!-- Sub Banner Start -->
<div class="mg_sub_banner">
	<div class="container">
		<h2><?php echo $rs['hotel_name']; ?></h2>
	</div>
</div>
<!-- Sub Banner End -->
<!-- iqoniq Contant Wrapper Start-->  
<div class="iqoniq_contant_wrapper">
	<section class="gray-bg aboutus-wrapper">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-sm-6">
					<div class="about-us">
						<!-- iqoniq Heading Start -->
						<div class="mg_hotel_hd1 text-left">
							<h6><?php echo $rs['hotel_type']; ?></h6>
							<h4><?php echo $rs['hotel_name']; ?></h4>
						</div>
						<!-- iqoniq Heading End -->
<div class="text">
	<p><?php echo $rs['hotel_description']; ?></p><hr>
	<a class="mg_btn1" href="hotel.php?editid=<?php echo $rs[0]; ?>">Edit Hotel</a>
</div>
					</div>
				</div>
				<div class="col-md-6 col-sm-6">
	<center><a class="mg_btn1" href="hotel_image.php?hotel_id=<?php echo $rs[0]; ?>">Upload Image</a>
	<a class="mg_btn1" href="viewhotelimage.php?hotel_id=<?php echo $rs[0]; ?>">View Image</a>
	</center>
					<div class="thumb">
<?php
	$sqlhotel_image ="SELECT hotel_image.*,room_type.room_type FROM hotel_image LEFT JOIN room_type ON hotel_image.room_typeid=room_type.room_typeid WHERE hotel_image.hotel_id='$_GET[hotel_id]'";
	$qsqlhotel_image =mysqli_query($con,$sqlhotel_image);
	$rshotel_image = mysqli_fetch_array($qsqlhotel_image);
	if(file_exists("imghotel/".$rshotel_image['hotel_image']))
	{
	echo "<img src='imghotel/$rshotel_image[hotel_image]' alt=''>";
	}
?>
	
	</div>
				</div>
			</div>
		</div>
	</section>
	
<!-- Team Section Start -->
<section class="gray-bg">
<hr>
	<div class="container">
		<!-- iqoniq Heading Start -->
		<div class="mg_hotel_hd1">
	<center><a class="mg_btn1" href="room_type.php?hotel_id=<?php echo $rs[0]; ?>">Add Room Types</a>
	<a class="mg_btn1" href="viewroomtype.php?hotel_id=<?php echo $rs[0]; ?>">View Room Types</a>
	</center>
			<h4>Room Types</h4>
		</div>
		<!-- iqoniq Heading End -->
		<div class="row">
		
<?php
	$sqlroom_type ="SELECT * FROM room_type WHERE hotel_id='$_GET[hotel_id]'";
	$qsqlroom_type =mysqli_query($con,$sqlroom_type);
	while($rsroom_type = mysqli_fetch_array($qsqlroom_type))
	{
?>
<!-- Team Thumb Start -->
<div class="col-md-4 col-sm-6">
	<div class="iq-team fancy-overlay">
		<figure>
			<img src="imgroomtype/<?php $rsroom_type['sd']; ?>" alt="">
		</figure>
		<div class="text">
			<h5 class="team-heading"><a href="#"><?php echo $rsroom_type['room_type']; ?></a></h5>
			<span class="designation"><?php echo $rsroom_type['max_adults']; ?> Adults, <?php  echo $rsroom_type['max_children']; ?> Children</span>
			<ul class="mg_social">
			   <li>Cost - Rs. <?php echo $rsroom_type['cost']; ?></li> 
			</ul>
		</div>
	</div>
</div>
<!-- Team Thumb End -->

<?php
	}
?>
		</div>
	</div>
</section>
<!-- Team Section End -->


	<!-- Services Section Start -->
	<section>
		<div class="container">
			<!-- iqoniq Heading Start -->
			<div class="mg_hotel_hd1">
				<h6>Know More About Hotel</h6>
				<h4>Following facilities offered...</h4>
			</div>
			<!-- iqoniq Heading End -->
			<div class="row">
<?php
	$sqlhotel_facility ="SELECT  hotel_facility.*,room_type.room_type FROM hotel_facility LEFT JOIN room_type ON hotel_facility.room_typeid=room_type.room_typeid  WHERE hotel_facility.hotel_id='$_GET[hotel_id]'";
	$qsqlhotel_facility =mysqli_query($con,$sqlhotel_facility);
	echo mysqli_error($con);
	while($rshotel_facility = mysqli_fetch_array($qsqlhotel_facility))
	{
?>			
				<!-- iqoniq Travel Services Start -->
				<div class="col-md-4 col-sm-6">
					<div class="mg_services">
					<img src="imgfacility/<?php echo $rshotel_facility['facility_img']; ?>" style="width: 100%; height: 200px;">
						<h5><a href="#"><?php echo $rshotel_facility['facility_type']; ?></a></h5>
						<label><?php echo $rshotel_facility['room_type']; ?>&nbsp;</label>
					</div>
				</div>
				<!-- iqoniq Travel Services End -->
<?php
	}
?>
			</div>
		</div>
	</section>
	<!-- Services Section End -->
	
	<!-- Pricing Table Section Start-->
	<section class="pricing_wrap">
		<div class="container">
			<!-- iqoniq Heading Start -->
			<div class="mg_hotel_hd1">	
			
<center><a class="mg_btn1" href="room_type.php?hotel_id=<?php echo $rs[0]; ?>">Add Room Types</a><a class="mg_btn1" href="viewroomtype.php?hotel_id=<?php echo $rs[0]; ?>">View Room Types</a></center>
				<h4>Room Types</h4>
			</div>
			<!-- iqoniq Heading End -->
			<div class="row">
<?php
	$sqlroom_type ="SELECT * FROM room_type WHERE hotel_id='$_GET[hotel_id]'";
	$qsqlroom_type =mysqli_query($con,$sqlroom_type);
	while($rsroom_type = mysqli_fetch_array($qsqlroom_type))
	{
?>
				<div class="col-md-4 col-sm-6">
					<!-- iqoniq Pricing Table Start -->
					<div class="mg_pricing fancy-overlay">
						<div class="thumb">
<?php
if(file_exists("imghotel/".$rshotel_image['hotel_image']))
{
echo "<img src='imghotel/$rshotel_image[hotel_image]' alt='' style='width: 360px;height: 220px;'>";
}
?>
							<div class="caption">
							<?php
							/*
								<div class="rating_down">
									<div class="rating_up" style="width:0%;"></div>
								</div>
							*/
							?>
								<div class="clear"></div>
								<strong><?php echo $rsroom_type['room_type']; ?></strong>
								<p><?php echo $rsroom_type['max_adults']; ?> Adults, <?php  echo $rsroom_type['max_children']; ?> Children</p>
								<b>Rs. <?php echo $rsroom_type['cost']; ?></b>
							</div>
						</div>
						<div class="text">
							<h6><a href="#"><?php echo $rsroom_type['room_type']; ?></a></h6>
							<a class="mg_btn1" href="#">Book Room</a>
						</div>
					</div>
					<!-- iqoniq Pricing Table End -->
				</div>
<?php
	}
?>

			</div>
		</div>
	</section>
	<!-- Pricing Table Section End-->
</div>
<!-- iqoniq Contant Wrapper End-->  
<?php
include("footer.php");
?>
