<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
include("databaseconnection.php");
?>
<a href="cart.php"><img src="images/Shopping-basket-icon.png" width="30" height="30" id="idcart"/><strong style="color:#FFFFFF" >Cart (<?php 
			 $sqlcartcount = "SELECT * FROM billing_records WHERE status='Pending'";
			 $qsqlcartcount = mysqli_query($con,$sqlcartcount);
			 echo mysqli_num_rows($qsqlcartcount);
			 ?>)</strong></a>