<?php
include("header.php");
if(isset($_POST["submitorder"]))
{
	/*
	$item_id = $_POST['item_id'];
	$qty = $_POST['qty'];
	$item_cost = $_POST['item_cost'];
	for($i=0;$i<count($item_id);$i++)
	{
		if($qty[$i] != 0)
		{
			$sql = "INSERT INTO food_order(room_booking_id,item_id,customer_id,item_cost,qty,status) VALUES('$_POST[room_booking_id]','$item_id[$i]','$_SESSION[customer_id]','$item_cost[$i]','$qty[$i]','Pending')";
			mysqli_query($con,$sql);
			echo mysqli_error($con);
		}
	}
	*/
}
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner">
		<div class="container">
			<h2>Online Food Order - Make Payment</h2>
		</div>
	</div>
<!-- Sub Banner Start -->

                <!-- Pricing Table Section Start-->
                <section class="pricing_wrap">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Kindly enter quantity to Order Food items..</h6>
                            <h4>Online Food Order</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
<!--start main -->
<div class="main_bg">
<div class="wrap">
	<div class="main">
		<div class="res_online">
			<center><h4>Online Food Order</h4></center>
		</div>			
			<div class="span_of_2">
				
<form method="post" action="" onsubmit="return validateform()">

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
	$sql = "SELECT * FROM room_booking LEFT JOIN hotel ON room_booking.hotel_id=hotel.hotel_id LEFT JOIN room_type ON room_booking.room_typeid=room_type.room_typeid LEFT JOIN customer ON room_booking.customer_id=customer.customer_id LEFT JOIN payment ON payment.room_booking_id=room_booking.room_booking_id WHERE room_booking.status='Active' AND payment.payment_id='$_GET[paymentid]' ";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<input type='hidden' name='room_booking_id' id='room_booking_id' value='$rs[room_booking_id]' >";
		$checkin = date("d-M-Y",strtotime($rs['check_in']));
		$checkout = date("d-M-Y",strtotime($rs['check_out']));
		$checkindt = $rs['check_in'];
		$checkoutdt = $rs['check_out'];
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
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th style="width:125px;">Image</th>
				<th>Item Type</th>
				<th>Item Name</th>
				<th>Item Cost</th>
				<th>Quantity</th>
				<th>Total Amount</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$totamt = 0;
		$sql = "SELECT * FROM food_order LEFT JOIN item ON food_order.item_id= item.item_id LEFT JOIN food_category ON item.food_category_id=food_category.food_category_id  WHERE food_order.status='Pending'";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			if($rs['item_img'] == "")
			{
				$imgname = "images/noimage.png";
			}
			else
			{
				if(file_exists("imgitem/".$rs['item_img']))
				{
					$imgname=  "imgitem/".$rs['item_img'];
				}
				else
				{
					$imgname = "images/noimage.png";
				}
			}
			echo "<tr>
				<td><img src='$imgname' style='width:100px;height:100px;'></td>
				<td>$rs[food_category]</td>
				<td>$rs[item_name]</td>
				<td>Rs. $rs[item_cost]</td>
				<td>$rs[qty]</td>
				<td>Rs. ". $rs['item_cost']*$rs['qty'] ."</td>
			</tr>";
			$totamt = $totamt + ($rs['item_cost']*$rs['qty']);
		}
		?>	
		</tbody>
			<tfoot>
				<?php
				echo "
				<tr>
					<th></th>
					<th></th>
					<th></th>
					<th></th>
					<th>Total:</th>
					<th>Rs.". $totamt ."</th>
				</tr>";
				?>
			</tfoot>
	</table>
	<input type='hidden' name="totcost" id="totcost" value="<?php echo $totamt; ?>" >
	<input type='hidden' name="payment_id" id="payment_id" value="<?php echo $_GET['payment_id']; ?>" >
<hr>

