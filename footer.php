            <!-- iqoniq Footer Start-->  
            <footer class="mg_footer1">
                <div class="container">
                    <!-- Widget Text Start--> 
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget_text">
                            <div class="logo">
                                <a href="#"><img src="images/down logo.png" alt="" style="height: 70px;" /></a>
                            </div>
                            <div class="text">
                                <p>This website provide complete information about tourism places with facilities, location map, contact details. Even it allows customer to book lodges, Cabs and Food order through online.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Widget Text End--> 
                    <!-- Widget Archives Start--> 
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget_archives">
                            <h6 class="widget-title">Our Services</h6>
                            <ul>
                                <li><a href="#">Travel & Tourism Booking</a></li>
                                <li><a href="#">Hotel Booking Portal</a></li>
                                <li><a href="#">Cab Booking</a></li>
                                <li><a href="#">Online food Order</a></li>
                                <li><a href="#">Gifts & Coupon</a></li>
                                <li><a href="#">24x7 Online Booking</a></li>
                            </ul>
                        </div>
                    </div>  
                    <!-- Widget Archives End--> 
                    <!-- Widget Flicker Start--> 
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget_flicker">
                            <h6 class="widget-title">Photo gallery</h6>
                            <ul>
                                <li><a href="#"><img src="imggallery/21frTibet2jpg.jpg" alt="" style="height: 75px;width: 75px;"></a></li>
                                <li><a href="#"><img src="imggallery/8603panambur-beach.jpg" alt="" style="height: 75px;width: 75px;"></a></li>
                                <li><a href="#"><img src="imggallery/736465215abbey.jpg" alt="" style="height: 75px;width: 75px;"></a></li>
                                <li><a href="#"><img src="imggallery/560882036Murudeshwara Temple.jpg" alt="" style="height: 75px;width: 75px;"></a></li>
                                <li><a href="#"><img src="imggallery/kollam.jpg" alt="" style="height: 75px;width: 75px;"></a></li>
                                <li><a href="#"><img src="imggallery/omakre temple.jpg" alt="" style="height: 75px;width: 75px;"></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Widget Flicker End-->
                    <!-- Widget Search Start-->
                    <div class="col-md-3 col-sm-6">
                        <div class="widget widget_search">
                            <h6 class="widget-title">keep in touch</h6>

<div class="mg_contact">
<i class="fa fa-phone"></i><span> 078-2612548</span>
<hr>
</div>
<div class="mg_contact"><i class="fa fa-envelope-o"></i><span>thetravelway.com</span><hr></div>
<br>
                            <ul class="mg_social">
                               <li><a href="https://facebook.com/freefriendlytravelmood"><i class="fa fa-facebook" target="_blank" ></i></a></li> 
                               <li><a href="https://twitter.com/freefriendlytravelmood" target="_blank"><i class="fa fa-twitter"></i></a></li> 
                               <li><a href="https://linkedin.com/freefriendlytravelmood" target="_blank"><i class="fa fa-linkedin"></i></a></li> 
                            </ul>
                        </div>
                    </div>
                    <!-- Widget Search End-->
                </div>
            </footer>
            <!-- iqoniq Footer End-->
            <!-- iqoniq Copyright Start-->
            <div class="mg_copyright">
                <p>Copyrights <?php echo date('Y'); ?>. All rights reserved
	<br>			
<?php
if(!isset($_SESSION['staffid']))
{
	if(!isset($_SESSION['customer_id']))
	{
?>
 <a class="btn btn-warning" data-toggle="modal" data-target="#StaffLoginModal" href="#" style="margin-top: 10px;">Staff Login</a>
<?php	
	}
}
?>
				</p>
            </div>
            <!-- iqoniq Copyright End-->

<!-- register Modal -->
<div class="modal fade" id="StaffLoginModal" tabindex="-1" role="dialog">
	<div class="modal-dialog login1 login5 login5-1">
                                <div class="modal-content">
                                    <div class="user-box">
