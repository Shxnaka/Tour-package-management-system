<?php
include("header.php");
$sql = "SELECT * FROM hotel LEFT JOIN tourism_location ON hotel.location_id = tourism_location.location_id WHERE hotel_id='$_GET[hotelid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$rs = mysqli_fetch_array($qsql);
//####
$sqlhotel_image = "SELECT * FROM hotel_image WHERE hotel_id='$_GET[hotelid]'";
$qsqlhotel_image = mysqli_query($con,$sqlhotel_image);
$rshotel_image = mysqli_fetch_array($qsqlhotel_image);
?> 
<?php 
$checkin = strtotime($_GET['checkin']);
$checkout = strtotime($_GET['checkout']);
$datediff = $checkout - $checkin;
 $nodays = round($datediff / (60 * 60 * 24));
 $nodays = $nodays +1;
 ?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Hotel Booking Payment Panel</h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contnt Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
                        <div class="row">
<!-- iqoniq Blog Listing Start -->
<div class="col-md-6">
	<!-- iqoniq Blog Listing Start -->
	<div class="mg_blog_listing fancy-overlay">
		<div class="text">
<?php
	$i =0;
	$sqlroomtype ="SELECT * FROM room_type where room_type.status='Active' AND room_type.hotel_id='$_GET[hotelid]'  ";
	if($_GET['room_type'])
	{
	$sqlroomtype = $sqlroomtype . " AND room_typeid='$_GET[room_type]'";
	}
	$qsqlroomtype = mysqli_query($con,$sqlroomtype);
	while($rsroomtype = mysqli_fetch_array($qsqlroomtype))
	{
		$sqlroomtypeimg ="SELECT * FROM hotel_image where status='Active' AND room_typeid='$rsroomtype[0]'";
		$qsqlroomtypeimg = mysqli_query($con,$sqlroomtypeimg);
		$rsroomtypeimg = mysqli_fetch_array($qsqlroomtypeimg);
?>
			<h5 class="blog_title"><?php echo $rs['hotel_name']; ?></h5>
			<div class="clear"></div>
			<p><?php echo $rs['hotel_address']; ?>,<br><?php echo $rs['location_name']; ?><br>PIN : <?php echo $rs['hotel_pincode']; ?></p>
			<hr>
			<p><b>Hotel policies:</b><br><?php echo $rs['hotel_policies']; ?></p>
		
<?php
	}
?>
		</div>
	</div>
	<!-- iqoniq Blog Listing End -->
</div>
<!-- iqoniq Blog Listing Start -->
<!-- iqoniq Blog Listing Start -->
<div class="col-md-6">
	<!-- iqoniq Blog Listing Start -->
	<div class="mg_blog_listing fancy-overlay">
		<div class="text">
<h5 class="blog_title">Tariff details<hr></h5>
<?php
	$i =0;
	$sqlroomtype ="SELECT * FROM room_type where room_type.status='Active' AND room_type.hotel_id='$_GET[hotelid]'  ";
	if($_GET['room_type'])
	{
	$sqlroomtype = $sqlroomtype . " AND room_typeid='$_GET[room_type]'";
	}
	$qsqlroomtype = mysqli_query($con,$sqlroomtype);
	while($rsroomtype = mysqli_fetch_array($qsqlroomtype))
	{
		$sqlroomtypeimg ="SELECT * FROM hotel_image where status='Active' AND room_typeid='$rsroomtype[0]'";
		$qsqlroomtypeimg = mysqli_query($con,$sqlroomtypeimg);
		$rsroomtypeimg = mysqli_fetch_array($qsqlroomtypeimg);
?>

				<b>Redeem Gift Coupon here:</b>
				<input type="text" class="form-control" name="giftcoupon" id="giftcoupon">
				<input type="button" class="btn btn-primary" name="btnredeem" id="btnredeem" value="Click here to Verify" onclick="funverifydiscount(giftcoupon.value)" > <label id="divgiftcoupondetail"></label>
				<hr>
<Div id="idpaychart">
	<table class="table table-striped table-bordered">
		<tr>
			<th>Cost per day</th><td>Rs. <?php echo $rsroomtype['cost']; ?></td>
		</tr>
		<tr>
			<th>No. of days</th><td><?php 
	if($nodays == 1 )
	{
	echo $nodays . " Day"; 
	}
	else
	{
	echo $nodays . " Days"; 
	} 
	?></td>
		</tr>
		<tr>
			<th>Total Cost</th><th>Rs. <?php echo $totcost = $rsroomtype['cost'] * $nodays; ?></th>
		</tr>
	</table>
</div>
				
<input type="hidden" name="nodays" id="nodays" value="<?php echo $nodays; ?>" >
<input type="hidden" name="cost" id="cost" value="<?php echo $rsroomtype['cost']; ?>" >
<input type="hidden" name="totcost" id="totcost" value="<?php echo $totcost; ?>" >
<input type="hidden" name="discount_amt" id="discount_amt" value="0" >

<input type="hidden" name="couponcode" id="couponcode" value="0" >
<input type="hidden" name="expirydate" id="expirydate" value="0" >
<input type="hidden" name="discount_percentage" id="discount_percentage" value="0" >
<input type="hidden" name="max_limit" id="max_limit" value="0" >
<input type="hidden" name="reason" id="reason" value="0" >
<input type="hidden" name="status" id="status" value="0" >

<?php
	}
	?>
		</div>
	</div>
	<!-- iqoniq Blog Listing End -->
