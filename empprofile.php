<?php
include("header.php");
if(!isset($_SESSION["employeeid"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST["submit"]))
{
	$sql = "UPDATE employee SET emp_name='$_POST[emp_name]',login_id='$_POST[login_id]' WHERE employee_id='$_SESSION[employeeid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('employee Profile updated successfully..');</script>";
	}
}

if(isset($_SESSION["employeeid"]))
{
	$sqledit = "SELECT * FROM employee WHERE employee_id='$_SESSION[employeeid]'";
	$qsqledit= mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
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
              <h2 class="title text-uppercase line-bottom-double-line-centered" data-aos="fade-up"  data-aos-duration="600"> <span class="text-theme-colored">Employee</span> Profile</h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="icon-box left media border-1px mb-30 p-30 pb-20"> <a class="media-left pull-left flip" href="#"><i class="flaticon-user text-theme-colored"></i></a>
                <div class="media-body">
                  <h5 class="media-heading heading" data-aos="fade-down"  data-aos-duration="600">Update Employee Profile..</h5>
                  <p data-aos="fade-up"  data-aos-duration="600">

<form  action="" method="post" onsubmit="return validateform()">


<div class="controls">
<label class="control-label">Employee Name: </label>
<span id='idemp_name' style="color:red;"></span>
<input class="billing-address-name form-control" type="text" name="emp_name" id="emp_name" placeholder="Employee name" value="<?php echo $rsedit['emp_name']; ?>">
</div>


<div class="w3_agileits_card_number_grid_left">
	<div class="controls">
		<label class="control-label">Login ID:</label>
		<span id='idlogin_id' style="color:red;"></span>
		<input name="login_id" id="login_id" class="form-control" type="text" placeholder="Login ID" value="<?php echo $rsedit['login_id']; ?>">
	</div>
</div>	

<br>
	<div class="col-xs-12 col-sm-12 col-md-12">
		<input type="submit" value="Submit" name="submit" class="form-control">
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
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id	
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space	      
	$("span").html("");
	var i=0;
	/* ########end 1######## */
	
	if(!document.getElementById("emp_name").value.match(alphaspaceExp))
	{
		document.getElementById("idemp_name").innerHTML ="Customer name should contain only alphabets....";	
		i=1;		
	}
	if(document.getElementById("emp_name").value == "")
	{
		document.getElementById("idemp_name").innerHTML ="Customer name should not be empty....";	
		i=1;		
	}
	if(!document.getElementById("login_id").value.match(alphaExp))
	{
		document.getElementById("idlogin_id").innerHTML ="Entered login ID is not valid...";	
		i=1;		
	}
	if(document.getElementById("login_id").value == "")
	{
		document.getElementById("idlogin_id").innerHTML ="Login ID should not be empty....";	
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