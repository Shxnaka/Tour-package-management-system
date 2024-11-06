<?php
include("header.php");
if(isset($_POST['submit']))
{
	$npassword = md5($_POST['npassword']);
	$epassword = md5($_POST['epassword']);
	
	$sql ="UPDATE customer SET password='$npassword' WHERE customer_id='$_SESSION[customer_id]' AND password='$epassword'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==  1)
	{
		echo "<script>alert('Password updated successfully....');</script>";
		echo "<script>window.location='customerchangepassword.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to change password....');</script>";
		echo "<script>window.location='customerchangepassword.php';</script>";
	}
}
?>  
<!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Change Password</h2>
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
		Existing Password
	</div>
	<div class="col-md-10">
		<input type="password" name="epassword" id="epassword" placeholder="Enter the password"  class="form-control"><span id="idepassword"  class="errmsg flash"></span>
	</div>
</div><br>
<div class="row"> 
	<div class="col-md-2 boldfont">
		New Password
	</div>
	<div class="col-md-10">
	<input type="password" name="npassword" id="npassword" placeholder="Enter the new password"  class="form-control"><span id="idnpassword"  class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Confirm Password
	</div>
	<div class="col-md-10">
	<input type="password" name="cpassword" id="cpassword" placeholder="Confirm password"  class="form-control"><span id="idcpassword" class="errmsg flash"></span>
	</select>
	</div>
</div><br>



<div class="row"> 
	<div class="col-md-2">
		
	</div>
	<div class="col-md-10">
		<input type="submit" name="submit" id="submit" class="form-control btn btn-warning" value="Click here to change password" style="width: 250px;height:50px;" >
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
	if(document.getElementById("epassword").value == "")
	{
		document.getElementById("idepassword").innerHTML = "Existing password should not be empty..";
		 i = 1;
	}
	if(document.getElementById("npassword").value.length < 6)
	{
		document.getElementById("idnpassword").innerHTML = "Password should contain more than 6 characters...";
		i = 1;
	}
	if(document.getElementById("npassword").value == "")
	{
		document.getElementById("idnpassword").innerHTML = "New password should not empty...";
		i = 1;
	}
	if(document.getElementById("cpassword").value == "")
	{
		document.getElementById("idcpassword").innerHTML = "Confirm password should not empty...";
		i = 1;
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