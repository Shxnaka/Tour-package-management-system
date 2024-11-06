<?php
include("header.php");
if(!isset($_SESSION['customer_id']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_SESSION['customer_id']))
	{
		$sql = "UPDATE customer SET customer_name='$_POST[customer_name]',address='$_POST[address]',city='$_POST[city]',pincode='$_POST[pincode]',contact_no='$_POST[contact_no]',email_id='$_POST[email_id]' WHERE customer_id='$_SESSION[customer_id]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Customer Profile updated successfully..');</script>";
		}
	}
}
if(isset($_SESSION['customer_id']))
{
	$sqledit = "SELECT * FROM customer where customer_id='$_SESSION[customer_id]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Customer Details </h2>

                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" onsubmit="return validateform()">
<div class="row">
<!-- Hotel Destination Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_hotel_destination fancy-overlay">
		<div class="text">
			
<div class="row"> 
	<div class="col-md-2 boldfont">
		Name
	</div>
	<div class="col-md-10">
		<input type="text" placeholder="Enter Your Name" name="customer_name" id="customer_name" class="form-control" value="<?php echo $rsedit['customer_name']; ?>"><span id="errcustomer_name" class="errmsg flash"></span>
	</select>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Address
	</div>
	<div class="col-md-10">
	<textarea placeholder="Enter Address" name="address" id="address" class="form-control" ><?php echo $rsedit['address']; ?></textarea><span id="erraddress" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		City
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter City" name="city" id="city" class="form-control" value="<?php echo $rsedit['city']; ?>"><span id="errcity" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Pincode
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter Pincode" name="pincode" id="pincode" class="form-control" value="<?php echo $rsedit['pincode']; ?>"><span id="errpincode" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Contact No
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter Contact Number" name="contact_no" id="contact_no" class="form-control" value="<?php echo $rsedit['contact_no']; ?>"><span id="errcontact" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Email Id
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter Email Id" name="email_id" id="email_id" class="form-control" value="<?php echo $rsedit['email_id']; ?>"><span id="erremail_id" class="errmsg flash"></span>
	</div>
</div><br>
<div class="row"> 
	<div class="col-md-2">
		
	</div>
	<div class="col-md-10">
		<input type="submit" name="submit" id="submit" class="form-control btn btn-warning " style="width: 250px;height:50px;" >
	</div>
</div><br>
</form>
		</div>
	</div>
</div>
<!-- Hotel Destination End -->


						</div>
                    </div>
                </section>
            </div>
            <!-- Main Contant Wrap End -->
<script>
 function validateform()
{
	
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	
	
	var i = 0;
	$( ".errmsg" ).empty();
	
	if(!document.getElementById("customer_name").value.match(alphaspaceExp))
	{
		document.getElementById("errcustomer_name").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Entered customer name is not valid";
		i=1;
	}
	if(document.getElementById("customer_name").value== "")
	{
		document.getElementById("errcustomer_name").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Customer name should not be empty";
		i=1;
	}
	if(document.getElementById("address").value== "")
	{
		document.getElementById("erraddress").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Enter the address";
		i=1;
	}
	if(document.getElementById("city").value== "")
	{
		document.getElementById("errcity").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Enter the city name";
		i=1;
	}
	if(!document.getElementById("pincode").value.match(numericExpression))
	{
		document.getElementById("errpincode").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly enter valid PIN code...";
		i=1;
	}
	if(document.getElementById("pincode").value.length != 6)
	{
		document.getElementById("errpincode").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>PIN Code should contain 6 digits...";
		i=1;
	}
	if(document.getElementById("pincode").value== "")
	{
		document.getElementById("errpincode").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>PIN Code should not be empty...";
		i=1;
	}

	if(!document.getElementById("contact_no").value.match(numericExpression))
	{
		document.getElementById("errcontact").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Enter the Contact number...";
		i=1;
	}
	if(document.getElementById("contact_no").value.length != 10)
	{
		document.getElementById("errcontact").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Contact number should contain 10 digits...";
		i=1;
	}
	if(document.getElementById("contact_no").value== "")
	{
		document.getElementById("errcontact").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Contact number should not be empty...";
		i=1;
	}

	if(!document.getElementById("email_id").value.match(emailpattern))
	{
		document.getElementById("erremail_id").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Entered Email ID is not valid...";
		i=1;
	}
	if(document.getElementById("email_id").value== "")
	{
		document.getElementById("erremail_id").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Email ID should not be empty...";
		i=1;
	}

	if(i == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<?php
include("footer.php");
?> 
