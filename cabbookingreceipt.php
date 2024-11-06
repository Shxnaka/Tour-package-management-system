<?php
include("header.php");
$sqlpayment = "SELECT * FROM payment LEFT JOIN customer ON payment.customer_id=customer.customer_id LEFT JOIN cab_booking ON cab_booking.payment_id = payment.payment_id WHERE payment.payment_id='$_GET[paymentid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment = mysqli_fetch_array($qsqlpayment);
$sqlroom_booking = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active' AND payment.payment_id='$_GET[paymentid]' ORDER BY room_booking.room_booking_id desc";
$qsqlroom_booking = mysqli_query($con,$sqlroom_booking);
echo mysqli_error($con);
$rsroom_booking = mysqli_fetch_array($qsqlroom_booking);
$hotname =$rsroom_booking['hotel_name'];
?>
<!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Cab Booking Receipt</h2>
                </div>
            </div>
<!-- Sub Banner Start -->
<!--start main -->
            <div class="iqoniq_contant_wrapper">
                <section class="gray-bg aboutus-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="about-us">
                                    <div class="text">
			<div id="divprintarea">
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="2">
				<center>
				<img src="images/travel.png" alt="" width="250px;" style="height:150px;"><br>
				De fonseka road , bambalapitiya , colombo<br>
				Sri lanka
				</center>
			</th>
		</tr>
		<tr>
			<th style="width:50%">Name : <?php echo $rspayment['customer_name']; ?></td>
			<th style="width:50%">Bill No. <?php echo $rspayment['payment_id']; ?></th>
		</tr>
		<tr>
			<th style="width:50%">
			Address:<br>  <?php echo $rspayment['address']; ?>, <?php echo $rspayment['city']; ?>, <?php echo $rspayment['pincode']; ?><br>
			Contact No.   <?php echo $rspayment['contact_no']; ?><br>
			Email ID.   <?php echo $rspayment['email_id']; ?>
			</th>
			<th style="width:50%;">
			Bill Date: <?php echo date("d-M-Y",strtotime($rspayment['payment_date'])); ?><br>&nbsp;
			</th>
		</tr>
	</tbody>
</table>



<hr>
<table  class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Vehicle Type</th>
			<th>Booking Date</th>
			<th>Booking Time</th>
			<th>From Location</th>
			<th>To Location</th>
			<th>Cost/KM</th>
			<th>Total K.M</th>
			<th>Total Cost</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM cab_booking LEFT JOIN vehicle_type ON cab_booking.vehicle_typeid=vehicle_type.vehicle_typeid LEFT JOIN customer ON cab_booking.customer_id=customer.customer_id WHERE cab_booking.cal_bookingid='$rspayment[cal_bookingid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[vehicle_type]</td>
			<td>" . date("d-M-Y", strtotime($rs['booking_datetime'])) . "</td>
			<td>" . date("h:i A", strtotime($rs['booking_datetime'])) . "</td>
			<td>$rs[flocation]</td>
			<td>$rs[tlocation]</td>
			<td>Rs.&nbsp;$rs[cost]</td>
			<td>$rs[total_km]</td>
			<td>Rs.&nbsp;" . ($totalamt = $rs['cost'] * $rs['total_km']) . "</td>
		</tr>"; 
	}
	$totamt  = $totalamt;
	?>	
	</tbody>
</table>
<hr>
<h2>GST Tax Receipt:</h2>


<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2" style="width: 450px;text-align: center;">Description<br> &nbsp;</th>
			<th rowspan="2" style="text-align: center;">Taxable Value<br>&nbsp;</th>
			<th colspan="2" style="text-align: center;">Central Tax</th>
			<th colspan="2" style="text-align: center;">State Tax</th>
		</tr>
		<tr>
			<th style="text-align: center;">Rate</th>
			<th style="text-align: center;">Amount</th>
			<th style="text-align: center;">Rate</th>
			<th style="text-align: center;">Amount</th>
		</tr>
		<tr>
			<td style="text-align: center;"><?php echo $hotname; ?></td>
			<td style="text-align: center;">Rs.&nbsp;<?php echo $totamt; ?></td>
			<td style="text-align: center;">5%</td>
			<td style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = round($totamt*5/100); 
			?></td>
			<td style="text-align: center;">5%</td>
			<td style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = round($totamt*5/100); 
			?></td>
		</tr>
		<tr>
			<th style="text-align: right;">Total</th>
			<th style="text-align: center;">Rs. <?php echo $totamt; ?></th>
			<th style="text-align: center;">5%</th>
			<th style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = round($totamt*5/100); 
			?></th>
			<th style="text-align: center;">5%</th>
			<th style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = round($totamt*5/100); 
			?></th>
		</tr>
	</thead>
</tbody>
</table>
			</div>

				<hr>
<center><input type="button" class="btn btn-info" value="Print" style="width:500px;" onclick="PrintElem('divprintarea')"></center>
				<br>
             </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
<!--start main -->
<?php
include("datatable.php");
include("footer.php");
?>
<script>
function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    mywindow.document.write('<link href="css/bootstrap.css" rel="stylesheet"><link href="css/typography.css" rel="stylesheet"><link href="js/dl-menu/component.css" rel="stylesheet"><link rel="stylesheet" href="css/datetimepicker.css"><link href="css/font-awesome.css" rel="stylesheet"><link href="css/svg.css" rel="stylesheet"><link href="css/slick.css" rel="stylesheet"><link href="css/widget.css" rel="stylesheet"><link href="css/shortcode.css" rel="stylesheet"><link href="css/color.css" rel="stylesheet"><link href="css/responsive.css" rel="stylesheet"><link href="css/jquery.dataTables.min.css" rel="stylesheet">');
    mywindow.document.write('</head><body >');  
    mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write('</body></html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}
</script>