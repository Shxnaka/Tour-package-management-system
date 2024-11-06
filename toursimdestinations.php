<?php
error_reporting(0);
include("header.php");
?>
	
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">

                <!-- Call to Action Section Start-->
                <section class="mg_travelplan" style="background-image: url('images/tourismlocation.jpg');">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1 white">
                            <h6>Toursim Destinations</h6>
                            <h4>Start making your Travel Plans</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <!-- Caption Start -->
                        <div class="mg_plan_caption">
                            <p>Find out everything about India Tour & Travel e.g. tour packages, tourist attractions, holiday destinations, festivals & travel tips, where to stay, what to do & more.
.</p>
                        </div>
                        <!-- Caption End -->
                    </div>
                </section>
                <!-- Call to Action Section End-->

            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
                        <div class="row">
<?php
$i=0;
$sqltourism_location ="SELECT * FROM tourism_location WHERE status='Active'";
$qsqltourism_location =mysqli_query($con,$sqltourism_location);
while($rstourism_location = mysqli_fetch_array($qsqltourism_location))
{
		if($rstourism_location['location_img'] == "")
		{
			$img =  "images/nophoto.jpg";
		}
		else if(file_exists("imglocation/".$rstourism_location['location_img']))
		{
			$img = "imglocation/".$rstourism_location['location_img'];
		}
		else
		{
			$img =  "images/nophoto.jpg";
		}
	$sqltourism_place ="SELECT tourism_place.*,tourism_location.location_name FROM tourism_place LEFT JOIN tourism_location ON tourism_location.location_id=tourism_place.location_id WHERE tourism_location.location_id='$rstourism_location[0]'";
	$qsqltourism_place =mysqli_query($con,$sqltourism_place);
?>			
<!-- iqoniq Blog Medium Start -->
<div class="col-md-4 col-sm-6">
	<div class="mg_blog_medium fancy-overlay">
		<h6><a href="tourismlocationdeail.php?location_id=<?php echo $rstourism_location[0]; ?>"><?php echo $rstourism_location['location_name']; ?></a></h6>
		<figure>
			<a href="tourismlocationdeail.php?location_id=<?php echo $rstourism_location[0]; ?>"><img src="<?php echo $img; ?>" alt="" style="height: 250px;"></a>
		</figure>
		<div class="text">
			<ul class="blog-meta-list">
				<li><a href="#"><i class="fa fa-building"></i><span><?php
				$sqlhotel = "SELECT * FROM hotel where location_id='$rstourism_location[location_id]'";
				$qsqlhotel = mysqli_query($con,$sqlhotel);
				echo mysqli_num_rows($qsqlhotel);
				?> hotels</span></a></li>
				<li><a href="#"><i class="fa fa-comments-o"></i><span><?php echo mysqli_num_rows($qsqltourism_place); ?> places</span></a></li>
			</ul>
			<div class="clear"></div>
			<?php /*<p><?php echo $rstourism_location['description']; ?></p>*/?>
			<center><a class="mg_btn1" href="tourismlocationdeail.php?location_id=<?php echo $rstourism_location[0]; ?>">Explore Now</a></center>
		</div>
	</div>
</div>
<!-- iqoniq Blog Medium End -->
<?php
}
?>			
                        </div>
                    </div>
                </section>
            </div>
            <!-- Main Contant Wrap End -->

            </div>
            <!-- iqoniq Contant Wrapper End-->  
<?php
include("footer.php");
?>