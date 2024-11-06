<?php
include("header.php");
$sqltourism_location ="SELECT * FROM tourism_location WHERE status='Active' AND location_id='$_GET[location_id]'";
$qsqltourism_location =mysqli_query($con,$sqltourism_location);
$rstourism_location = mysqli_fetch_array($qsqltourism_location);		
if($rstourism_location['location_img'] == "")
{
	$img = "images/nophoto.jpg";
}
else if(file_exists("imglocation/" . $rstourism_location['location_img']))
{
	$img = "imglocation/" . $rstourism_location['location_img'];
}
else
{
	$img = "images/nophoto.jpg";
}
$imglink = $img;
function is_image($path)
{
	$a = getimagesize($path);
	$image_type = $a[2];
	
	if(in_array($image_type , array(IMAGETYPE_GIF , IMAGETYPE_JPEG ,IMAGETYPE_PNG , IMAGETYPE_BMP)))
	{
		return true;
	}
	return false;
}
if(isset($_GET['btnsearch']))
{
	include("slider.php");
}
?>
                <!-- Bottom Bar Start-->
                <div class="mg_bottom_bar">
                    <div class="container">
                            <center><h2 style="color: white;"><?php echo strtoupper($rstourism_location['location_name']); ?></h2></center>
                    </div>
                </div>
                <!-- Bottom Bar End-->
            <!-- Sub Banner Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Room Detail Wrap Start -->
                                <div class="mg_room_detail_wrap">
<!-- Room Slider Start -->
<div class="room-slider-wrap">
	<div class="room-slider"> 
		<figure><img src="<?php echo $img; ?>" alt="" style="width: 100%;height: 514px;"></figure>
		<?php
		$sqlimg ="SELECT * FROM gallery LEFT JOIN tourism_place ON gallery.tourism_placeid=tourism_place.tourism_placeid where tourism_place.location_id='$_GET[location_id]' AND gallerytype='Photo Gallery' ";
		$qsqlimg = mysqli_query($con,$sqlimg);
		while($rsimg = mysqli_fetch_array($qsqlimg))
		{
		?>
				<figure><img src="imggallery/<?php echo $rsimg['upload_file'] ?>" alt="" style="width: 100%;height: 514px;"></figure>
		<?php
		}
		?>
	</div>
	<!-- Room Slider Start -->
	<!-- Room Slider Nav Start -->
	<div class="room-slider-nav">
		<figure><img src="<?php echo $img; ?>" alt="" style="width: 100%;height: 100px;"></figure>
		<?php
		 $sqlimg ="SELECT * FROM gallery LEFT JOIN tourism_place ON gallery.tourism_placeid=tourism_place.tourism_placeid where tourism_place.location_id='$_GET[location_id]' AND gallerytype='Photo Gallery' AND gallery.status='Active' ";
		$qsqlimg = mysqli_query($con,$sqlimg);
		while($rsimg = mysqli_fetch_array($qsqlimg))
		{
		?>
		<figure><img src="imggallery/<?php echo $rsimg['upload_file'] ?>"  style="width: 100%;height: 100px;"></figure>
		<?php
		}
		?>
	</div>
	<!-- Room Slider Nav End -->
</div>
<!-- Room Slider End -->
                                </div>
                                <!-- Room Detail Wrap Start -->

                            </div>

                        </div>
                    </div>
                </section>
            </div>
			
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">
                <!-- Why Chooses us Section Start -->
                <section class="why_chooseus">
                    <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-9">
