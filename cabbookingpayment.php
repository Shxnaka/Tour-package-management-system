<?php
include("header.php"); 
$cab_serviceid  = $_POST['cab_serviceid'];
$bookingdate  = $_POST['bookingdate'];
$bookingtime  = $_POST['bookingtime'];
$note = $_POST['note'];
$sqlpayment = "SELECT *  FROM payment WHERE payment_id='$_GET[paymentid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
echo mysqli_error($con);
$rspayment = mysqli_fetch_array($qsqlpayment);
?>
			
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Cab Booking Payment Gateway...</h2>
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
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active' AND payment.payment_id='$_GET[paymentid]'   ";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$hotelid=  $rs['hotel_id'];
		$_GET['hotel_id'] = $hotelid;
		echo "<input type='hidden' name='room_booking_id' id='room_booking_id' value='$rs[room_booking_id]' >";
		$checkin = date("d-M-Y",strtotime($rs['check_in']));
		$checkout = date("d-M-Y",strtotime($rs['check_out']));
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
<table id="dataTables" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Vehicle Type</th>
			<th>Booking Date & Time</th>
			<th style='width: 200px;'>Travelling From</th>
			<th style='width: 200px;'>Travelling  To</th>
			<th>Cost</th>
			<th>Total K.M</th>
			<th>Total Cost</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM cab_booking LEFT JOIN vehicle_type ON cab_booking.vehicle_typeid=vehicle_type.vehicle_typeid LEFT JOIN customer ON cab_booking.customer_id=customer.customer_id WHERE cab_booking.cal_bookingid='$_GET[cab_bookingid]' AND cab_booking.status='Pending'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[vehicle_type]</td>
			<td>" . date("d-M-Y",strtotime($rs['booking_datetime'])) . " <br> " . date("h:i A",strtotime($rs['booking_datetime'])) . "</td>
			<td>$rs[flocation]</td>
			<td>$rs[tlocation]</td>
			<td>Rs. $rs[cost]</td>
			<td>$rs[total_km]</td>
			<td>Rs. " . $totalamt = $rs['cost'] * $rs['total_km'] . "</td>
		</tr>"; 
	}
	?>	
	</tbody>
</table>

<input type='hidden' name="room_booking_id" id='room_booking_id' value="<?php echo $rspayment['room_booking_id']; ?>" >
<input type='hidden' name="cal_bookingid" id='cal_bookingid' value="<?php echo $_GET['cab_bookingid']; ?>" >

<input type='hidden' name="totcost" id='totcost' value="<?php echo $totalamt; ?>" >

				
<hr>

	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th colspan="2">Enter payment detail... </th>
			</tr>
			
			<tr>
				<th style="width:25%;">Payment Type</th>
				<th style="width:75%;"><select name="payment_type" id="payment_type" class="form-control" style="height:40px;">
						<option value=''>Select payment type</option>
						<option value='VISA'>VISA</option>
						<option value='MASTER CARD'>MASTER CARD</option>
						<option value='CREDIT CARD'>CREDIT CARD</option>
						<option value='DEBIT CARD'>DEBIT CARD</option>
					</select></th>
			</tr>
			
			<tr>
				<th style="width:25%;">Card holder</th>
				<th style="width:75%;"><input name="card_holder" id="card_holder" type="text" class="form-control" ></th>
			</tr>			
			 
			<tr>
				<th style="width:25%;">Card No</th>
				<th style="width:75%;"><input name="card_no" id="card_no" type="text" class="form-control" ></th>
			</tr>
			
			<tr>
				<th style="width:25%;">Expiry Date</th>
				<th style="width:75%;"><input name="exp_date" id="exp_date" type="month" class="form-control"   min="<?php echo date("Y-m"); ?>" ></th>
			</tr>
			
			<tr>
				<th style="width:25%;">CVV No</th>
				<th style="width:75%;"><input name="cvv_no" id="cvv_no" type="text" class="form-control" 	></th>
			</tr>
			
			<tr>
				<th style="width:25%;"></th>
				<th style="width:75%;"><input type="button" id="btnpayment" name="btnpayment" class="form-control" value="Make payment" ></th>
			</tr>
			
			
		</thead>
	</table>
							</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!--start main -->
<?php
include("footer.php");
?>
<script>
function loadspaservice(gender,hotelid)
{
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divspaservice").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxspaservice.php?gender="+gender+"&hotel_id="+hotelid,true);
	xmlhttp.send();
}
function insertspaservice(spaid,cost)
{
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divload").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxspaservicebooking.php?spaid="+spaid+"&cost="+cost+"&submit=submit",true);
	xmlhttp.send();
}
function deletespaservice(spa_sevice_bookingid)
{
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("divload").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","ajaxspaservicebooking.php?spa_sevice_bookingid="+spa_sevice_bookingid+"&delete=delete",true);
	xmlhttp.send();
}
</script>
<script>
$('#btnpayment').bind('click', function(e) {
	
	var onlycharacter = /^[a-zA-Z\s]*$/;
	
	if(document.getElementById("payment_type").value == "")
	{
		alert("Kindly select the Payment type..");
		return false;
	}
	else if(document.getElementById("card_holder").value == "")
	{
		alert("Kindly enter Cardholde name..");
		return false;
	}
	else if(!document.getElementById("card_holder").value.match(onlycharacter))
	{
		alert("Cardholder Name should contain only Character..");
		return false;
	}
	else if(document.getElementById("card_no").value == "")
	{
		alert("Kindly enter Card no ..");
		return false;
	}	
	else if(document.getElementById("card_no").value.length != 16)
	{
		alert("Card No should contain only 16 digits...");
		return false;
	}	
	else if(document.getElementById("exp_date").value == "")
	{
		alert("Kindly enter expiration date..");
		return false;
	}
	else if(document.getElementById("cvv_no").value == "")
	{
		alert("Kindly enter CVV no ..");
		return false;
	}	
	else if(document.getElementById("cvv_no").value.length != 3)
	{
		alert("CVV No should contain only 3 digits...");
		return false;
	}
	else
	{
		var payment_type = $('#payment_type').val();
		var card_holder = $('#card_holder').val();
		var card_no = $('#card_no').val();
		var cvv_no = $('#cvv_no').val();
		var exp_date = $('#exp_date').val();
		var cal_bookingid = $('#cal_bookingid').val();
		var room_booking_id = $('#room_booking_id').val();	
		var totcost = $('#totcost').val(); 	
		$.post("payment.php",
		{
			'payment_type': payment_type,
			'card_holder': card_holder,
			'card_no': card_no,
			'cvv_no': cvv_no,
			'exp_date': exp_date,
			'totcost':totcost,
			'cal_bookingid':cal_bookingid,
			'room_booking_id':room_booking_id,
			'btncabbooking': "btncabbooking"
		},
		function(data, status){
			alert("Cab booking done successfully...");
			window.location='cabbookingreceipt.php?paymentid='+data;
		});
	}
});
</script>