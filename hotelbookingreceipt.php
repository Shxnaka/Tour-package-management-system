<?php
include("header.php");
$sqlpayment = "SELECT * FROM payment LEFT JOIN customer ON payment.customer_id=customer.customer_id LEFT JOIN room_booking ON room_booking.room_booking_id = payment.room_booking_id  WHERE payment_id='$_GET[paymentid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment = mysqli_fetch_array($qsqlpayment);
?>            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Hotel Booking Payment Receipt</h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">			
			<div>				

<div >
	<div >
		
        <div class="col-md-12">
         
		
			
            <div id="divprintarea">
<table class="table table-bordered">
	<thead>
		<tr>
			<th colspan="2">
				<center>
				<img src="images/travel.png" alt="" width="250px;" style="height:50px;"><br>
				De fonseka road,<br>
				Bambalapitiya,Colombo<br>
				Sri lanaka
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
			Bill Date: <?php echo date("d-M-Y",strtotime($rspayment['payment_date'])); ?>
			<hr>
			Note: <br>
			<?php echo $rspayment['note']; ?>
			</th>
		</tr>
	</tbody>
</table>

<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Bill No.</th>
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
			<th>Booked for</th>
			<th>Booking date</th>
			<th>Cost</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active' AND payment.food_order_id='0' AND payment.cab_bookingid='0'";
	if(isset($_SESSION['customer_id']))
	{
	$sql = $sql . " AND room_booking.customer_id='$_SESSION[customer_id]'";
	}
	$sql = $sql . " AND payment.payment_id='$_GET[paymentid]' ORDER BY room_booking.room_booking_id desc";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqlhotel_image = "SELECT * FROM hotel_image WHERE hotel_id='$rs[1]' AND room_typeid='$rs[room_typeid]'";
		$qsqlhotel_image = mysqli_query($con,$sqlhotel_image);
		$rshotel_image = mysqli_fetch_array($qsqlhotel_image);		
		$hotname =$rs['hotel_name'];
		if(mysqli_num_rows($qsqlhotel_image) == 0)
		{
			$imgname = "images/noimage.png";
		}
		else
		{
			if(file_exists("imghotel/$rshotel_image[hotel_image]"))
			{
				$imgname = "imghotel/$rshotel_image[hotel_image]";				
			}
			else
			{
				$imgname = "images/noimage.png";
			}
		}

		$checkin = date("d-M-Y",strtotime($rs['check_in']));
		$checkout = date("d-M-Y",strtotime($rs['check_out']));
		$checkintime = date("h:i A",strtotime($rs['checkintime']));
		$checkouttime = date("h:i A",strtotime($rs['checkouttime']));
		echo "<tr>
			<th>
			<center>
			<p style='color:red;font-size:25px;'><br>
			$rs[payment_id]</p>
			</center>
			</th>
			<td>$rs[hotel_image] $rs[hotel_name]<br><img src='$imgname' style='width:150px;height:100px;'></td>
			<td>$rs[room_type]<br>(Rs.&nbsp;$rs[cost] / day)</td>";
			if(!isset($_SESSION['customer_id']))
			{
		echo "<td>$rs[customer_name]</td>";
			}
		echo "<td>Adults : $rs[no_ofadults]<br>Children: $rs[no_ofchildren]</td>
			<td>
			<b>CheckIn :</b><br>$checkin $checkintime <br><b>Checkout :</b><br>$checkout $checkouttime<br><b style='color:green;'>";
$checkin = strtotime($rs['check_in']);
$checkout = strtotime($rs['check_out']);
$datediff = $checkout - $checkin;
$nodays = round($datediff / (60 * 60 * 24));
$nodays = $nodays +1;
if($nodays == 1 )
{
	echo $nodays . " Day"; 
}
else
{
	echo $nodays . " Days"; 
}
$total = ($rs['cost']*$nodays) - $rs['discount_amount']; 
		echo "</b></td>
			<td>Rs.&nbsp;". $total . "</td></tr>";
	}
	?>	
	</tbody>
</table>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th style="width:75%;">Description</th>
                            <th style="width:25%;">Amount</th>
                        </tr>
                    </thead>
<tbody>
	<tr>
		<td>Room booking </td>
		<td>Rs. <?php echo $rspayment['total_amt']; ?></td>
	</tr>
	<?php
	if($rspayment['discount_amount'] != 0)
	{
	?>
	<tr>
		<td class="text-right"><h4><strong>Sub Total: </strong></h4></td>
		<td class="text-left text-danger"><h4>Rs.&nbsp;<?php echo $rspayment['total_amt']; ?></strong></h4></td>
	</tr>
	<tr>
		<td class="text-right"><h4><strong>Discount Amount: </strong></h4></td>
		<td class="text-left text-danger"><h4>Rs.&nbsp;<?php echo $rspayment['discount_amount']; ?></strong></h4></td>
	</tr>
	<tr>
		<td class="text-right"><h4><strong>Total Amount: </strong></h4></td>
		<td class="text-left text-danger"><h4>Rs.&nbsp;<?php echo $totamt = $rspayment['total_amt'] - $rspayment['discount_amount']; ?></strong></h4></td>
	</tr>
	<?php
	}
	else
	{
	?>
	<tr>
		<td class="text-right"><b>Total: </h2></td>
		<td class="text-left text-danger"><b>Rs.&nbsp;<?php echo $totamt = $rspayment['total_amt']; ?></b></td>
	</tr>
	<?php
	}
	?>
</tbody>
                </table>
				<hr>
<b>GST Tax Receipt:</b>

<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2" style="width: 300px;text-align: center;">Description<br> &nbsp;</th>
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
			<td style="text-align: center;">7%</td>
			<td style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = ($totamt*7/100); 
			?></td>
			<td style="text-align: center;">7%</td>
			<td style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = ($totamt*7/100); 
			?></td>
		</tr>
		<tr>
			<th style="text-align: right;">Total</th>
			<th style="text-align: center;">Rs.&nbsp;<?php echo $totamt; ?></th>
			<th style="text-align: center;">7%</th>
			<th style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = ($totamt*7/100); 
			?></th>
			<th style="text-align: center;">7%</th>
			<th style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = ($totamt*7/100); 
			?></th>
		</tr>
	</thead>
</tbody>
</table>
				</div>
				
				<hr>
<center><input type="button" class="btn btn-info" value="Print" style="width:500px;" onclick="PrintElem('divprintarea')"></center>
				<hr>
            </div>
			
			
        </div>    
	</div>
</div>
				
				<div class="clear"></div>
			</div>
	</div>
</div>
</div>		
<!--start main -->
<?php
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

    return true;
}
</script>