<!-- Room Detail Tab Start -->
<div class="room-detail-tab">
	<!-- Nav tabs Start -->
	<ul class="mg_hotel_search" role="tablist">
		<li role="presentation" class="active"><a href="#overview" aria-controls="overview" role="tab" data-toggle="tab">Overview</a></li>
		<?php
		/*
		<li role="presentation"><a href="#amenities" aria-controls="amenities" role="tab" data-toggle="tab">Photo Reviews (5)</a></li>
		<li role="presentation"><a href="#availability" aria-controls="availability" role="tab" data-toggle="tab">Video Reviews (10)</a></li>
		*/
		?>
		<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Reviews (<?php 
		$sqlfeedback = "SELECT * FROM feedback LEFT JOIN customer ON feedback.customer_id=customer.customer_id  WHERE feedback.tourism_placeid='$_GET[location_id]' order by feedback.feedback_id DESC";
		$qsqlfeedback = mysqli_query($con,$sqlfeedback);
		echo mysqli_num_rows($qsqlfeedback);
		?>)</a></li>
	</ul>
	<!-- Nav tabs End -->
	<!-- Tab Contant Start -->
	<div class="tab-content">
		<!-- Tabs Pane Start -->
		<div role="tabpanel" class="tab-pane active" id="overview">
			<!-- iqoniq Blog Listing Start -->
			<div class="mg_blog_listing our-room fancy-overlay">
				<div class="thumb">
					<a href="#"><img src="<?php echo $img; ?>" alt=""></a>
					<a class="mg_zoom_icon" href="#"><i class="fa fa-search"></i></a>
				</div>
				<div class="text">
					<h5 class="blog_title"><a href="#"><?php echo strtoupper($rstourism_location['location_name']); ?></a></h5>
					<?php echo strip_tags($rstourism_location['description']); ?>
				</div>
			</div>
			<!-- iqoniq Blog Listing Start -->
		</div>
		<!-- Tabs Pane End -->
		<!-- Tabs Pane Start -->
		<div role="tabpanel" class="tab-pane fade" id="reviews">
			<!-- Blog Comment Wrap Start -->
			<div class="mg_comment_wrap">

<?php
$sqlfeedback = "SELECT * FROM feedback LEFT JOIN customer ON feedback.customer_id=customer.customer_id  WHERE feedback.tourism_placeid='$_GET[location_id]' order by feedback.feedback_id DESC";
		$qsqlfeedback = mysqli_query($con,$sqlfeedback);
if(mysqli_num_rows($qsqlfeedback) == 0)
{
?>
	<div class="mg_comment_dec ">
		<div class="overflow_text">
			<center><b>No feedback entered..</b></center>
		</div>
	</div>
<?php
}
else
{
	while($rsfeedback = mysqli_fetch_array($qsqlfeedback))
	{
?>
	<div class="mg_comment_dec ">
		<figure><img src="images/feedback.png" alt=""></figure>
		<div class="overflow_text">
			<h6><a href="#"><?php echo $rsfeedback['customer_name']; ?></a><span>( <?php echo date("M d, Y",strtotime($rsfeedback['feedback_dt'])); ?> )</span><strong class="rating_down">
				<span class="rating_up" style="width:<?php echo $rsfeedback['ratings']*20; ?>%;"></span>
			</strong></h6>
			<p><?php echo $rsfeedback['feedback']; ?></p>
			<p>
			<?php
			$sqlimg = "SELECT * FROM gallery WHERE tourism_placeid='$rsfeedback[0]' and status='Active' AND gallerytype='Feedback'";
			$qsqlimg = mysqli_query($con,$sqlimg);
			//echo mysqli_error($con);
			while($rsimg = mysqli_fetch_array($qsqlimg))
			{
				$path = "imgfeedback/".$rsimg['upload_file'];
				if(is_image($path) == true)
				{
			?>
				<img src="<?php echo $path; ?>" style="width: 100px;height:100px;cursor: pointer;" onclick="loadfile('1','<?php echo $path; ?>')"   data-toggle="modal" data-target="#ModalLoadGallery" >
			<?php
				}
				else
				{
			?>
				<img src="images/vidimg.png" style="width: 100px;height:100px;cursor: pointer;" onclick="loadfile('2','<?php echo $path; ?>')"   data-toggle="modal" data-target="#ModalLoadGallery" >
			<?php
				}
			}
			?>
			</p>
		</div>
	</div>
<?php
	}
}
?>
				
				
			</div>
			<!-- Blog Comment Wrap End -->
		</div>
		<!-- Tabs Pane End -->
	</div>
	<!-- Tab Contant End -->
</div>
<!-- Room Detail Tab End -->

                                        </div>  
                                        <!-- Room Reservation Start -->
                                        <div class="col-md-3">
										
                                            <div class="room-reservation">
                                                <h5 class="reservation-title">Book your Journey</h5>
                                                <!-- Room Price Start -->
                                                <div class="room-price">
                                                    <h4>rates from</h4>
                                                    <h5><sup>₹</sup>
<?php
$sqlhotelminimum = "SELECT * FROM hotel LEFT JOIN room_type ON hotel.hotel_id=room_type.hotel_id WHERE hotel.location_id='$_GET[location_id]'";
$qsqlhotelminimum = mysqli_query($con,$sqlhotelminimum);
$rshotelminimum = mysqli_fetch_array($qsqlhotelminimum);
echo $rshotelminimum['cost'];
?>													
													</h5>
                                                    <h6>per night</h6>
                                                </div>
                                                <!-- Room Price End -->
												
