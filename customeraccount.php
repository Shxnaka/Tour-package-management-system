<?php
error_reporting(0);
include("header.php");
include("slider.php");

?>
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">


            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>What are you in the Mood for.?</h6>
                            <h4>Book top Tourism destinations</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                    <div class="container">
                        <div class="row">
<?php
$i=0;
$sqltourism_location ="SELECT * FROM tourism_location WHERE status='Active' LIMIT 6 ";
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
		<h6><a href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>"><?php echo $rstourism_location['location_name']; ?></a></h6>
		<figure>
			<a href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>"><img src="<?php echo $img; ?>" alt="" style="height: 275px;"></a>
		</figure>
		<div class="text">
			<ul class="blog-meta-list">
				<li><a href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>"><i class="fa fa-building"></i><span>
				<?php
				$sqlhotel = "SELECT * FROM hotel where location_id='$rstourism_location[location_id]'";
				$qsqlhotel = mysqli_query($con,$sqlhotel);
				echo mysqli_num_rows($qsqlhotel);
				?> hotels
				</span></a></li>
				<li><a href="#"><i class="fa fa-map-marker"></i><span><?php echo mysqli_num_rows($qsqltourism_place); ?> places</span></a></li>
			</ul>
			<div class="clear"></div>
			<hr>
			<a class="mg_readmore" href="displayhotel.php?location_id=<?php echo $rstourism_location['location_id']; ?>">Click here to Book</a>
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


				<!-- Why Chooses us Section Start -->
                <section class="why_chooseus">
                    <div class="container-fluid">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1 white">
                            <h6>The Very Best Of Travel, Chosen By Millions Of Travelers</h6>
                            <h4>Why choose Atithi Devo Bhava</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <!-- Chooseus Slider Start -->
                            <div class="chooseus_slider">
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="images/places.png" style="height: 200px;" alt="">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">Tourism Locations</a></h5>
                                            <p>Come and Visit most famous tourist places in India.. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_2.jpg" alt="" style="height: 200px;">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">I Love travelling?</a></h5>
                                            <p>Then our website is right place to discover your Journey..</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_3.jpg" alt="" style="height: 200px;">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">handpicked hotels</a></h5>
                                            <p>Book at Over 1000 Hotels All over India. Quick, Easy Booking. Great Rates.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="extra-images/choose_4.jpg" alt="" style="height: 200px;">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">rent a car</a></h5>
                                            <p>Search, Compare and Save Using the Biggest Online Car Rental Service. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="images/onlinefoodorder.jpg" alt="" style="height: 200px;">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">Online Food Order</a></h5>
                                            <p>Order Online Cheap Veg and Non-veg Food & Enjoy Journey. </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                                <!-- Chooseus Thumb Start -->
                                <div class="col-md-4">
                                    <div class="mg_chooseus fancy-overlay">
                                        <figure>
                                            <img src="images/feedbackandreview.jpg" alt="" style="height: 200px;">
                                        </figure>
                                        <div class="text">
                                            <h5><a href="#">Online Review</a></h5>
                                            <p>Post your Travel & Journey Experience and Earn Free Gift Coupons.</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- Chooseus Thumb End -->
                            </div>
                            <!-- Chooseus Slider Ens -->
                        </div>
                    </div>
                </section>
                <!-- Why Chooses us Section End -->
            


			
                <section>
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>What are you in the Mood for.?</h6>
                            <h4>Book top Tourism destinations</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <!-- Destination Start -->
                        <div class="mg_hotel_destination_tab">
                            <!-- Nav tabs Start -->
                            <ul class="mg_hotel_nav2" role="tablist">
<?php
$i=0;
$sqltourism_location ="SELECT * FROM tourism_location WHERE status='Active'";
$qsqltourism_location =mysqli_query($con,$sqltourism_location);
while($rstourism_location = mysqli_fetch_array($qsqltourism_location))
{
?>				
<li role="presentation" <?php if($i==0) {	echo " class='active' "; $i=1;} ?> ><a href="#<?php echo $rstourism_location['location_name']; ?><?php $rstourism_location[0]; ?>" aria-controls="<?php echo $rstourism_location['location_name']; ?><?php $rstourism_location[0]; ?>" role="tab" data-toggle="tab"><?php echo $rstourism_location['location_name']; ?></a></li>
<?php
}
?>
                            </ul>
                            <!-- Nav tabs End -->
                            <!-- Tab panes Start -->
                            <div class="tab-content">
							
