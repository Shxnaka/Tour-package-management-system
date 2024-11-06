<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	//echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$password = md5($_POST['password']);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE customer SET customer_name='$_POST[customer_name]',address='$_POST[address]',city='$_POST[city]',pincode='$_POST[pincode]',contact_no='$_POST[contact_no]',email_id='$_POST[email_id]',password='$password',status='$_POST[status]' WHERE customer_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Customer record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO customer (customer_name,address,city,pincode,contact_no,email_id,password,status) values('$_POST[customer_name]','$_POST[address]','$_POST[city]','$_POST[pincode]','$_POST[contact_no]','$_POST[email_id]','$password','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Customer details accepted..');</script>";
			echo "<script>window.location='customer.php';</script>";
		}
		else
		{
			echo "<script>alert('Customer account already registered with this Email ID.....');</script>";
			//echo mysqli_error($con);
		}
	}
}
?>  
<?php
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM customer where customer_id='$_GET[editid]'";
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
		<input type="text" placeholder="Enter Your Name" name="customer_name" id="customer_name" class="form-control" value="<?php echo $rsedit['customer_name'];?>"><span id="errcustomer_name" class="errmsg flash"></span>
	</select>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Password
	</div>
	<div class="col-md-10">
	<input type="password" placeholder="Enter Password" name="password" id="password" class="form-control"><span id="errpassword" class="errmsg flash"></span>
	</div>
</div><br>


<div class="row"> 
	<div class="col-md-2 boldfont">
		Confirm Password
	</div>
	<div class="col-md-10">
	<input type="password" placeholder="confirm Password" name="cpassword" id="cpassword" class="form-control"><span id="errcpassword" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Address
	</div>
	<div class="col-md-10">
	<textarea placeholder="Enter Address" name="address" id="address" class="form-control" ><?php echo $rsedit['address'];?></textarea><span id="erraddress" class="errmsg flash"></span>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		City
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter City" name="city" id="city" class="form-control" value="<?php echo $rsedit['city'];?>"><span id="errcity" class="errmsg flash"></span>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Pincode
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter Pincode" name="pincode" id="pincode" class="form-control" value="<?php echo $rsedit['pincode'];?>"><span id="errpincode" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Contact No
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter Contact Number" name="contact_no" id="contact_no" class="form-control" value="<?php echo $rsedit['contact_no'];?>"><span id="errcontact_no" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Email Id
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter Email Id" name="email_id" id="email_id" class="form-control" value="<?php echo $rsedit['email_id'];?>"><span id="erremail_id" class="errmsg flash"></span>
	</div>
</div><br>


<div class="row"> 
	<div class="col-md-2 boldfont">
		Status
	</div>
	<div class="col-md-10">
	<select name="status" id="status" class="form-control">
		<option value="">Select status</option>
		<?php
		$arr = array("Active","Inactive");
		foreach($arr as $val)
		{
			if($val == $rsedit['status'])
			{
			echo "<option value='$val' selected>$val</option>";
			}
			else
			{
			echo "<option value='$val'>$val</option>";
			}
		}
		?>
	</select><span id="errstatus" class="errmsg flash"></span>
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
     <?php
include("footer.php");
?>
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
		
	if(document.getElementById("password").value.length < 8)
	{
		document.getElementById("errpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Password should contain more than 8 characters";
		i=1;
	}
	
	
	if(document.getElementById("password").value== "")
	{
		document.getElementById("errpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Password should not be empty...";
		i=1;
	}
	
	if(document.getElementById("password").value != document.getElementById("cpassword").value)
	{
		document.getElementById("errcpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Password and confirm password not matching...";
		i=1;
	}
	if(document.getElementById("cpassword").value== "")
	{
		document.getElementById("errcpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Confirm Password should not be empty...";
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
	if(document.getElementById("pincode").value.match(numericExpression))
	{
		document.getElementById("errpincode").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Pincode should be entered";
		i=1;
	}
	if(document.getElementById("contact_no").value.match(numericExpression))
	{
		document.getElementById("errcontact").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Enter the Contact number";
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

	if(document.getElementById("status").value== "")
	{
		document.getElementById("errstatus").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Status should not be empty...";
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