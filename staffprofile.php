<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_SESSION['staffid']))
	{
		$sql = "UPDATE staff SET staffname='$_POST[staffname]',stafftype='$_POST[stafftype]',loginid='$_POST[loginid]' WHERE staffid='$_SESSION[staffid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Staff profile updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO staff(staffid,staffname,stafftype,loginid,password,status) values('$_POST[staffid]','$_POST[staffname]','$_POST[stafftype]','$_POST[loginid]','$_POST[password]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('staff deatils entered..');</script>";
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
if(isset($_SESSION['staffid']))
{
	$sqledit = "SELECT * FROM staff where staffid='$_SESSION[staffid]'";
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
<form method="post" action="">
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
		<input type="text" placeholder="Enter the name" name="staffname" id="staffname" class="form-control" value="<?php echo $rsedit['staffname'];?>">
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Staff Type
	</div>
	<div class="col-md-10">
	<select name="stafftype" id="stafftype" class="form-control">
		<?php
		$arr= array("Administrator","Employee");
		foreach($arr as $val)
		{
			if($val == $rsedit['stafftype'])
			{
			echo "<option value='$val' selected>$val</option>";
			}
		}
		?>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Logged in
	</div>
	<div class="col-md-10">
	<input type="text" placeholder="Enter the name" name="loginid" id="loginid" class="form-control" value="<?php echo $rsedit['loginid'];?>">
	</select>
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
