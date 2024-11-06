<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	$upload_file = rand() . $_FILES['upload_file']['customer_name'];
	move_uploaded_file($_FILES['upload_file']['tmp_name'],"imggallery/".$upload_file);
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE gallery SET gallerytype='$_POST[gallerytype]',tourism_placeid='$_POST[tourism_placeid]'";
		if($_FILES['upload_file']['name'] != "")
		{
		$sql = $sql . ",upload_file='$upload_file'";
		}
		$sql = $sql  . ",note='$_POST[note]',status='$_POST[status]' WHERE galleryid='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Gallery record updated successfully..');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
	else
	{
		$sql ="INSERT INTO gallery(gallerytype,tourism_placeid,upload_file,note,status) values('$_POST[gallerytype]','$_POST[tourism_placeid]','$upload_file','$_POST[note]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==  1)
		{
			if($_POST['gallerytype'] == "Photo Gallery")
			{
			echo "<script>alert('Photo has been uploaded..');</script>";
			}
			if($_POST['gallerytype'] == "Video Gallery")
			{
			echo "<script>alert('Video has been uploaded..');</script>";
			}
			echo "<script>window.location='viewgallery.php?tourism_placeid=$_GET[tourism_placeid]';</script>";
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
	$sqledit = "SELECT * FROM  gallery WHERE galleryid='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Gallery</h2>

                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" enctype="multipart/form-data">
<input type="hidden" name="tourism_placeid" id="tourism_placeid" value="<?php echo $_GET['tourism_placeid']; ?>" >
<div class="row">
<!-- Hotel Destination Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_hotel_destination fancy-overlay">
		<div class="text">
			
<div class="row"> 
	<div class="col-md-2 boldfont">
		Gallery Type
	</div>
	<div class="col-md-10">
		<select name="gallerytype"  id="gallerytype" class="form-control">
		<option value="">Select the Gallery Type</option>
		<?php 
		$arr = array("Photo Gallery","Video Gallery");
		foreach($arr as $val)
		{
			if($val == $rsedit['gallerytype'])
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
	<div class="col-md-2 boldfont">
		Upload the File
	</div>
	<div class="col-md-10">
	<input type="file" placeholder="Enter the name" name="upload_file" id="upload_file" class="form-control">
	<?php
	if(isset($_GET['editid']))
	{
		if($rsedit['upload_file'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists("imggallery/" . $rsedit['upload_file']))
		{
			$img = "imggallery/" . $rsedit['upload_file'];
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
		Note
	</div>
	<div class="col-md-10">
	<textarea placeholder="Enter your note" name="note" id="note" class="form-control" ><?php echo $rsedit['note'];?></textarea>
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
