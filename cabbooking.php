<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO cab_booking(vehicle_typeid,customer_id,booking_datetime,flocation,tlocation,total_km,cost,status) VALUES('$_GET[vehicle_typeid]','$_SESSION[customer_id]','$_POST[booking_date] $_POST[booking_time]','$_POST[flocation]','$_POST[tlocation]','$_POST[total_km]','$_POST[costperkm]','Pending')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		$insid = mysqli_insert_id($con);
		echo "<SCRIPT>alert('Cab Booking record inserted successfully..');</SCRIPT>";
		echo "<SCRIPT>window.location='cabbookingpayment.php?cab_bookingid=$insid&vehicle_typeid=$_GET[vehicle_typeid]&paymentid=$_GET[paymentid]';</SCRIPT>";			
	}
}
else
{
	$sql = "DELETE FROM cab_booking WHERE status='Pending'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
}
//2. Update - select record starts here
if(isset($_GET['editid']))
{
	$sqledit= "SELECT * FROM cab_booking WHERE cab_bookingid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
//2. Update - select record ends here
?>
<!-- Sub Banner Start -->
<div class="mg_sub_banner" style="background-image: url(images/rentacarkefalonia_by_safecarrental.png);">
	<div class="container">
		<center><h2>Rent a Car - Booking Detail</h2></center>
	</div>
</div>
<!-- Sub Banner Start -->

<!-- Main Contant Wrap Start -->
<div class="iqoniq_contant_wrapper">
	<section>
		<div class="container">
			<div class="row">
			
			

<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Hotel</th>
			<th>Room Type</th>
			<?php
			if(!isset($_SESSION['customer_id']))
			{
			?>
			<th>Customer</th>
			<?php
			}
			?>
			<th>Adult</th>
			<th>Children</th>
			<th>Check-in date</th>
			<th>Check-out date</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id LEFT JOIN tourism_location ON tourism_location.location_id=hotel.location_id WHERE room_booking.status='Active' AND payment.payment_id='$_GET[paymentid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		$room_booking_id = $rs['room_booking_id'];
		$hotelid=  $rs['hotel_id'];
		$_GET['hotel_id'] = $hotelid;
		$location_name = $rs['location_name'];
		$hotel_pincode = $rs['hotel_pincode'];
		$hotel_address= $rs['hotel_address'];
		echo "<input type='hidden' name='room_booking_id' value='$rs[room_booking_id]' >";
		$checkin = date("d-M-Y",strtotime($rs['check_in']));
		$checkout = date("d-M-Y",strtotime($rs['check_out']));
		$checkindt = date("Y-m-d",strtotime($rs['check_in']));
		$checkoutdt = date("Y-m-d",strtotime($rs['check_out']));
		echo "<tr>
			<td>$rs[hotel_name]</td>
			<td>$rs[room_type]</td>";
			if(!isset($_SESSION['customer_id']))
			{
		echo "<td>$rs[customer_name]</td>";
			}
		echo "<td>$rs[no_ofadults]</td>
			<td>$rs[no_ofchildren]</td>
			<td>$checkin</td>
			<td>$checkout</td>
		</tr>";
	}
	?>	
	</tbody>
</table>
<hr>
		
<div class="contact_left">

<div class="company_address">
		<h3>Vehicle information :</h3>
		<p>
		
		<?php
$i=0;
	$sql = "SELECT * FROM vehicle_type WHERE status='Active' AND vehicle_typeid='$_GET[vehicle_typeid]'";
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
<div class="row">
	<!-- Our Rooms Wrap Start-->
	<div class="col-md-12">
		<!-- iqoniq Blog Listing Start -->
		<div class="mg_blog_listing our-room fancy-overlay">
			<div class="thumb">
				<a href="cabbooking.php?vehicle_typeid=<?php echo $rs[0]; ?>"><img src="<?php echo $imgname ; ?>" style="height: 350px;width: 100%;"></a>
				<a class="mg_zoom_icon" href="cabbooking.php?vehicle_typeid=<?php echo $rs[0]; ?>"><i class="fa fa-search"></i></a>
			</div>
			<div class="text">
				<h5 class="blog_title"><a href="cabbooking.php?vehicle_typeid=<?php echo $rs[0]; ?>"><?php echo $rs['vehicle_type']; ?></a></h5>
				<ul class="blog-meta-list">
					<li><span>Cost : Rs. <?php echo $kmcost = $rs['km_cost']; ?>/KM</span></li>
				</ul>
				<div class="clear"></div>
			</div>
		</div>
		<!-- iqoniq Blog Listing Start -->
	</div>
	<!-- Our Rooms Wrap End-->
</div>
<?php
	}
?>		
		</p>		
   </div>
</div>