<!--FORM FIELD START-->
<form method="post" action="" onsubmit="return validatestaffloginform()">
<h3>Staff Login Window</h3><hr>										
	<div class="mg_input_1">
		<input type="text" name="stafflogin" id="stafflogin" placeholder="Login ID"><span id="errstafflogin" class="errmsg flash"></span>
		<i class="fa fa-envelope-o"></i>
	</div>
	<div class="mg_input_1">
		<input type="Password" name="staffpassword" id="staffpassword"  placeholder="Password" class="form-control"><span id="errstaffpassword" class="errmsg flash"></span>
		<i class="fa fa-lock"></i>
	</div>
	<div class="dialog-footer">
	
		<button class="mg_btn1" name="btnstafflogin" id="btnstafflogin" type="submit">Click to Login</button>
	</div>
</form>
<!--FORM FIELD END-->
                                    </div>
                                </div>   
	</div>
</div>
<!-- register Modal end-->
			
            <!-- register Modal -->
            <div class="modal fade" id="reg-box" tabindex="-1" role="dialog">
                <div class="modal-dialog login1 login5 login5-1">
                    <div class="modal-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#sign-In1" aria-controls="sign-In1" role="tab" data-toggle="tab">Sign In</a></li>
                            <li role="presentation"><a href="#sign-up2" aria-controls="sign-up2" role="tab" data-toggle="tab">Sign Up</a></li>
                        </ul>
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane active" id="sign-In1">
                                <div class="modal-content">
                                    <div class="user-box">
<!--FORM FIELD START-->
<form method="post" action="" onsubmit="return validateloginform()">
	<div class="mg_input_1">
		<input type="text" name="customeremailid" id="customeremailid" placeholder="Enter Email ID">
		<span id="errcustomeremailid" class="errmsg flash"></span><i class="fa fa-envelope-o"></i>
	</div>
	<div class="mg_input_1">
		<input type="Password"  name="customerpassword" id="customerpassword" placeholder="Enter Password" class="form-control"><span id="errcustomerpassword" class="errmsg flash"></span>
		<i class="fa fa-lock"></i>
	</div>
	<div class="dialog-footer">
		<div class="input-container">
			<label>
				<span class="radio">
					<input type="checkbox" name="foo" value="1" checked>
					<span class="radio-value" aria-hidden="true"></span>
				</span>
				<span>Remember me</span>
			</label>
			<b><a href="" onclick="return false;"  data-toggle="modal" data-target="#CustForgetPassMod" ><i class="fa fa-arrow-right"></i> Did you forgot Password?</a></b>
		</div>
		<button type="submit" name="btncustomerlogin" id="btncustomerlogin"  class="mg_btn1">Login</button>
	</div>
</form>
<!--FORM FIELD END-->
                                    </div>
                                </div>   
                            </div>
                            <div role="tabpanel" class="tab-pane" id="sign-up2">
                                <div class="modal-content">
                                    <div class="user-box">
                                       <!--FORM FIELD START-->
<form method="post" action="" onsubmit="return validatecustregistration()">
	<div class="mg_input_1">
		<input type="text" name="cstname" id="cstname" placeholder="Name"><span id="errcustomername" class="errmsg flash"></span>
		<i class="fa fa-envelope-o"></i>
	</div>
	<div class="mg_input_1">
		<input type="text" name="cstemailid" id="cstemailid" placeholder="E-mail ID"><span id="errcustomerregemailid" class="errmsg flash"></span>
		<i class="fa fa-envelope-o"></i>
	</div>
	<div class="mg_input_1">
		<input type="text" name="cstcontactno" id="cstcontactno" placeholder="Contact Number"><span id="errcstcontactno" class="errmsg flash"></span>
		<i class="fa fa-envelope-o"></i>
	</div>
	<div class="mg_input_1">
		<input type="Password" class="form-control" name="cstpassword" id="cstpassword" placeholder="Password"><span id="errcustomerregpassword" class="errmsg flash"></span>
		<i class="fa fa-lock"></i>
	</div>
	<div class="mg_input_1">
		<input type="Password" class="form-control" name="cstcpassword" id="cstcpassword" placeholder="Confirm Password"><span id="errcstcpassword" class="errmsg flash"></span>
		<i class="fa fa-lock"></i>
	</div>
	<div class="dialog-footer">
		<button class="mg_btn1" type="submit" name="btnsubmit" >Register</button>
	</div>
