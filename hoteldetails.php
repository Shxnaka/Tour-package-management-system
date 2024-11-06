<?php
include("header.php");
$sql = "SELECT * FROM hotel LEFT JOIN tourism_location ON hotel.location_id = tourism_location.location_id WHERE hotel_id='$_GET[hotelid]'";
$qsql = mysqli_query($con,$sql);
$rshotelrec = mysqli_fetch_array($qsql);
$sqltourism_location ="SELECT * FROM tourism_location WHERE status='Active' AND location_id='$rshotelrec[location_id]'";
$qsqltourism_location =mysqli_query($con,$sqltourism_location);
$rstourism_location = mysqli_fetch_array($qsqltourism_location);		
if($rstourism_location['location_img'] == "")
{
	$img = "images/nophoto.jpg";
}
else if(file_exists("imglocation/" . $rstourism_location['location_img']))
{
	$img = "imglocation/" . $rstourism_location['location_img'];
}
else
{
	$img = "images/nophoto.jpg";
}
$imglink = $img;
?> 
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2><?php echo $rshotelrec['hotel_name']; ?> - <?php echo strtoupper($rstourism_location['location_name']); ?></h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
			
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Room Detail Wrap Start -->
                                <div class="mg_room_detail_wrap">
<!-- Room Slider Start -->
<div class="room-slider-wrap">
	<div class="room-slider">
	<?php
	$sql ="SELECT hotel_image.*,room_type.room_type FROM hotel_image LEFT JOIN room_type ON hotel_image.room_typeid=room_type.room_typeid WHERE hotel_image.hotel_id='" . $_GET['hotelid'] . "'";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['hotel_image'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists('imghotel/'.$rs['hotel_image']))
		{
			$img = 'imghotel/'.$rs['hotel_image'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}
	?>
		<figure><img src="<?php echo $img; ?>" alt="" style="height: 500px;"></figure>
	<?php
	}
	?>
	</div>
	<!-- Room Slider Start -->
	<!-- Room Slider Nav Start -->
	<div class="room-slider-nav">
	<?php
	$sql ="SELECT hotel_image.*,room_type.room_type FROM hotel_image LEFT JOIN room_type ON hotel_image.room_typeid=room_type.room_typeid WHERE hotel_image.hotel_id='$_GET[hotelid]'";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['hotel_image'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists('imghotel/'.$rs['hotel_image']))
		{
			$img = 'imghotel/'.$rs['hotel_image'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}
	?>
		<figure><img src="<?php echo $img; ?>" alt="" style="height: 100px;"></figure>
	<?php
	}
	?>
	</div>
	<!-- Room Slider Nav End -->
	
</div>
<!-- Room Slider End -->
<hr>
<!--############################################################################-->
<!-- iqoniq Search Wrapper Start-->
<div class="">
	<div class="">
		<div class="mg_blog_medium fancy-overlay">
			<!-- Nav tabs Start -->
			<ul class="mg_hotel_search" role="tablist">
				<li role="presentation" style="width: 100%;padding-left: 10px;"><a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Hotel Facilities</a></li>
			</ul>
			<!-- Nav tabs End -->
			<form method="get" action="" >
			<!-- Tab panes Start -->
			<div class="tab-content" style="padding: 20px;">
			<div class="row">
