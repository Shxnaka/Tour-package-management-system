<?php
include("header.php"); 
$oldpswd = md5($_POST['oldpswd']);
$newpswd = md5($_POST['newpswd']);
$sql ="UPDATE customer SET password='$newpswd' WHERE password='$oldpswd'  AND customer_id='$_SESSION[customer_id]'";
$qsql = mysqli_query($con,$sql);
if(!$qsql)
{
echo mysqli_error($con);
}
if(mysqli_affected_rows($con) == 1)
{
echo "<script>alert('Customer password updated successfully.');</script>";
}
?>

<!-- contact section -->
<section id="contact" class="parallax-section" style="background-image:url(images/051120081-01-chocolate-irish-whiskey-cake-recipe_xlg.jpg)">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-7 col-sm-7 text-center" style="color:#600">
				<h1 class="heading">Change Password</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 col-md-7 col-sm-9 wow fadeIn" data-wow-delay="0.9s">
				<form action="" method="post" name="frmconfirm" onsubmit="return validateform()">    
					<div class="col-md-12 col-sm-12">
						<input name="oldpswd" type="password" class="form-control" id="oldpswd" placeholder="Old Password">
				  <span id="idoldpaswd" ></span>
                  </div>
					<div class="col-md-12 col-sm-12">
						<input name="newpswd" type="password" class="form-control" id="newpswd" placeholder="New Password">
				  <span id="idnewpaswd" ></span>
                  </div>
                  <div class="col-md-12 col-sm-12">
						<input name="cnfrmpswd" type="password" class="form-control" id="cnfrmpswd" placeholder="Confirm Password">
				  <span id="idcnfrmpaswd" ></span>
                  </div>
					<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="Change Password">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>


<?php
include("footer.php");
?>
<script type="application/javascript">
function validateform()
{
	var errmsg = 0;
    document.getElementById("idoldpaswd").innerHTML = "";
	document.getElementById("idnewpaswd").innerHTML ="";
	document.getElementById("idcnfrmpaswd").innerHTML ="";	
	
	if(document.frmconfirm.oldpswd.value =="")
	{
		document.getElementById("idoldpaswd").innerHTML ="<font color='red'>Please enter your old password.</font>";
		errmsg=1;
	}
	
	if(document.frmconfirm.newpswd.value.length < 6)  
	{
		document.getElementById("idnewpaswd").innerHTML ="<font color='red'>Password should be atleast 6 characters.</font>";
		errmsg=1;
	}
	if(document.frmconfirm.newpswd.value =="")  
	{
		document.getElementById("idnewpaswd").innerHTML ="<font color='red'>Please enter new password.</font>";
		errmsg=1;
	}
	if(document.frmconfirm.cnfrmpswd.value != document.frmconfirm.newpswd.value)
	{
		document.getElementById("idcnfrmpaswd").innerHTML ="<font color='red'>Password and confirm password are not matching.</font>";
		errmsg=1;
	}
	if(document.frmconfirm.cnfrmpswd.value =="")
	{
		document.getElementById("idcnfrmpaswd").innerHTML ="<font color='red'>Please confirm your password.</font>";
		errmsg=1;
	}
	if(errmsg==1)
	{
		return false;
	}
	else
	{
		return true;
	}
}
</script>