</div>
<!-- iqoniq Blog Listing Start -->
<!-- iqoniq Blog Listing Start -->
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
<div class="col-md-12">
	<!-- iqoniq Blog Listing Start -->
	<div class="mg_blog_listing fancy-overlay">
		<div class="text">
   <a >
              
                <div class="col-md-12">
					<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:blue;">
                    <p class="list-group-item-text" style="width:500px;"><?php echo $rsroomtype['room_type']; ?> - 
					<?php 
					if($_GET['adults'] == 1)
					{
					echo $_GET['adults'] . " Adult"; 
					}
					else
					{
						echo $_GET['adults'] . " Adults"; 
					}
					?>
					<?php 
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
					?><br>
			
			</p>
			</button>
                </div>
                <div class="col-md-6 text-left">				
<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:grey;">Check In - <?php echo date("d-M-Y",strtotime($_GET['checkin'])); ?> <?php echo date("h:i A",strtotime($_GET['checkintime'])); ?></button>
<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:grey;">Check Out - <?php echo date("d-M-Y",strtotime($_GET['checkout'])); ?> <?php echo date("h:i A",strtotime($_GET['checkouttime'])); ?></button>
<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:green;"><?php 
$checkin = strtotime($_GET['checkin']);
$checkout = strtotime($_GET['checkout']);
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
 ?></button>
                </div>
				<div class="col-md-6">
<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:violet;text-align:left;padding:5px;"><b>Name</b><br><?php echo $_POST['customer_name']; ?></button>
<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:violet;text-align:left;padding:5px;"><b>Mobile No.</b><br><?php echo $_POST['contactnumber']; ?></button>
<button type="button" class="btn btn-primary btn-lg btn-block" style="height:75px;background-color:violet;text-align:left;padding:5px;"><b>Note</b><br><?php echo $_POST['note']; ?></button>
				</div>
		  </a>
		</div>
	</div>
	<!-- iqoniq Blog Listing End -->
</div>
<?php
}
?>
<!-- iqoniq Blog Listing Start -->


<div class="col-md-12">
	<!-- iqoniq Blog Listing Start -->
	<div class="mg_blog_listing fancy-overlay">
		<div class="text">
		   