<form method="get" action="displayhotel.php">
<input type="hidden" name="location_id" id="location_id" value="<?php echo $_GET['location_id']; ?>">
<?php
if(isset($_GET['btnsearch']))
{
?>
<input type="hidden" name="searchadults" id="searchadults" value="<?php echo $_GET['searchadults']; ?>">
<input type="hidden" name="searchchildren" id="searchchildren" value="<?php echo $_GET['searchchildren']; ?>">
<input type="hidden" name="search_check_in" id="search_check_in" value="<?php echo $_GET['search_check_in']; ?>">
<input type="hidden" name="search_check_out" id="search_check_out" value="<?php echo $_GET['search_check_out']; ?>">
<input type="hidden" name="location_id" id="location_id" value="<?php echo $_GET['location_id']; ?>">
<input type="hidden" name="btnsearch" id="btnsearch" value="Search">
<?php
}
?>
	<div class="mg_input_1 mg_input_submit">
		<button class="mg_btn1">Book Hotel</button>
	</div>
</form>
	 
											</div>
                                        
										
                                            <div class="room-reservation">
                                                <h5 class="reservation-title">View Feedback & Reviews</h5>
                                                <!-- Room Price Start -->
<form method="get" action="feedbackpanel.php">
<input type="hidden" name="location_id" id="location_id" value="<?php echo $_GET['location_id']; ?>">
	<div class="mg_input_1 mg_input_submit">
		<button class="mg_btn1">Feedback Panel</button>
	</div>
</form>
	 
											</div>
                                        										
										</div>
                                        <!-- Room Reservation End -->
                                    </div>
					</div>
                </section>
                <!-- Why Chooses us Section End -->
            </div>
            <!-- iqoniq Contant Wrapper End--> 
                <section>
<hr>
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>What are you in the Mood for.?</h6>
                            <h4>PLACES TO VISIT</h4>
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
	/*
?>				
<li role="presentation" <?php if($i==0) {	echo " class='active' "; $i=1;} ?> ><a href="#<?php echo $rstourism_location['location_name']; ?><?php $rstourism_location[0]; ?>" aria-controls="<?php echo $rstourism_location['location_name']; ?><?php $rstourism_location[0]; ?>" role="tab" data-toggle="tab"><?php echo $rstourism_location['location_name']; ?></a></li>
<?php
	*/
}
?>
                            </ul>
                            <!-- Nav tabs End -->
                            <!-- Tab panes Start -->
                            <div class="tab-content">
