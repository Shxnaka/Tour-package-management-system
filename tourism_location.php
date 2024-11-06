<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$tourismdescription = mysqli_real_escape_string($con,$_POST['description']);
	$location_img = rand() . $_FILES['location_img']['customer_name'];
	move_uploaded_file($_FILES['location_img']['tmp_name'],"imglocation/".$location_img);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE tourism_location SET location_name='$_POST[location_name]'";
		if($_FILES['location_img']['customer_name'] != "")
		{
		$sql  = $sql . ",location_img='$location_img'";
		}
		$sql = $sql . ",description='$tourismdescription',status='$_POST[status]' WHERE location_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Tourism Location record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO tourism_location(location_name,location_img,description,status) values('$_POST[location_name]','$location_img','$tourismdescription','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Tourism Location record inserted successfully....');</script>";
			echo "<script>window.location='tourism_location.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  tourism_location WHERE location_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Tourism location</h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" enctype="multipart/form-data"  onsubmit="return validatesubmit()" >
<div class="row">
<!-- Hotel Destination Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_hotel_destination fancy-overlay">
		<div class="text">
			
<div class="row"> 
	<div class="col-md-2 boldfont">
		Location Name
	</div>
	<div class="col-md-10">
		<input type="text" placeholder="Enter the name of Location" name="location_name" id="location_name" class="form-control" value="<?php echo $rsedit['location_name'];?>">
		<span id="errlocation_name" class="errmsg flash"></span>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Images
	</div>
	<div class="col-md-10">
	<input type="file" name="location_img" id="location_img" class="form-control">
	<span id="errlocation_img" class="errmsg flash"></span>
	<?php
	if(isset($_GET['editid']))
	{
		if($rsedit['location_img'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists("imglocation/" . $rsedit['location_img']))
		{
			$img = "imglocation/" . $rsedit['location_img'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}
		echo "<img src='$img' style='width: 125px; height: 100px;' >";
	}
	?>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Description
	</div>
	<div class="col-md-10">
	<textarea placeholder="Enter Description" name="description" id="description" class="form-control"><?php echo $rsedit['description'];?></textarea>
<script src="https://cdn.tiny.cloud/1/vkp7vwptosm1ao2ztjqdp0riscxgp2sxw81z6ma02p9h4oqc/tinymce/5/tinymce.min.js" ></script>
<script>tinymce.init({ selector:'textarea' });</script>
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
function validatesubmit()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	
	
	var i = 0;
	$( ".errmsg" ).empty();
	if(!document.getElementById("location_name").value.match(alphaspaceExp))
	{
		document.getElementById("errlocation_name").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Location name is not valid.....";
		i=1;
	}
	if(document.getElementById("location_name").value== "")
	{
		document.getElementById("errlocation_name").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Location name should not be empty...";
		i=1;
	}
	//errlocation_name errlocation_img errstatus
	if(document.getElementById("location_img").value== "")
	{
		document.getElementById("errlocation_img").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly upload Image...";
		i=1;
	}
	if(document.getElementById("status").value== "")
	{
		document.getElementById("errstatus").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Kindly select status...";
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