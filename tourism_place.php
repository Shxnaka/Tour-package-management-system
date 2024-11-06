<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$tourism_place = mysqli_real_escape_string($con,$_POST['tourism_place']);
	$description = mysqli_real_escape_string($con,$_POST['description']);
	$feature = mysqli_real_escape_string($con,$_POST['feature']);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE tourism_place SET location_id='$_POST[location_id]',tourism_place='$tourism_place',description='$description',feature='$feature',status='$_POST[status]' WHERE tourism_placeid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Tourism place record updated successfully..');</script>";
		}
	}
	else
	{
		$sql ="INSERT INTO tourism_place(location_id,tourism_place,description,feature,status) values('$_POST[location_id]','$tourism_place','$description','$feature','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Tourism place Record inserted..');</script>";
			echo "<script>window.location='tourism_place.php';</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  tourism_place WHERE tourism_placeid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Tourism place</h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" onsubmit="return validatesubmit()">
<div class="row">
<!-- Hotel Destination Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_hotel_destination fancy-overlay">
		<div class="text">
			
<div class="row"> 
	<div class="col-md-2 boldfont">
		Location
	</div>
	<div class="col-md-10">
		<select placeholder="Enter the location" name="location_id" id="location_id" class="form-control">
			<option value="">Select Location</option>
	<?php
	$sqltourism_location = "SELECT * FROM tourism_location where status='Active'";
	$qsqltourism_location = mysqli_query($con,$sqltourism_location);
	while($rstourism_location = mysqli_fetch_array($qsqltourism_location))
	{
		if($rstourism_location['location_id'] == $rsedit['location_id'])
		{
		echo "<option value='$rstourism_location[location_id]' selected>$rstourism_location[location_name]</option>";
		}
		else
		{
		echo "<option value='$rstourism_location[location_id]'>$rstourism_location[location_name]</option>";
		}
	}
	?>
		</select>
		<span id="errlocation_id" class="errmsg flash"></span>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Tourism place
	</div>
	<div class="col-md-10">
	<input type="text"  name="tourism_place" id="tourism_place" class="form-control" placeholder="Enter Tourism place" value="<?php echo $rsedit['tourism_place']; ?>">
		<span id="errtourism_place" class="errmsg flash"></span>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Description
	</div>
	<div class="col-md-10">
	<textarea placeholder="Enter description" name="description" id="description" class="form-control"><?php echo $rsedit['description'];?></textarea>
<script src="https://cdn.tiny.cloud/1/vkp7vwptosm1ao2ztjqdp0riscxgp2sxw81z6ma02p9h4oqc/tinymce/5/tinymce.min.js" ></script>
<script>tinymce.init({ selector:'textarea' });</script>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Feature
	</div>
	<div class="col-md-10">
	<textarea placeholder="Enter Feature and highlights" name="feature" id="feature" class="form-control"><?php echo $rsedit['feature'];?></textarea>
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
	</select>
		<span id="errstatus" class="errmsg flash"></span>
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

	if(document.getElementById("location_id").value== "")
	{
		document.getElementById("errlocation_id").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Kindly select Location...";
		i=1;
	}
	//
	//errlocation_id errtourism_place errstatus
	
	if(!document.getElementById("tourism_place").value.match(alphaspaceExp))
	{
		document.getElementById("errtourism_place").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Kindly enter valid tourism Place.....";
		i=1;
	}
	if(document.getElementById("tourism_place").value== "")
	{
		document.getElementById("errtourism_place").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Tourism place should not be empty...";
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