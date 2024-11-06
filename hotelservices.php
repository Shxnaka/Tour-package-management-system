<?php
include("header.php");
?>
<!-- Sub Banner Start -->
	<div class="mg_sub_banner">
		<div class="container">
			<h2>Add Following Services</h2>
		</div>
	</div>
<!-- Sub Banner Start -->


                <!-- Pricing Table Section Start-->
                <section class="pricing_wrap">
                    <div class="container">
                        <!-- iqoniq Heading Start -->
                        <div class="mg_hotel_hd1">
                            <h6>Right Now</h6>
                            <h4>ADD FOLLOWING SERVICES</h4>
                        </div>
                        <!-- iqoniq Heading End -->
                        <div class="row">
		
<div class="col-md-6 col-sm-6">
	<!-- iqoniq Pricing Table Start -->
	<div class="mg_pricing fancy-overlay">
		<span class="fa fa-coffee"></span>
		<div class="thumb">
			<img src="images/foodorder.jpg" alt="">
			<div class="caption">
<?php
/*			
				<div class="rating_down">
					<div class="rating_up" style="width:50%;"></div>
				</div>
*/
?>
				<div class="clear"></div>
				<h6>Online Food Order</h6>
				<b>Order foods through online...</b>
			</div>
		</div>
		<div class="text">
			<h6><a href="#">Online Food Order </a></h6>
			<p>Fast and Reliable Platform.. Hassle-Free Ordering... Widest Range Of Delivery Restaurants.. Order Now! </p>
			<a class="mg_btn1" href="displayitem.php?paymentid=<?php echo $_GET['paymentid']; ?>">Explore Now</a>
		</div>
	</div>
	<!-- iqoniq Pricing Table End -->
</div>
<div class="col-md-6 hidden-sm">
	<!-- iqoniq Pricing Table Start -->
	<div class="mg_pricing fancy-overlay">
		<span class="fa fa-car"></span>
		<div class="thumb">
			<img src="images/rentcab.jpg" alt="">
			<div class="caption">
				<div class="clear"></div>
				<h6>Rent a car</h6>
				<b>Rent or Book vehicles through online</b>
			</div>
		</div>
		<div class="text">
			<h6><a href="#">Rent a car </a></h6>
			<p>Rent a car from wide range of  cars available online. Book Online Today. Unbeatable Prices. </p>
			<a class="mg_btn1" href="rentacar.php?paymentid=<?php echo $_GET['paymentid']; ?>">Explore Now</a>
		</div>
	</div>
	<!-- iqoniq Pricing Table End -->
</div>
                        </div>
                    </div>
                </section>
                <!-- Pricing Table Section End-->
<?php
include("footer.php");
?>