<div class="box ng-scope" ng-controller="productTravellerController" style="height: 350px;">
    <div class="box-content">      
	  <?php
	  if(isset($_SESSION['customer_id']))
	  {
	  ?>
<input type='hidden' name='hotelid' id='hotelid' value='<?php echo $_GET['hotelid']; ?>'>
<input type='hidden' name='room_type' id='room_type' value='<?php echo $_GET['room_type']; ?>'>
<input type='hidden' name='adults' id='adults' value='<?php echo $_GET['adults']; ?>'>
<input type='hidden' name='children' id='children' value='<?php echo $_GET['children']; ?>'>
<input type='hidden' name='checkin' id='checkin' value='<?php echo $_GET['checkin']; ?>'>
<input type='hidden' name='checkout' id='checkout' value='<?php echo $_GET['checkout']; ?>'>  
<input type='hidden' name='checkintime' id='checkintime' value='<?php echo $_GET['checkintime']; ?>'>  
<input type='hidden' name='checkouttime' id='checkouttime' value='<?php echo $_GET['checkouttime']; ?>'>  
<input type='hidden' name='name' id='name' value='<?php echo $_POST['customer_name']; ?>'>
<input type='hidden' name='contactnumber' id='contactnumber' value='<?php echo $_POST['contactnumber']; ?>'>
<input type='hidden' name='note' id='note' value='<?php echo $_POST['note']; ?>'>
   <h3>Enter payment details </h3>
   <div class="row">
   <div  class="col-md-6"> 
		<span><label>Payment Type</label></span>
		<span>
			<select name="payment_type" id="payment_type" class="form-control" style="height:40px;" onchange="loadcardtype(this.value)">
				<option value=''>Select payment type</option>
				<option value='VISA'>VISA</option>
				<option value='MASTER CARD'>MASTER CARD</option>
				<option value='CREDIT CARD'>CREDIT CARD</option>
				<option value='DEBIT CARD'>DEBIT CARD</option>
			</select><span id="errpayment_type" class="errmsg flash"></span>
		</span>
	</div>
	  <div  class="col-md-6" id="divcardtype">&nbsp;<br></div>
	 </div>
	<hr>
	<div class="col-md-6"> 
		<span><label>Card holder</label></span>
		<span><input name="card_holder" id="card_holder" type="text" class="form-control" ><span id="errcard_holder" class="errmsg flash"></span></span>
	</div>
	<div class="col-md-6"> 
		<span><label>Card No</label></span>
		<span><input name="card_no" id="card_no" type="text" class="form-control"><span id="errcard_no" class="errmsg flash"></span></span>
	</div>
	<div class="col-md-6"> 
		<span><label>CVV No</label></span>
		<span><input name="cvv_no" id="cvv_no" type="text" class="form-control" ><span id="errcvv_no" class="errmsg flash"></span></span>
	</div>
	<div class="col-md-6"> 
		<span><label>Expiry Date</label></span>
		<span><input name="exp_date" id="exp_date" type="month" class="form-control" min="<?php echo date("Y-m"); ?>" ><span id="errexp_date" class="errmsg flash" ></span></span>
	</div>
	  <div class="col-md-12">
	  <hr>
		<center><input type="button" id="btnpayment" name="btnpayment" class="btn btn-success" style="width: 250px;" value="Make payment" > </center>
	  </div>
	 
	  <?php
	  }
	  else
	  {
		?>
		
			<h3>Enter Traveller Details </h3>
			<div class="col-md-12">
				New Customer
				<input type="submit" class="form-control" value="Click here to Register" style="width:200px;" onclick="window.location='customerregistration.php?hotelid=<?php echo $_GET['hotelid']; ?>&room_type=<?php echo $_GET['room_type']; ?>&adults=<?php echo $_GET['adults']; ?>&children=<?php echo $_GET['children']; ?>&checkin=<?php echo $_GET['checkin']; ?>&checkout=<?php echo $_GET['checkout']; ?>&btnsearch=<?php echo $_GET['btnsearch']; ?>';" >
				<hr>
			</div>
			  
			<div class="col-md-12">
			Existing customer
				<input type="submit" class="form-control" value="Click here to Login" style="width:200px;" onclick="window.location='customerlogin.php?hotelid=<?php echo $_GET['hotelid']; ?>&room_type=<?php echo $_GET['room_type']; ?>&adults=<?php echo $_GET['adults']; ?>&children=<?php echo $_GET['children']; ?>&checkin=<?php echo $_GET['checkin']; ?>&checkout=<?php echo $_GET['checkout']; ?>&btnsearch=<?php echo $_GET['btnsearch']; ?>'" >
			</div>
		<?php
	  }
	  ?>
    </div>   
</div>
          
		</div>
	</div>
</div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- Main Contnt Wrap End -->
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

