<?php
include("header.php");
$sql = "SELECT * FROM hotel LEFT JOIN tourism_location ON hotel.location_id = tourism_location.location_id WHERE hotel_id='$_GET[hotelid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$rs = mysqli_fetch_array($qsql);

$sqlhotel_image = "SELECT * FROM hotel_image WHERE hotel_id='$_GET[hotelid]'";
$qsqlhotel_image = mysqli_query($con,$sqlhotel_image);
$rshotel_image = mysqli_fetch_array($qsqlhotel_image);
$checkin = strtotime($_GET['checkin']);
$checkout = strtotime($_GET['checkout']);
$datediff = $checkout - $checkin;
$nodays = round($datediff / (60 * 60 * 24));
$nodays = $nodays +1;
if($rscustomerprofile['address'] == "")
{
	echo "<script>alert('Kindly update your profile..');</script>";
	echo "<script>window.location='customerprofile.php';</script>";
}
?>

                <!-- Pricing Table Section Start-->
                <section class="pricing_wrap">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h4>Review Your Booking</h4>
                        </div>
                        <!-- iqoniq Heading End -->
						
<div class="row">

	<div class="col-md-4 col-sm-3">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="thumb">
				<img src="imglocation/<?php echo $rs['location_img']; ?>" alt="">
				<div class="caption">
				<?php
				/*
					<div class="rating_down">
						<div class="rating_up" style="width:50%;"></div>
					</div>
				*/
				?>
					<div class="clear"></div>
					<h6><?php echo $rs['location_name']; ?></h6>
				</div>
			</div>
			<div class="text"  style="height: 250px;overflow: auto;">
				<p><?php echo strip_tags($rs['description']); ?></p>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
		
<?php
	$i =0;
	$sqlroomtype ="SELECT * FROM room_type where room_type.status='Active' AND room_type.hotel_id='$_GET[hotelid]'  ";
	if($_GET['room_type'])
	{
	$sqlroomtype = $sqlroomtype . " AND room_typeid='$_GET[room_type]'";
	}
	//echo $sqlroomtype;
	$qsqlroomtype = mysqli_query($con,$sqlroomtype);
	while($rsroomtype = mysqli_fetch_array($qsqlroomtype))
	{
		$sqlroomtypeimg ="SELECT * FROM hotel_image where status='Active' AND room_typeid='$rsroomtype[0]'";
		$qsqlroomtypeimg = mysqli_query($con,$sqlroomtypeimg);
		$rsroomtypeimg = mysqli_fetch_array($qsqlroomtypeimg);
		
		if(mysqli_num_rows($qsqlroomtypeimg) == 0)
		{
			$imgname = "images/noimage.png";
		}
		else
		{
			if(file_exists("imghotel/$rsroomtypeimg[hotel_image]"))
			{
				$imgname = "imghotel/$rsroomtypeimg[hotel_image]";				
			}
			else
			{
				$imgname = "images/noimage.png";
			}
		}
?>
  
	<div class="col-md-4 hidden-sm">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="thumb">
				<img src="<?php echo $imgname; ?>"  style="height: 250px;">
				<div class="caption">
					<div class="clear"></div>
					<h6><?php echo $rs['hotel_name']; ?></h6>
					<b><?php echo $rs['hotel_type']; ?></b>
				</div>
			</div>
			<div class="text" style="height: 250px;">
				<h6><a href="#"><?php echo $rs['hotel_name']; ?> </a></h6>
				<p><?php echo $rs['hotel_address']; ?>, <?php echo $rs['location_name']; ?><br> <b>PIN</b> : <?php echo $rs['hotel_pincode']; ?> </p>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
<?php
	}
