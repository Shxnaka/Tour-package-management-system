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

            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">
                <!-- Why Chooses us Section Start -->
                <section class="why_chooseus">
                    <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
<!-- Room Detail Tab Start -->
<div class="room-detail-tab">

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
		<div role="tabpanel" class="tab-pane fade" id="amenities">
			<!-- iqoniq Blog Listing Start -->
			<div class="mg_blog_listing our-room fancy-overlay">
				<div class="text">
					<h5 class="blog_title"><a href="#">FEATURES</a></h5>
					<p><?php echo $rstourism_location['feature']; ?></p>
				</div>
			</div>
			<!-- iqoniq Blog Listing Start -->
		</div>
		<!-- Tabs Pane End -->
		<!-- Tabs Pane Start -->
		<div role="tabpanel" class="tab-pane fade" id="availability">
			<!-- iqoniq Blog Listing Start -->
			<div class="mg_blog_listing our-room fancy-overlay">
				<div class="thumb">
					<a href="#"><img src="extra-images/ourroom3.jpg" alt=""></a>
					<a class="mg_zoom_icon" href="#"><i class="fa fa-search"></i></a>
				</div>
				<div class="text">
					<h5 class="blog_title"><a href="#">consetetur sadipscing</a></h5>
					<p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut labore et dolore.</p>
					<ul class="room-feature">
						<li><span class="pull-left">beds</span><span class="pull-right">King or 2 Queen</span></li>
						<li><span class="pull-left">occupancy</span><span class="pull-right">2 People</span></li>
						<li><span class="pull-left">size</span><span class="pull-right">60 sqm / 650 sqf</span></li>
						<li><span class="pull-left">view</span><span class="pull-right">Ocean / City</span></li>
						<li><span class="pull-left">rates from</span><span class="pull-right">175USD</span></li>
					</ul>
				</div>
			</div>
			<!-- iqoniq Blog Listing Start -->
		</div>
		<!-- Tabs Pane End -->
		<!-- Tabs Pane Start -->
		<div role="tabpanel" class="tab-pane fade" id="reviews">
			<!-- Blog Comment Wrap Start -->
			<div class="mg_comment_wrap">
				<div class="mg_comment_dec">
					<figure><img src="extra-images/comment_user1.jpg" alt=""></figure>
					<div class="overflow_text">
						<h6><a href="#">john doe</a><span>( JUNE 20, 2014 )</span><strong class="rating_down">
							<span class="rating_up" style="width:60%;"></span>
						</strong></h6>
						<p>Nihilne te nocturnum praesidium Palati, nihil urbis vigiliae. Non equidem invideo, miror magis posuere velit aliquet. Qui ipsorum lingua Celtae, nostra Galli appellantur. Prima luce, cum quibus mons aliud consensu ab eo. </p>

					</div>
				</div>
				<div class="mg_comment_dec">
					<figure><img src="extra-images/comment_user1.jpg" alt=""></figure>
					<div class="overflow_text">
						<h6><a href="#">john doe</a><span>( JUNE 20, 2014 )</span><strong class="rating_down">
							<span class="rating_up" style="width:60%;"></span>
						</strong></h6>
						<p>Nihilne te nocturnum praesidium Palati, nihil urbis vigiliae. Non equidem invideo, miror magis posuere velit aliquet. Qui ipsorum lingua Celtae, nostra Galli appellantur. Prima luce, cum quibus mons aliud consensu ab eo. </p>
						
					</div>
				</div>
			</div>
			<!-- Blog Comment Wrap End -->
		</div>
		<!-- Tabs Pane End -->
	</div>
	<!-- Tab Contant End -->
</div>
<!-- Room Detail Tab End -->

                                        </div>  

                                    </div>
					</div>
                </section>
                <!-- Why Chooses us Section End -->



				

				

            </div>
            <!-- iqoniq Contant Wrapper End--> 
			
 
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">

                <!-- Destination Section Start -->
                <section class="mg_destination_bg" style="color: black;">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h4 style="color: black;">Feedback and Reviews</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
						
                        </div>
                    </div>
                </section>
                <!-- Destination Section End -->
				                <!-- Destination Section Start -->
                <section class="mg_destination_bg" style="color: black;background-color: #31708f;">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
<?php
include("tourismfeedback.php");
?>				
                        </div>
                        <!-- iqoniq Heading End -->
                    </div>
                </section>

                <!-- Pricing Table Section Start-->
                <section class="pricing_wrap">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h4>View Feedback</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">

			<div class="mg_comment_wrap">
<?php
$sqlfeedback = "SELECT * FROM feedback LEFT JOIN customer ON feedback.customer_id=customer.customer_id  WHERE feedback.tourism_placeid='$_GET[location_id]' order by feedback.feedback_id DESC";
$qsqlfeedback = mysqli_query($con,$sqlfeedback);
echo mysqli_error($con);
?>
<?php
if(mysqli_num_rows($qsqlfeedback) == 0)
{
?>
	<div class="mg_comment_dec " style="background-color: white;">
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
	<div class="mg_comment_dec " style="background-color: white;">
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
			echo mysqli_error($con);
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