<?php
$i=0;
$sqltourism_location ="SELECT * FROM tourism_location WHERE status='Active'";
$qsqltourism_location =mysqli_query($con,$sqltourism_location);
while($rstourism_location = mysqli_fetch_array($qsqltourism_location))
{
?>
<div role="tabpanel" class="tab-pane <?php if($i==0) {	echo " active "; $i=1;} ?>" id="<?php echo $rstourism_location['location_name']; ?><?php $rstourism_location[0]; ?>">
	<!-- Destination Tab Wrap Start -->
	<div class="mg_hotel_destination_wrapper">
		<div class="row">
<?php
	$sqltourism_place ="SELECT tourism_place.*,tourism_location.location_name FROM tourism_place LEFT JOIN tourism_location ON tourism_location.location_id=tourism_place.location_id WHERE tourism_location.location_id='$rstourism_location[0]'";
	$qsqltourism_place =mysqli_query($con,$sqltourism_place);
	while($rstourism_place = mysqli_fetch_array($qsqltourism_place))
	{
		$sqlgallery ="SELECT * FROM gallery WHERE gallerytype='Photo Gallery' AND tourism_placeid='$rstourism_place[0]' AND status='Active'";
		$qsqlgallery = mysqli_query($con,$sqlgallery);
		$rsgallery = mysqli_fetch_array($qsqlgallery);
		if($rsgallery['upload_file'] == "")
		{
			$img =  "images/nophoto.jpg";
		}
		else if(file_exists("imggallery/".$rsgallery['upload_file']))
		{
			$img = "imggallery/".$rsgallery['upload_file'];
		}
		else
		{
			$img =  "images/nophoto.jpg";
		}
?>
<!-- Hotel Destination Start -->
<div class="col-md-4 col-sm-6">
	<div class="mg_hotel_destination fancy-overlay">
		<figure>
			<img src="<?php echo $img; ?>" alt="" style="width: 358px; height: 224px;" />
			<figcaption>
				<a class="view_btn" href="" onclick="return false;"  data-toggle="modal" data-target="#ModalLoadRecord<?php echo $rstourism_place['tourism_placeid']; ?>" >View More</a>
			</figcaption>
		</figure>
		<div class="text">
			<div class="mg_destination_hd">
				<h5><a href="#"><?php echo $rstourism_place['tourism_place']; ?></a></h5>
				<?php /*<a class="no_hotel" href="#">1500 Hotels</a> */ ?>
			</div>
			<div class="mg_destination_review">
				<p>Review Ratings</p>
				<div class="rating_down">
<?php
$sqlratings = "SELECT SUM(ratings) as sumratings,count(ratings) as countratings FROM feedback WHERE tourism_placeid='$rstourism_place[0]'";
$qsqlratings = mysqli_query($con,$sqlratings);
$rsratings = mysqli_fetch_array($qsqlratings);
$sumratings = $rsratings['sumratings'];
$countratings = $rsratings['countratings'];
$totratings = 10 *  $rsratings['countratings'];
if($countratings == 0)
{
	$totpercentage = 0;
}
else
{
	$totpercentage = (100*$sumratings) / $totratings;
}
?>				
					<div class="rating_up" style="width:<?php echo $totpercentage; ?>%;"></div>
				</div>
			</div>
			<?php /*
			<div class="mg_destination_review">
				<p>Egerton House Hotel</p>
				<div class="rating_down">
					<div class="rating_up" style="width:90%;"></div>
				</div>
			</div>
			*/ 
			?>
		</div>
	</div>
</div>
<!-- Hotel Destination End -->
<!-- ############################ -->
<!-- Load Records starts here -->
<div class="modal fade" id="ModalLoadRecord<?php echo $rstourism_place['tourism_placeid']; ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog login1 login5 login5-1">
		<div class="modal-content">
			<div class="user-box">
				<!--FORM FIELD START-->
				<h5><?php echo $rstourism_place['tourism_place']; ?></h5><hr>
					<div class="mg_input_1">					
            <!-- iqoniq Mina Banner Start-->       
            <div class="mg_hotel_banner">
                <div class="mg_slider1">
<?php
$sqlgallery = "SELECT * FROM gallery WHERE tourism_placeid='$rstourism_place[tourism_placeid]'";
$qgallery= mysqli_query($con,$sqlgallery);
while($rsgallery = mysqli_fetch_array($qgallery))
{
?>
<div>				
	<figure>
		<img src="imggallery/<?php echo $rsgallery['upload_file']; ?>" alt=""/>
		<b style="color: red;"><?php echo $rsgallery['note']; ?></b>
	</figure>
</div>
<div>				
	<figure>
		<img src="imggallery/<?php echo $rsgallery['upload_file']; ?>" alt=""/>
		<b style="color: red;"><?php echo $rsgallery['note']; ?></b>
	</figure>
</div>
<?php
}
?>
                </div>
			</div>
            <!-- iqoniq Mina Banner End-->  
<p><?php echo $rstourism_place['description']; ?></p>
<p>
<?php
if($rstourism_place['feature'] != "")
{
?>
<b style="color: red;">FEATURES:</b><br>
<?php
}
?>
<?php echo $rstourism_place['feature']; ?></p>
					</div>
				<!--FORM FIELD END-->
			</div>
		</div>   
	</div>
</div>
<!-- Load detailed Records ends here -->
<?php
	}
?>	
		</div>
<hr>
		<div  class="row">
			<div  class="col-md-12">
				<div class="mg_input_1">
<center><a class="mg_btn1" HREF="displayhotel.php?location_id=<?php echo $rstourism_location[0]; ?>" style="cursor: pointer;"><i class="fa fa-hotel"></i>BOOK YOUR JOURNEY HERE..</a></center>
				</div>
			</div>
		</div>
		
	</div>
	<!-- Destination Tab Wrap End -->
</div>
<?php
}
?>								
							</div>
                            <!-- Tab panes End -->
                        </div>
                        <!-- Destination End -->
                    </div>
                </section>
                



                <!-- Call to Action Section Start-->
                <section class="mg_travelplan">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1 white">
                            <h6>Create a Custom Plan based on your Taste</h6>
                            <h4>Start making your Travel Plans</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <!-- Caption Start -->
                        <div class="mg_plan_caption">
                            <p>Atithi Devo Bhava, India's leading online travel & Tourism company, has a profound understanding of Indian consumers travel needs and preferences. It offers a wide range of holiday packages in India, catering to various segments of travellers. While the dynamic or customized tour and travel packages give consumers an option to create and design their own holiday, the fixed departure holiday packages have a pre-designed itinerary; thus ensuring there is something to meet the holiday needs of every kind of traveller.</p>
                        </div>
                        <!-- Caption End -->
                    </div>
                </section>
                <!-- Call to Action Section End-->