</form>
                                        <!--FORM FIELD END-->
                                    </div>
                                </div>   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- register Modal end-->
            <!-- register Modal -->
            <div class="modal fade" id="search" tabindex="-1" role="dialog">
                <div class="modal-dialog login1 login5 login5-1">
                    <div class="modal-tab">
                        <div class="mg_input_1">
                            <input placeholder="Search keyword" type="text">
                            <label class="search_icon"><input type="submit"></label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- register Modal end-->
			
<!-- Customer Forget Password Modal Starts -->
<div class="modal fade" id="CustForgetPassMod" tabindex="-1" role="dialog">
	<div class="modal-dialog login1 login5 login5-1">
		<div class="modal-content">
			<div class="user-box">
				<!--FORM FIELD START-->
				<form method="post" action="">
					<center><h3>Recover password</h3>
					<br>
					<hr>										
					<div class="mg_input_1">
						<input type="text" name="custforgotpasslogin" id="custforgotpasslogin" placeholder="Login ID" required><span id="errstafflogin" class="errmsg flash"></span>
						<i class="fa fa-envelope-o"></i>
					</div>
					<div class="dialog-footer">
					<br>
						<button class="mg_btn1" name="btnforgotpasslogin" id="btnstafflogin" type="submit">Click here to Recover password</button>
					<br>
					<br>
					<br>
					</div>
				</form>
				<!--FORM FIELD END-->
			</div>
		</div>   
	</div>
</div>
<!-- Customer Forget Password ends Starts -->

			<!-- Gift Coupon Modal starts here -->
<!-- Load Records starts here -->
<div class="modal fade" id="modgiftcoupon" tabindex="-1" role="dialog">
	<div class="modal-dialog login1 login5 login5-1">
		<div class="modal-content">
			<div class="user-box">
				<!--FORM FIELD START-->
				<h5>Gift Coupon Detail</h5><hr>
					<div class="mg_input_1">					
<p>
<table id="datatable" class="table table-striped table-bordered" >
	<tbody>
	<?php
	$sqlgiftcoupon ="SELECT * FROM giftcoupon  where customer_id='$_SESSION[customer_id]' AND expirydate>='$dt' AND status='Active'";
	$qsqlgiftcoupon =mysqli_query($con,$sqlgiftcoupon);
	while($rsgiftcoupon = mysqli_fetch_array($qsqlgiftcoupon))
	{
		echo "<tr>
		
			<th>Coupon code</th>
			<td><b>$rsgiftcoupon[couponcode]</b></td>
			</tr>
			<tr>
			<th>Coupon Detail</th>
			<td>
				<b>Expires - </b> " . date("d-M-Y",strtotime($rsgiftcoupon['expirydate'])) . "<br>
				<b>Discount - </b> " . $rsgiftcoupon['discount_percentage'] . "%<br>
				<b>Max limit - </b> Rs. " . $rsgiftcoupon['max_limit'] . "
			</td>
			</tr>
			<tr>
			<th>Reason</th><td>$rsgiftcoupon[reason]</td>
			</tr>
			<tr>
			<th>Coupon Status</th>";
			if($rsgiftcoupon['status'] == 'Active')
			{
			echo "<td>Unused</td>";
			}
			else
			{
			echo "<td>Redeemed</td>";
			}
		echo "<td>
			</tr>
			<tr><th colspan='2' style='color: green;'><center>Redeem this coupon before it Expires...</center></th></tr>";
	}
	?>
	</tbody>
</table>
</p>
					</div>
				<!--FORM FIELD END-->
			</div>
		</div>   
	</div>
