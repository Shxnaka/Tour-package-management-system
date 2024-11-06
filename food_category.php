<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE food_category SET food_category='$_POST[food_category]',note='$_POST[note]',status='$_POST[status]' WHERE food_category_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Food category record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO food_category (food_category_id,food_category,note,status) values('$_POST[food_category_id]','$_POST[food_category]','$_POST[note]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Food category has been inserted..');</script>";
			echo "<script>window.location='food_category.php';</script>";
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
	$sqledit = "SELECT * FROM food_category where food_category_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?> 
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Food Category </h2>

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
		Food Category	
	</div>
	<div class="col-md-10">
		<input type="text" name="food_category" placeholder="Enter Food Category"  id="food_category" class="form-control" value="<?php echo $rsedit['food_category']; ?>">
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Note
	</div>
	<div class="col-md-10">
	<textarea placeholder="Write note" name="note" id="note" class="form-control"><?php echo $rsedit['note'];?></textarea>
	</select>
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
