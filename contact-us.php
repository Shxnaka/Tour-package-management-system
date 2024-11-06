<?php
include("header.php");
if(isset($_POST['submit']))
{
	$receivermailid="studentprojects.live@gmail.com";
	include("phpmailer.php");
	$enquirymessage = "<b>Name : </b>" . $_POST['name'] . "<br><br>";
	$enquirymessage = $enquirymessage . "<b>Email ID : </b>" . $_POST['email'] . "<br><br>";
	$enquirymessage = $enquirymessage . "<b>Message : </b>" . $_POST['message'] . "<br><br>";
	sendmail($receivermailid, $_POST['name'], 'Enquiry Mail',  $_POST['message']);
	echo "<script>alert('Enquiry Mail sent Successfully...');</script>";
	echo "<script>window.location='contact-us.php';</script>";
}
?> 
            <!-- Sub Banner Start-->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Contact us</h2>
                    <ul class="breadcrumb">
                        <li><a href="#">home</a></li>
                        <li class="active"><span>Contact us</span></li>
                    </ul>
                </div>
            </div>
            <!-- Sub Banner End-->
            <!-- Main Contant Wrap Start-->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
                        <div class="row">
                            <!-- Contact Form Start-->
                            <div class="col-md-8">
                                <!-- iqoniq Contact Form Start-->
                                <div class="mg_contact_form">
                                    <h5 class="blog_main_title">Contact Form</h5>
                                    <form method="post" action="" >
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- Input Start-->
                                                <div class="mg_input_1">
                                                    <input placeholder="Your Name" required type="text" name="name" id="name">
                                                </div>
                                                <!-- Input End-->
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Input Start-->
                                                <div class="mg_input_1">
                                                    <input placeholder="Your Email" required type="text" name="email" id="email">
                                                </div>
                                                <!-- Input End-->
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Input Start-->
                                                <div class="mg_input_1">
                                                    <textarea placeholder="Your Message" name="message" id="message" required ></textarea>
                                                </div>
                                                <!-- Input End-->
                                                <input class="mg_btn1" type="submit" name="submit" id="submit" value="Send">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- iqoniq Contact Form Start-->
                            </div>
                            <!-- Contact Form End-->
                            <!-- Sidebar Start-->
                            <div class="col-md-4">
                                <div class="contact-sidebar">
                                    <!-- Widget Text Start-->
                                    <div class="widget widget-text">
                                        <h5 class="blog_main_title">Address and info</h5>
                                        <div class="border-bottom">
                                            <div class="text">
                                                <p>The main purpose of the project is to provide information about tours and travels Mainly this website provide complete information about tourism places with facilities, location map, contact details.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Widget Text End-->
                                    <!-- Widget Contact Start-->
                                    <div class="widget widget-contact">
                                        <h5 class="blog_main_title">Contact detail</h5>
                                        <div class="border-bottom">
                                            <div class="text">
                                                <div class="mg_contact"><i class="fa fa-map-marker"></i><span>The travelway.com,De fonseka road,Bambalapitiya,Colombo,Sri lanaka</span></div>
                                                <div class="mg_contact"><i class="fa fa-phone"></i><span>+94-782612548</span></div>
                                                <div class="mg_contact"><i class="fa fa-envelope-o"></i><a href="mailto:info@thetravelway.com">info@thetravelway.com</a></div>
                                                <div class="mg_contact"><i class="fa fa-clock-o"></i><span>Everyday 9:00-17:00</span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Widget Contact End-->
                                    <!-- Widget Social Start-->
                                    <div class="widget widget-social">
                                        <h5 class="blog_main_title">Social Media</h5>
                                        <ul class="mg_social">
                                           <li><a href="https://facebook.com/freefriendlytravelmood"><i class="fa fa-facebook"></i></a></li> 
                                           <li><a href="https://twitter.com/freefriendlytravelmood"><i class="fa fa-twitter"></i></a></li> 
                                           <li><a href="https://linkedin.com/freefriendlytravelmood"><i class="fa fa-linkedin"></i></a></li> 
                                        </ul>
                                    </div>
                                    <!-- Widget Social End-->
                                </div>
                            </div>
                            <!-- Side Bar End-->
                        </div>
                    </div>
                </section>

            </div>
            <!-- Main Contant Wrap End-->
<?php
include("footer.php");
?> 