?>	
<?php
	$i =0;
	$sqlroomtype ="SELECT * FROM room_type where room_type.status='Active' AND room_type.hotel_id='$_GET[hotelid]'  ";
	if($_GET['room_type'])
	{
	$sqlroomtype = $sqlroomtype . " AND room_typeid='$_GET[room_type]'";
	}
	$qsqlroomtype = mysqli_query($con,$sqlroomtype);
	$rsroomtype = mysqli_fetch_array($qsqlroomtype);
	{
		$sqlroomtypeimg ="SELECT * FROM hotel_image where status='Active' AND room_typeid='$rsroomtype[0]'";
		$qsqlroomtypeimg = mysqli_query($con,$sqlroomtypeimg);
		$rsroomtypeimg = mysqli_fetch_array($qsqlroomtypeimg);
		
		if(mysqli_num_rows($qsqlroomtypeimg) == 0)
		{
			$imgname = "images/noimage.png";
		}
		else
		{
			if(file_exists("imghotel/$rsroomtypeimg[hotel_image]"))
			{
				$imgname = "imghotel/$rsroomtypeimg[hotel_image]";				
			}
			else
			{
				$imgname = "images/noimage.png";
			}
		}
?>
	<div class="col-md-4 hidden-sm">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="thumb">
				<img src="<?php echo $imgname; ?>" alt=""  style="height: 250px;">
				<div class="caption">
				<?php /*
					<div class="rating_down">
						<div class="rating_up" style="width:50%;"></div>
					</div>
					*/
				?>
					<div class="clear"></div>
					<h6><?php echo $rsroomtype['room_type']; ?></h6>
					<b><?php 
					if($_GET['adults'] == 1)
					{
					echo $_GET['adults'] . " Adult"; 
					}
					else
					{
						echo $_GET['adults'] . " Adults"; 
					}
					?></b>
					<b><?php 
					if($_GET['adults'] != 0)
					{
						if($_GET['adults'] == 1)
						{
							echo " and  ".$rsroomtype['max_children'] ." Child"; 
						}
						else
						{
							echo " and  ".$rsroomtype['max_children'] . " Children"; 
						}
					}
					?></b>
				</div>
			</div>
			<div class="text"  style="height: 250px;">
				<h6><a href="#">Facilities </a></h6>
				<p>	<?php
	$hotelfacility = "";
	$sqlhotel_facility ="SELECT * FROM hotel_facility where  room_typeid='$rsroomtype[0]'";
	$qsqlhotel_facility = mysqli_query($con,$sqlhotel_facility);
	while($rshotel_facility = mysqli_fetch_array($qsqlhotel_facility))
	{
		$hotelfacility =  $hotelfacility . $rshotel_facility['facility_type'] . ",";
	}
	echo rtrim($hotelfacility,", ");
	?></p>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
<?php
	}
?>

</div>
						
						
                    </div>

                    <div class="container">


<div class="row">
	<div class="col-md-12">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="text">
				<h6><a href="#"><?php echo $rs['hotel_name']; ?> </a></h6>
				<p><?php echo $rs['hotel_address']; ?>, <?php echo $rs['location_name']; ?><br> <b>PIN</b> : <?php echo $rs['hotel_pincode']; ?> </p>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
</div>



<div class="row">
	<div class="col-md-12">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="text">
				<h2 style="color:#32A2E3;"> Tariff details<hr></h2>
				<table class="table table-striped table-bordered">
					<tr>
						<th>Cost per day</th><th>Rs. <?php echo $rsroomtype['cost']; ?></th>
					</tr>
					<tr>
						<th>No. of days</th><th><?php 
if($nodays == 1 )
{
	echo $nodays . " Day"; 
}
else
{
	echo $nodays . " Days"; 
} 
?></th>
					</tr>
					<tr>
						<th>Total Cost</th><th>Rs. <?php echo $rsroomtype['cost'] * $nodays; ?></th>
					</tr>
				</table>
				<hr>
					<p><b>Hotel policies:</b><br>
					<?php echo $rs['hotel_policies']; ?>,</p>
				<hr>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
</div>

<div class="row">

	<div class="col-md-4 col-sm-4">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="text">
<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:grey;">Check In <br><?php echo date("d-M-Y",strtotime($_GET['checkin'])); ?> <?php echo date("h:i A",strtotime($_GET['checkintime'])); ?></button>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
		
	<div class="col-md-4 col-sm-4">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="text">

<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:grey;">Check Out <br><?php echo date("d-M-Y",strtotime($_GET['checkout'])); ?> <?php echo date("h:i A",strtotime($_GET['checkouttime'])); ?></button>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
		
	<div class="col-md-4 col-sm-4">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay">
			<div class="text">

<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:grey;"><?php 
if($nodays == 1 )
{
	echo $nodays . " Day"; 
}
else
{
	echo $nodays . " Days"; 
}
 ?></button>
			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- iqoniq Pricing Table Start -->
		<div class="mg_pricing fancy-overlay ">
			<div class="text">

   <div  style="cursor:default;height: 300px;" class="list-group-item" >
