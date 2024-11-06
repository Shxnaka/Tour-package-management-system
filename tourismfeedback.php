<?php
if(isset($_POST['submithotelfeedback']))
{
	$feedback_dt= date("Y-m-d");
	$feedback = mysqli_real_escape_string($con,$_POST['feedback']);
	$sql = "INSERT INTO feedback(customer_id,tourism_placeid,feedback,ratings,status,feedback_dt) VALUES('$_SESSION[customer_id]','$_GET[location_id]','$feedback','$_POST[ratings]','Active','$feedback_dt')";
	$qsql = mysqli_query($con,$sql);
	$insid=mysqli_insert_id($con);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
//$files = array_filter($_FILES['photovideo']['customer_name']); //something like that to be used before processing files.
// Count # of uploaded files in array
echo $total = count($_FILES['photovideo']['customer_name']);
// Loop through each file
for( $i=0 ; $i < $total ; $i++ ) 
{
  //Get the temp file path
  $tmpFilePath = $_FILES['photovideo']['tmp_name'][$i];
  //Make sure we have a file path
  if ($tmpFilePath != ""){
    //Setup our new file path
    $newFilePath =  rand() . $_FILES['photovideo']['customer_name'][$i];
    //Upload the file into the temp dir
    if(move_uploaded_file($tmpFilePath, "imgfeedback/".$newFilePath)) {
      //Handle other code here
		$sql="INSERT INTO gallery(gallerytype,tourism_placeid,upload_file,note,status) VALUES('Feedback','$insid','$newFilePath','','Active')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
    }
  }
}
		echo "<SCRIPT>alert('Feedback Published successfully..');</SCRIPT>";
		echo "<script>window.location='feedbackpanel.php?location_id=$_GET[location_id]';</script>";
	}
}
?>
<!-- iqoniq Search Wrapper Start-->
<div class="row" style="padding-left: 10px;padding-right: 10px;">
	<div class="col-md-12">
		<div class="mg_blog_medium fancy-overlay">
			<!-- Nav tabs Start -->
			<ul class="mg_hotel_search" role="tablist">
				<li role="presentation" style="width: 100%;padding-left: 10px;"><a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Post Feedback & Reviews and Earn discount Coupons..</a></li>
			</ul>
			<!-- Nav tabs End -->
			<form method="post" action="" enctype="multipart/form-data">
			<!-- Tab panes Start -->
			<div class="tab-content">
				<!-- Tabs Pane Start -->
				<div role="tabpanel" class="tab-pane active" id="hotels">
					<!-- Search Start -->
					<div class="mg_search_tab">
						<div class="row">
<?php
if(isset($_SESSION['customer_id']))
{
?>
<!-- Input Field Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_input_1">
<textarea name="feedback"  class="form-control" id="feedback" placeholder="Enter Feedback here..." style="color: white;" ></textarea>
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-6 col-sm-6">
	<div class="mg_input_1" style="text-align: left;color: white;">Upload Photos & Videos
		<input type="file" name="photovideo[]" id="photovideo[]" multiple value="Post Feedback" class="btn btn-info" accept="image/*,video/mp4">
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-6 col-sm-6">
	<div class="mg_input_1" style="text-align: left;color: white;">Select Ratings
		<select name="ratings" id="ratings">
			<option value=''>Select Ratings</option>
			<?php
			$arr = array("0","1","2","3","4","5");
			foreach($arr as $val)
			{
				echo "<option value='$val'>$val</option>";
			}
			?>
		</select>
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_input_1">
	<hr>
<center><input type="submit" name="submithotelfeedback" value="Post Feedback" class="btn btn-info"></center>
	</div>
</div>
<!-- Input Field End -->
<?php
}
else
{
?>
<div class="col-md-12 col-sm-12">
	<div class="mg_input_1">
		<centeR><h2 style='font-size:25px;color:blue;'><a href='customerlogin.php' class="btn btn-info"  data-toggle="modal" data-target="#reg-box" >Login to post feedback</a></h2></center>
	</div>
</div>
<?php
}
?>
						</div>
					</div>
					<!-- Search End -->
				</div>
				<!-- Tabs Pane End -->
			</div>
			<!-- Tab panes End -->
			</form>
		</div>
	</div>
</div>
<!-- iqoniq Search Wrapper End-->

<script>
function validateform()
{
     if(document.getElementById("feedback").value == "")
	{
		alert("Feedback should not be empty..");
		return false;
	}
	else if(document.getElementById("ratings").value == "")
	{
		alert("Kindly enter Ratings..");
		return false;
	}
	else
	{
		return true;
	}
}
</script>