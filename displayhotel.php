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
?>
<?php
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
	if(mysqli_num_rows($qsql) == 0)
	{
		$img =  "images/nophoto.jpg";
	}
	else if($rs['hotel_image'] == "")
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
			<h5><a href="hoteldetails.php?hotelid=<?php echo $rshotel[0]; ?>&location_id=<?php echo $_GET['location_id']; ?>"><?php echo $rshotel['hotel_name']; ?></a></h5>
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
include("footer.php");
?>