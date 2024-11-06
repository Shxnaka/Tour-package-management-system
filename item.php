<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$imgname = rand(). $_FILES["item_img"]["name"];
	move_uploaded_file($_FILES["item_img"]["tmp_name"],"imgitem/".$imgname);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE item SET item_name='$_POST[item_name]',hotel_id='$_POST[hotel_id]'";
		if($_FILES["item_img"]["name"] != "")
		{
		$sql = $sql . ",item_img='$imgname'";
		}
		$sql = $sql . ",food_category_id='$_POST[food_category_id]',item_description='$_POST[item_description]',item_cost='$_POST[item_cost]',status='$_POST[status]',location_id='$_POST[location_id]' WHERE item_id='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Item deatils updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO item(item_name,hotel_id,food_category_id,item_description,item_cost,status,item_img,location_id) values('$_POST[item_name]','$_POST[hotel_id]','$_POST[food_category_id]','$_POST[item_description]','$_POST[item_cost]','$_POST[status]','$imgname','$_POST[location_id]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Items added..');</script>";
			echo "<script>window.location='item.php';</script>";
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
	$sqledit = "SELECT * FROM item where item_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Item</h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" enctype="multipart/form-data">
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
	<select name="location_id" id="location_id" class="form-control" onchange="funloadhotel(this.value)">
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
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Hotel name
	</div>
	<div class="col-md-10" id="divhotel"><?php include("ajaxhotel.php"); ?></div>
</div><br>


<div class="row"> 
	<div class="col-md-2 boldfont">
		Item Name
	</div>
	<div class="col-md-10">
	<input type="text" name="item_name" id="item_name" class="form-control" value="<?php echo $rsedit['item_name']; ?>">
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Item Image
	</div>
	<div class="col-md-10">
	<input type="file" name="item_img" id="item_img" class="form-control">
	<?php
	if(isset($_GET['editid']))
	{
		if(file_exists("imgitem/".$rsedit['item_img']))
		{
			$imgname = "imgitem/".$rsedit['item_img'];
		}
		else
		{
			$imgname="images/nophoto.jpg";
		}
		echo '<img style="width: 200px; height: 250px;" src="<?php echo $imgname; ?>">';
	}
	?>
	</div>
</div><br>
	
<div class="row"> 
	<div class="col-md-2 boldfont">
		Food category
	</div>
	<div class="col-md-10">
	<select name="food_category_id" id="food_category_id" class="form-control">
		<option value="">Select the food category</option>
		<?php
	$sqlfood_category = "SELECT * FROM food_category where status='Active'";
	$qsqlfood_category = mysqli_query($con,$sqlfood_category);
	while($rsfood_category = mysqli_fetch_array($qsqlfood_category))
	{
		if($rsfood_category['food_category_id'] == $rsedit['food_category_id'])
		{
		echo "<option value='$rsfood_category[food_category_id]' selected>$rsfood_category[food_category]</option>";
		}
		else
		{
		echo "<option value='$rsfood_category[food_category_id]'>$rsfood_category[food_category]</option>";
		}
	}
	?>
	</select>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Item description
	</div>
	<div class="col-md-10">
	<textarea name="item_description" id="item_description" class="form-control"><?php echo $rsedit['item_description']; ?></textarea>
	</div>
</div><br>

<div class="row"> 
	<div class="col-md-2 boldfont">
		Cost
	</div>
	<div class="col-md-10">
	<input type="text" name="item_cost" id="item_cost" class="form-control" value="<?php echo $rsedit['item_cost']; ?>">
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
<script>
function funloadhotel(location_id)
{
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("divhotel").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "ajaxhotel.php?location_id=" + location_id, true);
    xmlhttp.send();
}
</script>