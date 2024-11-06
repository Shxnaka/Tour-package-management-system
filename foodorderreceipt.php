<?php
include("header.php");
$sqlpayment = "SELECT * FROM payment LEFT JOIN customer ON payment.customer_id=customer.customer_id LEFT JOIN room_booking ON room_booking.room_booking_id = payment.room_booking_id  WHERE payment_id='$_GET[paymentid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
echo mysqli_error($con);
$rspayment = mysqli_fetch_array($qsqlpayment);
$sqlroom_booking = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active' AND payment.cab_bookingid='0' AND payment.payment_id='$_GET[paymentid]' ORDER BY room_booking.room_booking_id desc";
$qsqlroom_booking = mysqli_query($con,$sqlroom_booking);
echo mysqli_error($con);
$rsroom_booking = mysqli_fetch_array($qsqlroom_booking);
$hotname =$rsroom_booking['hotel_name'];
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner">
		<div class="container">
			<h2>Food Order Payment Receipt</h2>
		</div>
	</div>
<!-- Sub Banner Start -->
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
			<hr><br>		
			<div class="span_of_2">
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
				<img src="images/travel.png" alt="" width="250px;" style="height:150px;"><br>
				FindMyStay<br>
				De fonseka road,bambalapitiya,colombo<br>
				Sri lanka
				</center>
			</th>
		</tr>
		<tr>
			<th style="width:50%">Name : <?php echo $rspayment['customer_name']; ?></td>
			<th style="width:50%;color:red;">Bill No. <?php echo $rspayment['payment_id']; ?></th>
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
		<tr>
			<th style="width:50%;">
		<?php
		$checkin = date("d-M-Y",strtotime($rspayment['name']));
		$checkout = date("h:i A",strtotime($rspayment['mobileno']));
		?>
			Food Order date : <?php echo $checkin; ?>
			</th>
			<th style="width:50%;">
			Food Order time : <?php echo $checkout; ?>
			</th>
		</tr>
	</tbody>
</table>



<table class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Item</th>
			<th>Item Cost</th>
			<th>Quantity</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql = "SELECT * FROM food_order LEFT JOIN room_booking ON food_order.room_booking_id=room_booking.room_booking_id LEFT JOIN item ON food_order.item_id=item.item_id LEFT JOIN customer ON food_order.customer_id=customer.customer_id WHERE food_order.payment_id='$_GET[paymentid]'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[item_name]</td>
			<td>Rs.$rs[item_cost]</td>
			<td>$rs[qty]</td>
			<td> Rs." . $rs['item_cost']*$rs['qty'] . "</td>
		</tr>";
	}
	?>	
<tfoot>
	<tr>
		<th></th>
		<th></th>
		<th class="text-right"><h2><strong>Total: </strong></h2></th>
		<th class="text-left text-danger">
		<h2>Rs.&nbsp;<?php echo $totamt = $rspayment['total_amt']; ?></strong></h2>
		</th>
	</tr>
</tfoot>
                </table>
				
				<hr>
<h2>GST Tax Receipt:</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th rowspan="2" style="width: 350px;text-align: center;">Description<br> &nbsp;</th>
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
			echo $cgst = ($totamt*5/100); 
			?></td>
			<td style="text-align: center;">5%</td>
			<td style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = ($totamt*5/100); 
			?></td>
		</tr>
		<tr>
			<th style="text-align: right;">Total</th>
			<th style="text-align: center;">Rs.&nbsp;<?php echo $totamt; ?></th>
			<th style="text-align: center;">5%</th>
			<th style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = ($totamt*5/100); 
			?></th>
			<th style="text-align: center;">5%</th>
			<th style="text-align: center;">Rs.&nbsp;<?php 
			echo $cgst = ($totamt*5/100); 
			?></th>
		</tr>
	</thead>
</tbody>
</table>
	</div>
				<hr>
<center><input type="button" class="form-control" value="Print" style="width:500px;" onclick="PrintElem('divprintarea')"></center>
				
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
	</div>
</div>
</div>		
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