<script>
$('#btnpayment').bind('click', function(e) {
		
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	
	
	var i = 0;
	$( ".errmsg" ).empty();
	
		var payment_type = $('#payment_type').val();
		var card_holder = $('#card_holder').val();
		var card_no = $('#card_no').val();
		var cvv_no = $('#cvv_no').val();
		var exp_date = $('#exp_date').val();
		var name = $('#name').val();
		var contactnumber = $('#contactnumber').val();
		var note = $('#note').val();
		 
		var discount_amt = $('#discount_amt').val();
		var couponcode = $('#couponcode').val();
		var expirydate = $('#expirydate').val();
		var discount_percentage = $('#discount_percentage').val();
		var max_limit = $('#max_limit').val();
		var reason = $('#reason').val();
		var status = $('#status').val();
		  
		var hotelid = $('#hotelid').val();
		var room_type = $('#room_type').val();
		var adults = $('#adults').val();
		var children = $('#children').val();
		var checkin = $('#checkin').val();
		var checkout = $('#checkout').val();
		var checkintime = $('#checkintime').val();
		var checkouttime = $('#checkouttime').val();
		var cost = $('#cost').val();
		var totcost = $('#totcost').val();
		 //errpayment_type errcard_holder errcard_no errcvv_no errexp_date
		 if(payment_type == "")
		 {
			document.getElementById("errpayment_type").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly select payment type..";
			i=1;
		 }
		 if(!card_holder.match(alphaspaceExp) )
		 {
			document.getElementById("errcard_holder").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Card holder entry not valid..";
			i=1;
		 }
		 if(card_holder == "")
		 {
			document.getElementById("errcard_holder").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Card holder name should not be empty..";
			i=1;
		 }
		 if(card_no.length != 16)
		 {
			document.getElementById("errcard_no").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly enter 16 digit Card number..";
			i=1;
		 }
		 if(!card_no.match(numericExpression) )
		 {
			document.getElementById("errcard_no").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Card Number entry not valid..";
			i=1;
		 }
		 if(card_no == "")
		 {
			document.getElementById("errcard_no").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly enter Card number..";
			i=1;
		 }
		 if(cvv_no.length != 3)
		 {
			document.getElementById("errcvv_no").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly enter 3 digit CVV number..";
			i=1;
		 }
		 if(cvv_no == "")
		 {
			document.getElementById("errcvv_no").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>CVV Number should not be empty..";
			i=1;
		 }
		 if(!cvv_no.match(numericExpression) )
		 {
			document.getElementById("errcvv_no").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>CVV Number entry not valid..";
			i=1;
		 }
		 if(exp_date == "")
		 {
			document.getElementById("errexp_date").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Expiry date should not be empty..";
			i=1;
		 }
			 
		 if(i == 0)
		 {
			$.post("payment.php",
			{
				'hotelid': hotelid,
				'room_type': room_type,
				'adults': adults,
				'children': children,
				'checkin': checkin,
				'checkout': checkout, 
				'checkintime': checkintime,
				'checkouttime': checkouttime,
				'payment_type': payment_type,
				'card_holder': card_holder,
				'card_no': card_no,
				'cvv_no': cvv_no,
				'exp_date': exp_date,
				'name': name,
				'contactnumber': contactnumber,
				'note': note,		
				'cost':cost,
				'totcost':totcost,
				'discount_amt':discount_amt,
				'discount_couponcode':couponcode,
				'discount_expirydate':expirydate,
				'discount_percentage':discount_percentage,
				'discount_max_limit':max_limit,
				'discount_reason':reason,
				'discount_status':status,
                'btnhotelbooking': "btnhotelbooking"
			},
			function(data, status){
				alert("Payment done successfully...");
				window.location='hotelbookingreceipt.php?paymentid='+data;
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
<script>
function funverifydiscount(giftcoupon) 
{
	$.post("jsgiftcouponverify.php",
	{
		'giftcoupon': giftcoupon,
		'btngiftcoupon': "btngiftcoupon"
	},
	function(data, status){
		parsed = $.parseJSON(data);
		if(parsed[0]['couponcode'] == 0)
		{
			document.getElementById("divgiftcoupondetail").innerHTML = "<b style='color: red'>This coupon not available..</b>";
		}
		else
		{
			var toatlcost = document.getElementById("cost").value * document.getElementById("nodays").value;
			var ttoalcost = document.getElementById("cost").value * document.getElementById("nodays").value;
			var discountamt = (parsed[0]['discount_percentage'] * ttoalcost)/100;
			if(discountamt > parsed[0]['max_limit'])
			{
				discountamt = parsed[0]['max_limit'];
			}
			ttoalcost = parseFloat(ttoalcost) - parseFloat(discountamt);
			document.getElementById("divgiftcoupondetail").innerHTML = "<b style='color: green'>" + parsed[0]['discount_percentage'] + "% Discount Applied. Max Limit Rs." + parsed[0]['max_limit'] +"</b>";
			document.getElementById("idpaychart").innerHTML = "<table class='table table-striped table-bordered'><tr><th>Cost per day</th><td>Rs. " + document.getElementById("cost").value + "</td></tr><tr><th>No. of days</th><td><?php if($nodays == 1 ){	echo $nodays . ' Day'; 	}	else	{	echo $nodays . ' Days'; 	} 	?></td>		</tr>	<tr>			<th>Sub Total </th><th>Rs. " + toatlcost + "</th>	</tr>	<tr>			<th>Discount Amount</th><th>Rs. " + discountamt + "</th>	</tr>	<tr><th>Total Cost</th><th>Rs. " + ttoalcost + "</th></tr></table>";
			document.getElementById("discount_amt").value = discountamt;
			//###
			document.getElementById("couponcode").value = parsed[0]['couponcode'];
			document.getElementById("expirydate").value = parsed[0]['expirydate'];
			document.getElementById("discount_percentage").value = parsed[0]['discount_percentage'];
			document.getElementById("max_limit").value = parsed[0]['max_limit'];
			document.getElementById("reason").value = parsed[0]['reason'];
			document.getElementById("status").value = parsed[0]['status'];
			//###
		}
	});
}
</script>