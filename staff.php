<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$pwd = md5($_POST['password']);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE staff SET staffname='$_POST[staffname]',stafftype='$_POST[stafftype]',loginid='$_POST[loginid]'";
		if($_POST['password'] != "")
		{
		$sql = $sql . ",password='$pwd'";
		}
		$sql = $sql . ",status='$_POST[status]' WHERE staffid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Staff record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO staff(staffid,staffname,stafftype,loginid,password,status) values('$_POST[staffid]','$_POST[staffname]','$_POST[stafftype]','$_POST[loginid]','$pwd','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('staff deatils inserted successfully..');</script>";
			echo "<script>window.location='staff.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
?>  
<?php
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM staff where staffid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?> 
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Staff deatils</h2>
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
		<input type="text" placeholder="Enter the name" name="staffname" id="staffname" class="form-control" value="<?php echo $rsedit['staffname'];?>"><span id="errstaffname" class="errmsg flash"></span>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Staff Type
	</div>
	<div class="col-md-10">
	<select name="stafftype" id="stafftype" class="form-control">
		<option value="">Select the staff type</option>
		<?php
		$arr= array("Administrator","Employee");
		foreach($arr as $val)
		{
			if($val == $rsedit['stafftype'])
			{
			echo "<option value='$val' selected>$val</option>";
			}
			else
			{
			echo "<option value='$val'>$val</option>";
			}
		}
		?>
	</select><span id="errstafftype" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Login ID
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="loginid" id="loginid" class="form-control" value="<?php echo $rsedit['loginid'];?>"><span id="errloginid" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Password
	</div>
	<div class="col-md-10">
	<input type="password" placeholder="Enter Password" name="password" id="password" class="form-control" ><span id="errpassword" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Confirm Password
	</div>
	<div class="col-md-10">
	<input type="password" placeholder="Confirm Password" name="cpassword" id="cpassword" class="form-control" ><span id="errcpassword" class="errmsg flash"></span>
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
	
	if(!document.getElementById("staffname").value.match(alphaspaceExp))
	{
		document.getElementById("errstaffname").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Entered staff name is not valid.....";
		i=1;
	}
	if(document.getElementById("staffname").value== "")
	{
		document.getElementById("errstaffname").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Staff name should not be empty...";
		i=1;
	}
	if(document.getElementById("stafftype").value== "")
	{
		document.getElementById("errstafftype").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly select staff type...";
		i=1;
	}
	if(!document.getElementById("loginid").value.match(emailpattern))
	{
		document.getElementById("errloginid").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Entered Email ID is not valid...";
		i=1;
	}
	if(document.getElementById("loginid").value== "")
	{
		document.getElementById("errloginid").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Login ID should not be empty...";
		i=1;
	}
	
	if(document.getElementById("password").value.length < 8)
	{
		document.getElementById("errpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Password should contain more than 8 characters...";
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