</div>
<!-- Load detailed Records ends here -->
            <!-- Gift Coupon Modal ends here -->
			
		</div>
        <!-- iqoniq Wrapper End-->
    	<!-- jQuery -->
    	<script src="js/jquery.js"></script>
    	<!-- bootstrap -->
    	<script src="js/bootstrap.js"></script>
        <!-- Slick Slider -->
        <script src="js/slick.min.js"></script>
        <!-- Masonry -->
        <script src="js/masonry.min.js"></script>
        <!-- Date Time Picker -->
        <script src="js/scripts.js"></script>
        <script src="js/jquery.datetimepicker.full.js"></script>
        <!--Dl Menu Script-->
        <script src="js/dl-menu/modernizr.custom.js"></script>
        <script src="js/dl-menu/jquery.dlmenu.js"></script>
        <!--Custom Script-->
    	<script src="js/custom.js"></script>
    	<script src="js/jquery.dataTables.min.js"></script>
		<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
		</script>
<script>
function validateloginform()
{
	
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	
	
	var i = 0;
	$( ".errmsg" ).empty();
	
	if(!document.getElementById("customeremailid").value.match(emailpattern))
	{
		document.getElementById("errcustomeremailid").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Enter valid email id.....";
		i=1;
	}
	if(document.getElementById("customeremailid").value== "")
	{
		document.getElementById("errcustomeremailid").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Email_id should not be empty...";
		i=1;
	}
	if(document.getElementById("customerpassword").value.length < 8)
	{
		document.getElementById("errcustomerpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Password should contain more than 8 characters...";
		i=1;
	}
	
	if(document.getElementById("customerpassword").value== "")
	{
		document.getElementById("errcustomerpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Password should not be empty...";
		i=1;
	}
	
	if(i == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<script>
function validatestaffloginform()
{
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	
	
	var i = 0;
	$( ".errmsg" ).empty();
	   
	if(!document.getElementById("stafflogin").value.match(emailpattern))
	{
		document.getElementById("errstafflogin").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Enter valid login ID.....";
		i=1;
	}
	if(document.getElementById("stafflogin").value== "")
	{
		document.getElementById("errstafflogin").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Staff login ID should not be empty...";
		i=1;
	}
	if(document.getElementById("staffpassword").value.length < 8)
	{
		document.getElementById("errstaffpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Password should contain more than 8 characters...";
		i=1;
	}
	
	if(document.getElementById("staffpassword").value== "")
	{
		document.getElementById("errstaffpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Staff Password should not be empty...";
		i=1;
	}
	
	if(i == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<script>
function validatecustregistration()
{
	
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$/; //For email id
	
	
	var i = 0;
	$( ".errmsg" ).empty();
	   
	if(!document.getElementById("cstname").value.match(alphaspaceExp))
	{
		document.getElementById("errcustomername").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Customer Name is not valid.....";
		i=1;
	}
	if(document.getElementById("cstname").value== "")
	{
		document.getElementById("errcustomername").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Customer name should not be empty...";
		i=1;
	}
	if(!document.getElementById("cstemailid").value.match(emailpattern))
	{
		document.getElementById("errcustomerregemailid").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Customer Email ID is not valid.....";
		i=1;
	}
	if(document.getElementById("cstemailid").value== "")
	{
		document.getElementById("errcustomerregemailid").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Email ID should not be empty..";
		i=1;
	}
	
	if(document.getElementById("cstcontactno").value.length != 10 )
	{
		document.getElementById("errcstcontactno").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Contact number should contain 10 digits..";
		i=1;
	}
	if(document.getElementById("cstcontactno").value== "")
	{
		document.getElementById("errcstcontactno").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Contact number should not be empty...";
		i=1;
	}
	
	if(document.getElementById("cstpassword").value.length < 8)
	{
		document.getElementById("errcustomerregpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Password should contain more than 8 characters...";
		i=1;
	}
	
	if(document.getElementById("cstpassword").value== "")
	{
		document.getElementById("errcustomerregpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Password should not be empty...";
		i=1;
	}
	
	if(document.getElementById("cstcpassword").value != document.getElementById("cstpassword").value)
	{
		document.getElementById("errcstcpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Password and confirm password not matching...";
		i=1;
	}
	
	if(document.getElementById("cstcpassword").value== "")
	{
		document.getElementById("errcstcpassword").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Confirm Password should not be empty...";
		i=1;
	}
	
	if(i == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
<?php
if(!isset($_SESSION['staffid']))
{
	include("chatbox.php");
}
?>
	</body>
</html>