<?php
/*
                <!-- Masonry Gallery Section Start-->
                <section class="gray-bg">
                    <div class="container-fluid">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Right Now</h6>
                            <h4>Photo gallery</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <!-- Masonry Grid Start -->
                        <div class="masonry-2 grid">
                            <div class="row masonry masonryFlyIn">
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height100 green">
                                        <a href="#"><span>Nature & Adventure</span></a>
                                    </h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/1.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/2.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/3.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height130 green"><a href="#">Nature & Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/4.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/5.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height130 pink"><a href="#">Nature & Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/6.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height130"><a href="#">Nature sss& Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/7.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/8.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/9.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item fancy-overlay">
                                    <figure class="thumb-link"><img src="extra-images/10.jpg" alt=""></figure>
                                </div>
                                <!-- Masonry Item End -->
                                <!-- Masonry Item Start -->
                                <div class="masonry-item">
                                    <h4 class="text-link item-height184 peach"><a href="#">Nature & Adventure</a></h4>
                                </div>
                                <!-- Masonry Item End -->
                            </div>
                        </div>
                        <!-- Masonry Grid Start -->
                    </div>
                </section>
                <!-- Masonry Gallery Section End-->

                <!-- Blog Section Start-->
                <section>
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Right Now</h6>
                            <h4>Our Latest Blog</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <!-- iqoniq Blog Medium Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_blog_medium fancy-overlay">
                                    <h6><a href="#">Its A Brillaint city to visit</a></h6>
                                    <figure>
                                        <a href="#"><img src="extra-images/blog_medium1.jpg" alt=""></a>
                                    </figure>
                                    <div class="text">
                                        <ul class="blog-meta-list">
                                            <li><a href="#"><i class="fa fa-calendar"></i><span>24 Aug 2016</span></a></li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>24 comments</span></a></li>
                                        </ul>
                                        <div class="clear"></div>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                                        <a class="mg_readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <!-- iqoniq Blog Medium End -->
                            <!-- iqoniq Blog Medium Start -->
                            <div class="col-md-4 col-sm-6">
                                <div class="mg_blog_medium fancy-overlay">
                                    <h6><a href="#">Its A Brillaint city to visit</a></h6>
                                    <figure>
                                        <a href="#"><img src="extra-images/blog_medium2.jpg" alt=""></a>
                                    </figure>
                                    <div class="text">
                                        <ul class="blog-meta-list">
                                            <li><a href="#"><i class="fa fa-calendar"></i><span>24 Aug 2016</span></a></li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>24 comments</span></a></li>
                                        </ul>
                                        <div class="clear"></div>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                                        <a class="mg_readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <!-- iqoniq Blog Medium End -->
                            <!-- iqoniq Blog Medium Start -->
                            <div class="col-md-4 hidden-sm">
                                <div class="mg_blog_medium fancy-overlay">
                                    <h6><a href="#">Its A Brillaint city to visit</a></h6>
                                    <figure>
                                        <a href="#"><img src="extra-images/blog_medium3.jpg" alt=""></a>
                                    </figure>
                                    <div class="text">
                                        <ul class="blog-meta-list">
                                            <li><a href="#"><i class="fa fa-calendar"></i><span>24 Aug 2016</span></a></li>
                                            <li><a href="#"><i class="fa fa-comments-o"></i><span>24 comments</span></a></li>
                                        </ul>
                                        <div class="clear"></div>
                                        <p>sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy </p>
                                        <a class="mg_readmore" href="#">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <!-- iqoniq Blog Medium End -->
                        </div>
                    </div>
                </section>
                <!-- Blog Section End-->
*/
?>
				
            </div>
            <!-- iqoniq Contant Wrapper End-->  
<?php
include("footer.php");
?>