<?php
if(mysqli_num_rows($qsql) == 0)
{
?>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th colspan="2">No items in the Cart... </th>
			</tr>
		</thead>
	</table>
<?php
}
else
{
?>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th colspan="2">Enter the deliver date and time - </th>
			</tr>
			<tr>
				<th style="width:25%;">Delivery date</th>
				<th style="width:75%;">
				<input type="date" min="<?php echo date("Y-m-d",strtotime($checkindt)); ?>" max="<?php echo date("Y-m-d",strtotime($checkoutdt)); ?>" name="deldate" id="deldate" class="form-control">
				</th>
			</tr>
			<tr>
				<th style="width:25%;">Delivery Time</th>
				<th style="width:75%;">
				<input type="time" name="deltime" id="deltime" class="form-control">
				</th>
			</tr>
			<tr>
				<th style="width:25%;">Any message<br>&nbsp;</th>
				<th style="width:75%;">
				<textarea class="form-control" rows="5" name="msg" id="msg" ></textarea>
				</th>
			</tr>
		</thead>
	</table>
<hr>
	<table class="table table-striped table-bordered" cellspacing="0" width="100%">
		<thead>
			<tr>
				<th colspan="2">Enter payment detail... </th>
			</tr>
			
			<tr>
				<th style="width:25%;">Payment Type</th>
				<th style="width:75%;">   
				<div class="col-md-12"> 
		<span>
			<select name="payment_type" id="payment_type" class="form-control" style="height:40px;"  onchange="loadcardtype(this.value)">
				<option value=''>Select payment type</option>
				<option value='Credit card'>Credit card</option>
				<option value='Debit card'>Debit card</option>
			</select>	
<!--#####Starts here ##### -->
<div class="form-sub-w3" id="divcardtype" ></div>
<!--##### Ends here##### -->			
		</span>
	</div></th>
			</tr>
			
			<tr>
				<th style="width:25%;">Card holder</th>
				<th style="width:75%;"><input name="card_holder" id="card_holder" type="text" class="form-control" ></th>
			</tr>			
			 
			<tr>
				<th style="width:25%;">Card No</th>
				<th style="width:75%;"><input name="card_no" id="card_no" type="text" class="form-control"></th>
			</tr>
			
			<tr>
				<th style="width:25%;">Expiry Date</th>
				<th style="width:75%;"><input name="exp_date" id="exp_date" type="month" class="form-control" min="<?php echo date("Y-m"); ?>"></th>
			</tr>
			
			<tr>
				<th style="width:25%;">CVV No</th>
				<th style="width:75%;"><input name="cvv_no" id="cvv_no" type="text" class="form-control"></th>
			</tr>
			
<tr>
	<th style="width:25%;"></th>
	<th style="width:75%;">
	<input type="button" id="btnpayment" name="btnpayment" class="form-control" value="Make payment" onclick="return validateform()" >
	</th>
</tr>			
			
		</thead>
	</table>
<?php
}
?>			
				<div class="clear"></div>
			</div>
			<form>
	</div>
</div>
</div>		
<!--start main -->
                 </div>
                    </div>
                </section>
<?php
include("datatable.php");
include("footer.php");
?>
<script>
$('#btnpayment').bind('click', function(e) {
	var onlycharacter = /^[a-zA-Z\s]*$/;
	
	if(document.getElementById("deldate").value == "")
	{
		alert("Kindly enter the Delivery date..");
		return false;
	}
	else if(document.getElementById("deltime").value == "")
	{
		alert("Kindly enter Delivery Time..");
		return false;
	}
	else if(document.getElementById("payment_type").value == "")
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
		var name = $('#deldate').val();
		var contactnumber = $('#deltime').val();		
		var note = $('#msg').val();		 
		var room_booking_id = $('#room_booking_id').val(); 
		var totcost = $('#totcost').val(); 	
		
			$.post("payment.php",
			{
				'payment_type': payment_type,
				'card_holder': card_holder,
				'card_no': card_no,
				'cvv_no': cvv_no,
				'exp_date': exp_date,				
				'name': name,
				'contactnumber': contactnumber,
				'note': note,
				'totcost':totcost,
				'room_booking_id':room_booking_id,
                'btnfoodorder': "btnfoodorder"
			},
			function(data, status){
			alert("Item order payment done successfully...");	
			window.location='foodorderreceipt.php?paymentid='+data;
			});
	}
});
function loadcardtype(cardtype)
{
	if(cardtype == "")
	{
	document.getElementById("divcardtype").innerHTML = "";
	}
	else
	{
	document.getElementById("divcardtype").innerHTML = '<label><i class="fa fa-picture-o" aria-hidden="true"></i> Select Card Type</label><br><input type="radio" name="cardtype" value="Visa" required>Visa &nbsp;   &nbsp;  &nbsp;  &nbsp;		<input type="radio" name="cardtype" value="Master Card" required>Master Card &nbsp;  &nbsp;  &nbsp;  &nbsp; <input type="radio" name="cardtype" value="Rupay" required>Rupay<br><br>';
	}
}
</script>
