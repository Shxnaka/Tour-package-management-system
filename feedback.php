<?php
if(isset($_POST['submithotelfeedback']))
{
	$feedback_dt= date("Y-m-d");
	$feedback = mysqli_real_escape_string($con,$_POST['feedback']);
	$sql = "INSERT INTO feedback(customer_id,hotel_id,feedback,ratings,status,feedback_dt) VALUES('$_SESSION[customer_id]','$_GET[hotelid]','$feedback','$_POST[ratings]','Active','$feedback_dt')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		echo "<SCRIPT>alert('Feedback record inserted successfully..');</SCRIPT>";
		echo "<script>window.location='hoteldetails.php?hotelid=$_GET[hotelid]&location_id=$_GET[location_id]';</script>";
	}
}
?>
<!-- iqoniq Search Wrapper Start-->
<div class="row" style="padding-left: 65px;padding-right: 65px;">
	<div class="col-md-12">
		<div class="mg_blog_medium fancy-overlay">
			<!-- Nav tabs Start -->
			<ul class="mg_hotel_search" role="tablist">
				<li role="presentation" style="width: 100%;padding-left: 10px;"><a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Feedback & Reviews</a></li>
			</ul>
			<!-- Nav tabs End -->
			<form method="post" action="" onsubmit="return validateform()">
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
<textarea name="feedback"  class="form-control" id="feedback" placeholder="Enter Feedback here..." ></textarea>
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_input_1">
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
<input type="submit" name="submithotelfeedback" value="Post Feedback" class="btn btn-info">
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




            <!-- Sub Banner Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Blog Detail Wrap Start -->
                                <div class="mg_blog_detail_wrap">
                                    <!-- Blog Comment Wrap Start -->
                                    <div class="mg_comment_wrap">
<?php
$sqlfeedback = "SELECT * FROM feedback LEFT JOIN customer ON feedback.customer_id=customer.customer_id LEFT JOIN hotel ON feedback.hotel_id=hotel.hotel_id WHERE hotel.hotel_id='$_GET[hotelid]' order by feedback.feedback_id DESC";
$qsqlfeedback = mysqli_query($con,$sqlfeedback);
echo mysqli_error($con);
?>					
<h5 class="blog_main_title">
<?php
			if(mysqli_num_rows($qsqlfeedback) == 0)
					{
			//echo "Feedback not published yet..";
?>
	<li>
		<div class="mg_comment_dec">
			<div class="overflow_text">
				<h6>Feedback not published yet..</h6>
			</div>
		</div>
	</li>
<?php
					}
					else
					{
			echo mysqli_num_rows($qsqlfeedback) . " comments..";
					}
?>
</h5>
<?php
		if(mysqli_num_rows($qsqlfeedback) != 0)
					{
?>
<ul>
<?php
while($rsfeedback = mysqli_fetch_array($qsqlfeedback))
			{
?>
	<li>
		<div class="mg_comment_dec">
			<figure><img src="images/person-icon.png" alt=""></figure>
			<div class="overflow_text">
				<h6><a href="#"><?php echo $rsfeedback['customer_name']; ?></a><span>( Ratings : <?php echo $rsfeedback['ratings']; ?>)</span></h6>
				<p><?php echo $rsfeedback['feedback']; ?></p>
			</div>
		</div>
	</li>
<?php
			}
?>
</ul>
<?php
					}
?>
                                    </div>
                                    <!-- Blog Comment Wrap End -->
                                </div>
                                <!-- Blog Detail Wrap End -->
                            </div>

                        </div>
                    </div>
                </section>
            </div>




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