<div class="row">
	<!-- Our Rooms Wrap Start-->
	<div class="col-md-12">
		<!-- iqoniq Blog Listing Start -->
		<div class="mg_blog_listing our-room fancy-overlay"  style="padding: 20px;">

<h5 class="blog_title"><a href="#">Cab Booking detail...</a></h5>

	
<form method="post" action="" >
	<input type="hidden" name="pincode" id="pincode" value="<?php echo $hotel_pincode; ?>" >
<div class="row">
	<div class="col-md-6">
		<span><label>Booking Date</label></span>
		<span ><input name="booking_date" id="booking_date" type="date" class="form-control" value="<?php echo $rsedit['booking_date']; ?>" min="<?php
		echo $checkindt;
		?>" max="<?php echo $checkoutdt; ?>" onchange="funbooking_date(this.value,'<?php echo $dt; ?>')"></span>
	</div>
	<script>
	function funbooking_date(selecteddate,bookingdate)
	{
		if(selecteddate == bookingdate)
		{
			document.getElementById("divbooking_time").innerHTML = "<input name='booking_time' id='booking_time' type='time' class='form-control' min='<?php echo $tim; ?>'>";
		}
	}
	</script>
	<div class="col-md-6">
		<span><label>Booking Time</label></span>
		<span id="divbooking_time"><input name="booking_time" id="booking_time" type="time" class="form-control" value="<?php echo $rsedit['booking_time']; ?>" ></span>
	</div>
</div>
<div class="row">
<br>
	<div class="col-md-6"> 
		<span><label>From Location</label></span>
		<span><input name="flocation" id="flocation" type="text" class="form-control" value="<?php echo $hotel_address. "," .$location_name; ?>" readonly style="background-color:grey;color:white;"></span>
	</div>	
	<div class="col-md-6">
		<span><label>To Location</label></span>
		<span><input type="text" class="form-control" name="tlocation" id="txtPlaces" placeholder="Enter a location" /></span>
	</div>
</div>

<div class="row">
<br>
	<div class="col-md-6"> 
		<span><label>Cost / KM</label></span>
		<span><input type="text" class="form-control" name="costperkm" id="costperkm" placeholder="Enter a location" readonly  style="background-color:grey;color:white;" value="<?php echo $kmcost; ?>" /></span>
	</div>	
	<div class="col-md-6">
		<span><label>Total KM</label></span>
		<span><input name="total_km" id="total_km" type="text" class="form-control" readonly  style="background-color:grey;color:white;" ></span>
	</div>
</div>


<div class="row">
	<br>
	<div class="col-md-6"> 
		<span><label>Total Cost</label></span>
		<span><input name="cost" id="cost" type="text" class="form-control" value="<?php echo $rsedit['cost']; ?>" readonly style="background-color:grey;color:white;"></span>
	</div>	
	<div class="col-md-6">
	
	</div>
</div>
<hr>
   <div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4"><span><input type="submit" value="Click here to Book" name="submit" class="mg_login_btn" style="float: left;" ></span>
	</div>
	<div class="col-md-4"></div>
  </div>
</form>


		</div>
		<!-- iqoniq Blog Listing Start -->
	</div>
	<!-- Our Rooms Wrap End-->
</div>

			
			
<!-- #########################-->
			</div>
		</div>
	</section>
</div>
<!-- Main Contant Wrap End -->
<?php
include("footer.php");
?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyDfw0_7kqcCQafgu2fPbUzOjfpxffY82uE"></script>
<script type="text/javascript">
	google.maps.event.addDomListener(window, 'load', function () {
		var places = new google.maps.places.Autocomplete(document.getElementById('txtPlaces'));
		google.maps.event.addListener(places, 'place_changed', function () {
			var place = places.getPlace();
			var address = place.formatted_address;
			var latitude = place.geometry.location.lat();
			var longitude = place.geometry.location.lng();
			var mesg = "Address: " + address;
			mesg += "\nLatitude: " + latitude;
			mesg += "\nLongitude: " + longitude;
			funcalculatekm(latitude,longitude);
		});
	});
</script>
<script>
function funcalculatekm(latitude,longitude)
{
	var latitude = latitude;
	var longitude = longitude;
	var pincode  = $('#pincode').val();
	$.post("ajaxtotalkm.php",
	{
		latitude : latitude,
		longitude : longitude,
		pincode : pincode
	},
	function(data, status){
		document.getElementById('total_km').value=data;
		calculatetotalamount();
	});
}
function calculatetotalamount()
{
	var total_km = document.getElementById("total_km").value;
	var costperkm = document.getElementById("costperkm").value;
	if(total_km > 50)
	{
		alert("Maximum cab booking distance is 50KM...");
		document.getElementById("cost").value = "";
	}
	else
	{
		document.getElementById("cost").value  = parseFloat(total_km) * parseFloat(costperkm);		
	}
}
</script>