<?php
$i=0;
$sqltourism_location ="SELECT * FROM tourism_location WHERE status='Active' AND location_id='$_GET[location_id]'";
$qsqltourism_location =mysqli_query($con,$sqltourism_location);
while($rstourism_location = mysqli_fetch_array($qsqltourism_location))
{
?>
<div role="tabpanel" class="tab-pane <?php if($i==0) {	echo " active "; $i=1;} ?>" id="<?php echo $rstourism_location['location_name']; ?><?php $rstourism_location[0]; ?>">
	<!-- Destination Tab Wrap Start -->
	<div class="mg_hotel_destination_wrapper">
		<div class="row">
<?php
	$sqltourism_place ="SELECT tourism_place.*,tourism_location.location_name FROM tourism_place LEFT JOIN tourism_location ON tourism_location.location_id=tourism_place.location_id WHERE tourism_location.location_id='$rstourism_location[0]'  ORDER BY tourism_place.tourism_placeid DESC LIMIT 3";
	$qsqltourism_place =mysqli_query($con,$sqltourism_place);
	echo mysqli_error($con);
	while($rstourism_place = mysqli_fetch_array($qsqltourism_place))
	{
		$sqlgallery ="SELECT * FROM gallery WHERE gallerytype='Photo Gallery' AND tourism_placeid='$rstourism_place[0]' AND status='Active'";
		$qsqlgallery = mysqli_query($con,$sqlgallery);
		$rsgallery = mysqli_fetch_array($qsqlgallery);
		if(mysqli_num_rows($qsqlgallery) == 0)
		{
			$img =  "images/nophoto.jpg";
		}
		else if(mysqli_num_rows($qsqlgallery) == 0)
		{
			$img =  "images/nophoto.jpg";
		}
		else if($rsgallery['upload_file'] == "")
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
$sqlratings = "SELECT ifnull(SUM(ratings),0) as sumratings,ifnull(count(ratings),0) as countratings FROM feedback WHERE tourism_placeid='$rstourism_place[0]'";
$qsqlratings = mysqli_query($con,$sqlratings);
$rsratings = mysqli_fetch_array($qsqlratings);
$sumratings = $rsratings['sumratings'];
$countratings = $rsratings['countratings'];
$totratings = 10 *  $rsratings['countratings'];
//$totpercentage = (100*$sumratings) / $totratings;
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
                
			
			
 
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">
                <!-- Why Chooses us Section Start -->
                <section class="why_chooseus">
                    <div class="container-fluid">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1 white">
                            <h6>Chosen by Millions of Travelers</h6>
                            <h4>Hotels</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
                            <!-- Chooseus Slider Start -->
                            <div class="">
<?php
$sqlhotel ="select hotel.*,tourism_location.location_name from hotel LEFT JOIN tourism_location ON hotel.location_id=tourism_location.location_id WHERE hotel.location_id='$_GET[location_id]'";
$qsqlhotel = mysqli_query($con,$sqlhotel);
while($rshotel = mysqli_fetch_array($qsqlhotel))
{
	
	$sql ="SELECT hotel_image.*,room_type.room_type FROM hotel_image LEFT JOIN room_type ON hotel_image.room_typeid=room_type.room_typeid WHERE hotel_image.hotel_id='$rshotel[hotel_id]' AND hotel_image.status='Active' ";
	$qsql =mysqli_query($con,$sql);
	echo mysqli_error($con);
	$rs = mysqli_fetch_array($qsql);
	if($rs['hotel_image'] == "")
	{
		$img = "images/nophoto.jpg";
	}
	else if(file_exists('imghotel/'.$rs['hotel_image']))
	{
		$img = 'imghotel/'.$rs['hotel_image'];
	}
	else
	{
		$img = "images/nophoto.jpg";
	}
?>
<!-- Chooseus Thumb Start -->
<div class="col-md-4">
	<div class="mg_chooseus fancy-overlay">
		<figure>
			<img src="<?php echo $img; ?>" alt="" STYLE="height: 200px;">
		</figure>
		<div class="text">
			<h5><a href="hoteldetails.php?hotelid=<?php echo $rs[0]; ?>&location_id=<?php echo $_GET['location_id']; ?>"><?php echo $rshotel['hotel_name']; ?></a></h5>
			<p><?php echo $rshotel['hotel_type']; ?></p>
<div class="mg_input_1">
	<?php
	if(isset($_GET['btnsearch']))
	{
	?>
		<center><a href="hoteldetails.php?location_id=<?php echo $_GET['location_id']; ?>&adults=<?php echo $_GET['searchadults']; ?>&children=<?php echo $_GET['searchchildren']; ?>&checkin=<?php echo $_GET['search_check_in']; ?>&checkout=<?php echo $_GET['search_check_out']; ?>&btnsearch=btnsearch&hotelid=<?php echo $rshotel[0]; ?>"><button class="btn btn-info"><i class="fa fa-calendar"></i> SELECT HOTEL</button></a></center>
	<?php
	}
	else
	{
	?>
		<center><a href="hoteldetails.php?hotelid=<?php echo $rshotel[0]; ?>&location_id=<?php echo $_GET['location_id']; ?>"><button class="btn btn-info"><i class="fa fa-calendar"></i> SELECT HOTEL</button></a></center>
	<?php
	}
	?>
</div>
		</div>
	</div>
</div>
<!-- Chooseus Thumb End -->
<?php
}
?>
                            </div>
                            <!-- Chooseus Slider Ens -->
                        </div>
					</div>
                </section>
                <!-- Why Chooses us Section End -->
<?php
	$sql ="SELECT item.*,tourism_location.location_name,food_category.food_category FROM item LEFT JOIN tourism_location ON item.location_id=tourism_location.location_id LEFT JOIN food_category ON food_category.food_category_id=item.food_category_id WHERE item.location_id='$_GET[location_id]' ORDER BY RAND() LIMIT 9";
	$qsql =mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) >= 1)
	{
?>	
                <!-- Destination Section Start -->
                <section class="mg_destination_bg" style="background-color: #92817b;color: white;">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6  style="color: white;">Food Items</h6>
                            <h4 style="color: white;">The Most Popular <?php echo $rstourism_location['location_name']; ?> Dishes and Recipes</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
						
<?php
	$id=0;
	while($rs = mysqli_fetch_array($qsql))
	{
		if($rs['item_img'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists('imgitem/'.$rs['item_img']))
		{
			$img = 'imgitem/'.$rs['item_img'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}	
?>
<!-- iqoniq Blog Medium Start -->
<div class="col-md-4 col-sm-6">
	<div class="mg_blog_medium fancy-overlay" style="background-color: #eeeef6;">
		<h6><a href="#"><?php echo $rs['item_name']; ?></a></h6>
		<figure>
			<a href="#"><img src="<?php echo $img; ?>" alt=""  style="height: 250px;" /></a>
		</figure>
		<div class="text">
			<ul class="blog-meta-list">
				<li><a href="#"><b><i class="fa fa-book"></i><span><?php echo $rs['food_category']; ?></span></a></b></li>
				<li><a href="#"><i class="fa fa-rupee"></i><span><?php echo $rs['item_cost']; ?></span></a></li> 
			</ul>
			<div class="clear"></div>
			<p style="color: black;"><?php echo $rs['item_description']; ?></p>
		</div>
	</div>
</div>
<!-- iqoniq Blog Medium End -->

<?php
$id++;
	}
?>							
                        </div>
                    </div>
                </section>
                <!-- Destination Section End -->
<?php
	}
?>

                <!-- Pricing Table Section Start-->
                <section class="pricing_wrap">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Cab Booking - Outstation cabs, Car Rental, Taxi & Cars Booking</h6>
                            <h4>Cab Booking</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">

<?php
		$sql ="select vehicle_type.*, tourism_location.location_name,hotel.hotel_name from vehicle_type LEFT JOIN tourism_location ON vehicle_type.location_id=tourism_location.location_id LEFT JOIN hotel ON hotel.hotel_id=vehicle_type.hotel_id  WHERE vehicle_type.location_id='$_GET[location_id]' ORDER BY RAND() LIMIT 3";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			if($rs['vehicle_img'] == "")
			{
				$img = "images/nophoto.jpg";
			}
			else if(file_exists('imgvehicletype/'.$rs['vehicle_img']))
			{
				$img = 'imgvehicletype/'.$rs['vehicle_img'];
			}
			else
			{
				$img = "images/nophoto.jpg";
			}
?>		
							<div class="col-md-4 col-sm-6">
                                <!-- iqoniq Pricing Table Start -->
                                <div class="mg_pricing fancy-overlay">
                                    <span class="fa fa-car"></span>
                                    <div class="thumb">
                                        <img src="extra-images/price2.jpg" alt="">
                                        <div class="caption">
                                            <div class="rating_down">
                                                <div class="rating_up" style="width:100%;"></div>
                                            </div>
                                            <div class="clear"></div>
                                            <p><?php echo $rs['vehicle_type']; ?></p>
                                            <h6>Rs. <?php echo $rs['km_cost']; ?></h6>
                                            <strong>Per KM</strong>
                                        </div>
                                    </div>
                                    <div class="text">
                                        <h6><a href="#"><?php echo $rs['vehicle_type']; ?></a></h6>
                                    </div>
                                </div>
                                <!-- iqoniq Pricing Table End -->
                            </div>
<?php
		}
?>
						</div>
                    </div>
                </section>
                <!-- Pricing Table Section End-->
            </div>
            <!-- iqoniq Contant Wrapper End-->  
<?php
include("footer.php");
?> 
<!-- Load Records starts here -->
<div class="modal fade" id="ModalLoadGallery" tabindex="-1" role="dialog">
	<div class="modal-dialog login1 login5 login5-1">
		<div class="modal-content">
			<div class="user-box">
				<!--FORM FIELD START-->
					<div class="mg_input_1">					
            <!-- iqoniq Mina Banner Start-->       
            <div class="mg_hotel_banner">
                <div class="mg_slider1" id="loadmodrec">
<center><img src="images/loadinggif.gif"></center>
                </div>
			</div>
            <!-- iqoniq Mina Banner End-->  
					</div>
				<!--FORM FIELD END-->
			</div>
		</div>   
	</div>
</div>
<!-- Load detailed Records ends here -->
<script>
function loadfile(filetype,path)
{
	document.getElementById("loadmodrec").innerHTML = '<center><img src="images/loadinggif.gif"></center>';
	if(filetype == 1)
	{
		document.getElementById("loadmodrec").innerHTML = "<img src='" + path + "' style='width: 100%'>";
	}
	if(filetype == 2)
	{
		document.getElementById("loadmodrec").innerHTML = "<video width='100%' height='500' controls><source src='" + path + "' type='video/mp4'></video>";
	}
}
</script>
