<?php
include("header.php");
if(!isset($_SESSION["employeeid"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST["submit"]))
{
	$sql = "UPDATE employee SET password='$_POST[npass]' WHERE employee_id='$_SESSION[employeeid]' AND password='$_POST[opass]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Employee password changed successfully..');</script>";
	}
	else
	{
		echo "<script>alert('Failed to Change password..');</script>";
	}
}
?>
  <!-- Start main-content -->
  <div class="main-content">

  
    
    <!-- Section: Features  -->
    <section>
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="title text-uppercase line-bottom-double-line-centered" data-aos="fade-up"  data-aos-duration="600"> <span class="text-theme-colored">Employee</span> - Change Password </h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="icon-box left media border-1px mb-30 p-30 pb-20"> <a class="media-left pull-left flip" href="#"><i class="flaticon-user text-theme-colored"></i></a>
                <div class="media-body">
                  <h5 class="media-heading heading" data-aos="fade-down"  data-aos-duration="600">Enter Old password, New password and confirm password..</h5>
                  <p data-aos="fade-up"  data-aos-duration="600">

<form  action="" method="post" onsubmit="return validateform()">


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Old password:</label>
		<span id='idopass' style="color:red;"></span>
		<input name="opass" id="opass" class="form-control" type="password" placeholder="Enter old password" >
	</div>
</div>	
<br>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">New Password:</label>
		<span id='idnpass' style="color:red;"></span>
		<input name="npass" id="npass"class="form-control" type="password" placeholder="Enter New password" >
	</div>
</div>	
<br>
<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Confirm Password:</label>
		<span id='idcpass' style="color:red;"></span>
		<input name="cpass" id="cpass" class="form-control" type="password" placeholder="Confirm New password" >
	</div>
</div>	

<br>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<input type="submit" value="Click here to Change Password" name="submit" class="form-control">
	</div>
</form>
				  
				  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


   
  </div>
  <!-- end main-content -->
<?php
include("footer.php");
?>
<script>
function validateform()
{
	/* #######start 1######### */
	
	
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	
			      
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(!document.getElementById("opass").value.match(alphanumericExp))
	{
		document.getElementById("idopass").innerHTML ="Old password should contain only alphabets and numbers....";	
		i=1;		
	}
	if(document.getElementById("opass").value == "")
	{
		document.getElementById("idopass").innerHTML ="Old password should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("npass").value.match(alphanumericExp))
	{
		document.getElementById("idnpass").innerHTML ="New password should contain only alphabets and numbers....";		
		i=1;		
	}
	if(document.getElementById("npass").value == "")
	{
		document.getElementById("idnpass").innerHTML ="New password should not be empty....";	
		i=1;		
	}	
	if(document.getElementById("cpass").value != document.getElementById("npass").value )
	{
		document.getElementById("idcpass").innerHTML ="Confirm password Must match with new password..";	
		i=1;		
	}
	if(document.getElementById("cpass").value == "")
	{
		document.getElementById("idcpass").innerHTML ="Confirm Password should not be empty....";	
		i=1;		
	}
	
	
	/* #######start 2######### */
	if(i==0)
	{
		return true;
	}
	else
	{
	return false;
	}
	/* #######end 2######### */
}
</script>