<?php
include("header.php");
if(isset($_SESSION["employeeid"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST["btnloginemp"]))
{
	$sql= "SELECT * FROM employee WHERE login_id='$_POST[Username]' AND password='$_POST[Password]' AND status='Active'";
	$qresult = mysqli_query($con,$sql);
	if(mysqli_num_rows($qresult) >= 1 )
	{
		$rs = mysqli_fetch_array($qresult);
		$_SESSION["employeeid"] = $rs['employee_id'];
		$_SESSION["emp_type"] = $rs['emp_type'];
		echo "<script>window.location='dashboard.php';</script>";
	}
	else
	{
		echo "<script>alert('Failed to login...');</script>";
	}
}
?>
  <!-- Start main-content -->
  <div class="main-content">

  
    
    <!-- Section: Features  -->
    <section>
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="title text-uppercase line-bottom-double-line-centered" data-aos="fade-up"  data-aos-duration="600"> <span class="text-theme-colored">Employee</span> Login <span class="text-theme-colored">Panel</span></h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="icon-box left media border-1px bg-hover-theme-colored mb-30 p-30 pb-20"> <a class="media-left pull-left flip" href="#"><i class="flaticon-user text-theme-colored"></i></a>
                <div class="media-body">
                  <h5 class="media-heading heading" data-aos="fade-down"  data-aos-duration="600">Enter Login credentials..</h5>
                  <p data-aos="fade-up"  data-aos-duration="600">

<form action="" method="post">

	<div class="col-xs-4 col-sm-4 col-md-4">
		<input type="text" name="Username" placeholder="Username" class="form-control" >
	</div>
	<div class="col-xs-4 col-sm-4 col-md-4">
		<input type="password" name="Password" placeholder="Password" class="form-control" >
	</div>	
	<div class="col-xs-4 col-sm-4 col-md-4">
		<input type="submit" value="Login" name="btnloginemp" class="form-control">
	</div>
</form>
				  
				  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


   
 

    
    <!-- Divider: Clients -->
	<?php
	/*
    <section class="clients bg-theme-colored">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col clients-logo transparent text-center">
              <div class="item"> <a href="#"><img src="images/clients/w1.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w2.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w3.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w4.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w5.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w6.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w3.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w4.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w5.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w6.png" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  */
  ?>
  </div>
  <!-- end main-content -->
<?php
include("footer.php");
?>