<?php
	$sqlhotel_facility ="SELECT  hotel_facility.*,room_type.room_type FROM hotel_facility LEFT JOIN room_type ON hotel_facility.room_typeid=room_type.room_typeid  WHERE hotel_facility.hotel_id='$_GET[hotelid]'";
	$qsqlhotel_facility =mysqli_query($con,$sqlhotel_facility);
	echo mysqli_error($con);
	while($rshotel_facility = mysqli_fetch_array($qsqlhotel_facility))
	{
?>
	<!-- iqoniq Travel Services Start -->
	<div class="col-md-4 col-sm-6">
		<div class="mg_services">
		<img src="imgfacility/<?php echo $rshotel_facility['facility_img']; ?>" style="width: 100%; height: 150px;">
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
			<!-- Tab panes End -->
			</form>
		</div>
	</div>
</div>
<!-- iqoniq Search Wrapper End-->
<!--############################################################################-->

                                </div>
                                <!-- Room Detail Wrap Start -->

<!-- Accordian Start -->
<div class="mg-accordion-wrap">
<?php 
//include("searchroomtype.php");
//include("looproomtypes.php"); 
?>
</div>
<!-- Accordian End -->
                            </div>
                            <!-- Sidebar Start-->
                            <div class="col-md-4">
                                <div class="mg_sidebar">
                                    <!-- Widget Contant Start-->
<h5 class="widget_default_title"><?php echo $rshotelrec['hotel_name']; ?></h5>
<p><?php echo $rshotelrec['hotel_description']; ?>.<hr></p>

<h4>Address</h4>
<?php echo $rshotelrec['hotel_address']; ?>,<br>
<?php echo $rshotelrec['location_name']; ?>,<br>
<b>PIN -</b><?php echo $rshotelrec['hotel_pincode']; ?>
<hr>
<?php echo $rshotelrec['hotel_map']; ?><br>
<hr>
<hr>
<b>Policies: </b>
<br><?php echo $rshotelrec['hotel_policies']; ?>
                                    <!-- Widget Contant End-->
                                </div>
                            </div>
                            <!-- Side Bar End-->
<hr>
<div class="col-md-12">
<?php include("searchroomtype.php"); ?>
</div>
<div class="col-md-12">
	<!-- Pricing Table Section Start-->
	<section class="pricing_wrap">
		<div class="" style="padding-left: 10px; padding-right: 10px;">
			<!-- iqoniq Heading Start -->
			<div class="mg_hotel_hd1">	
				<h4>Room Types</h4>
			</div>
			<!-- iqoniq Heading End -->
			<div class="row">
<?php
	$sqlroom_type ="SELECT * FROM room_type WHERE hotel_id='$_GET[hotelid]' AND status='Active' ";
	if(isset($_GET['room_type']))
	{
		$sqlroom_type = $sqlroom_type . " AND room_typeid='$_GET[room_type]'";
	}
	$qsqlroom_type =mysqli_query($con,$sqlroom_type);
	while($rsroom_type = mysqli_fetch_array($qsqlroom_type))
	{
		$sqlhotel_image ="SELECT * FROM hotel_image WHERE room_typeid='$rsroom_type[0]'";
		$qsqlhotel_image =mysqli_query($con,$sqlhotel_image);
		$rshotel_image = mysqli_fetch_array($qsqlhotel_image);		
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
<?php
if(isset($_SESSION['customer_id']))
{
?>
<?php
	$sqlroom_booking = "SELECT * FROM room_booking WHERE room_typeid='$rsroom_type[0]' AND (('$_GET[checkin]' BETWEEN check_in AND check_out)  OR ('$_GET[checkout]' BETWEEN check_in AND check_out))  AND status='Active'";
	$qsqlsqlroom_booking=mysqli_query($con,$sqlroom_booking);
	echo mysqli_error($con);
	$noofbookings = mysqli_num_rows($qsqlsqlroom_booking);
	//echo $rsroom_type['available_rooms'];
	$noavailableroom = $rsroom_type['available_rooms'] - $noofbookings;
	if($noavailableroom >= 1 )
	{
?>
(No. of Rooms Available: <?php echo $noavailableroom; ?>)
<a class="mg_btn1" href="hotelbooking.php?location_id=<?php 
echo $_GET['location_id']; ?>&adults=<?php if(isset($_GET['adults']))
{
	echo $_GET['adults']; 
}
else
{
	echo $rsroom_type['max_adults'];
}
?>&children=<?php 						
if(isset($_GET['children']))
{
	echo $_GET['children'];
}
else
{
	echo $rsroom_type['max_children'];
}
?>&checkin=<?php 								
if(isset($_GET['checkin']))
{
	echo $_GET['checkin'];
}
else
{
	echo date("Y-m-d", strtotime('tomorrow'));
}
?>&checkout=<?php 
if(isset($_GET['checkout']))
{
	echo $_GET['checkout'];
}
else
{
	echo date("Y-m-d", strtotime('tomorrow'));
}
?>&hotelid=<?php echo $_GET['hotelid']; ?>&room_type=<?php echo $rsroom_type['room_typeid']; ?>&checkintime=<?php 
if(isset($_GET['checkintime']))
{
	echo $_GET['checkintime'];
}
else
{
	echo "12:30";
}
?>&checkouttime=<?php 
if(isset($_GET['checkouttime']))
{
	echo $_GET['checkouttime'];
}
else
{
	echo "12:30";
}
?>">Book Room</a>
<?php
	}
	else
	{
?>
<a class="mg_btn1" href="#">No Rooms Available</a>
<?php
	}
}
else
{
?>
<a class="mg_btn1" data-toggle="modal" data-target="#reg-box" href="#"><i class="fa fa-lock"></i><span>Login Or Register</span></a>
<?php
}
?>
							
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

							
                        </div>
                    </div>
                </section>
            </div>

<?php
include("feedback.php");
?>
<?php
include("footer.php");
?>