<div class="box ng-scope" ng-controller="productTravellerController" >
    <div class="box-content">
      
	  <?php
	  if(isset($_SESSION['customer_id']))
	  {
	  ?>
	<form method="post" action="hotelbookingpayment.php?hotelid=<?php echo $_GET['hotelid']; ?>&room_type=<?php echo $_GET['room_type']; ?>&adults=<?php echo $_GET['adults']; ?>&children=<?php echo $_GET['children']; ?>&checkin=<?php echo $_GET['checkin']; ?>&checkout=<?php echo $_GET['checkout']; ?>&btnsearch=<?php echo $_GET['btnsearch']; ?>&checkintime=<?php echo $_GET['checkintime']; ?>&checkouttime=<?php echo $_GET['checkouttime']; ?>">
		<h3>Enter Traveller Details </h3>
		  <div class="col-md-6" style="text-align: left;">
			Name : <input type="text" name="name" class="form-control" value="<?php echo $rscustomerprofile['customer_name']; ?>" >
		  </div> 
		  <div class="col-md-6" style="text-align: left;">
			Contact No. : <input type="text" name="contactnumber" class="form-control" value="<?php echo $rscustomerprofile['contact_no']; ?>">
		  </div>
		  <div class="col-md-12" style="text-align: left;">
			<hr>Any Note : 
			<textarea class="form-control" name="note"></textarea>
		  <hr>
		  </div>
		  <div class="col-md-12">
			<center><input type="submit" class="btn btn-info" value="Click here to Continue" ></center>
		  </div>
</form>	  
	  <?php
	  }
	  else
	  {
		?>
			<h3>Enter Traveller Details </h3
			<div class="col-md-12">
				New Customer
				<input type="submit" class="form-control" value="Click here to Register" style="width:200px;" onclick="window.location='customerregistration.php?hotelid=<?php echo $_GET['hotelid']; ?>&room_type=<?php echo $_GET['room_type']; ?>&adults=<?php echo $_GET['adults']; ?>&children=<?php echo $_GET['children']; ?>&checkin=<?php echo $_GET['checkin']; ?>&checkout=<?php echo $_GET['checkout']; ?>&checkintime=<?php echo $_GET['checkintime']; ?>&checkouttime=<?php echo $_GET['checkouttime']; ?>&btnsearch=<?php echo $_GET['btnsearch']; ?>';" >
				<hr>
			</div>
			  
			<div class="col-md-12">
			Existing customer
				<input type="submit" class="form-control" value="Click here to Login" style="width:200px;" onclick="window.location='customerlogin.php?hotelid=<?php echo $_GET['hotelid']; ?>&room_type=<?php echo $_GET['room_type']; ?>&adults=<?php echo $_GET['adults']; ?>&children=<?php echo $_GET['children']; ?>&checkin=<?php echo $_GET['checkin']; ?>&checkout=<?php echo $_GET['checkout']; ?>&checkintime=<?php echo $_GET['checkintime']; ?>&checkouttime=<?php echo $_GET['checkouttime']; ?>&btnsearch=<?php echo $_GET['btnsearch']; ?>'" >
			</div>
		<?php
	  }
	  ?>
    </div>   
</div>
          </div>

			</div>
		</div>
		<!-- iqoniq Pricing Table End -->
	</div>
</div>


				
                    </div>
                </section>
                <!-- Pricing Table Section End-->



<style>
/*
essential styles:
these make the slideshow work
*/
#slides{
	position: relative;
	height: 350px;
	padding: 0px;
	margin: 0px;
	list-style-type: none;
}

.slide{
	position: absolute;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	opacity: 0;
	z-index: 1;

	-webkit-transition: opacity 1s;
	-moz-transition: opacity 1s;
	-o-transition: opacity 1s;
	transition: opacity 1s;
}

.showing{
	opacity: 1;
	z-index: 2;
}
/*
non-essential styles:
just for appearance; change whatever you want
*/

.slide{
	font-size: 40px;
	padding: 4px;
	box-sizing: border-box;
	background: #333;
	color: #fff;
}

.slide:nth-of-type(1){
	background: red;
}
.slide:nth-of-type(2){
	background: orange;
}
.slide:nth-of-type(3){
	background: green;
}
.slide:nth-of-type(4){
	background: blue;
}
.slide:nth-of-type(5){
	background: purple;
}
</style>
<script>
var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,2000);

function nextSlide(){
	slides[currentSlide].className = 'slide';
	currentSlide = (currentSlide+1)%slides.length;
	slides[currentSlide].className = 'slide showing';
}
</script>


<?php
include("footer.php");
?>

<style>
a.list-group-item {
    height:auto;
    min-height:220px;
}
a.list-group-item.active small {
    color:#fff;
}
.stars {
    margin:20px auto 1px;    
}
</style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">