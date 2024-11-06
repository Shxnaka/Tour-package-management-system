<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM feedback WHERE feedback_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Feedback deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewfeedback.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
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
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>View Feedback</h2>
                </div>
            </div>
            <!-- Sub Banner End -->
            <!-- iqoniq Contant Wrapper Start-->  
            <div class="iqoniq_contant_wrapper">
                <section class="gray-bg aboutus-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="about-us">
                                    <div class="text">
<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Customer</th>
			<th style="width: 150px;">Feedback For</th>
			<th>Feedback</th>
			<th>Ratings</th>
			<th style="width: 100px;">Publish Date</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT feedback.*,customer.customer_name FROM feedback LEFT JOIN customer ON customer.customer_id=feedback.customer_id";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$tofor ="";
		if($rs['tourism_placeid'] != 0)
		{
			$sqltourism_place ="SELECT * FROM tourism_place WHERE tourism_placeid='$rs[tourism_placeid]'";
			$qsqltourism_place = mysqli_query($con,$sqltourism_place);
			$rstourism_place = mysqli_fetch_array($qsqltourism_place);
			$tofor = $rstourism_place['tourism_place'] ." Tourism...";
		}
		if($rs['hotel_id'] != 0)
		{
			$sqltourism_place ="SELECT * FROM hotel WHERE hotel_id='$rs[hotel_id]'";
			$qsqltourism_place = mysqli_query($con,$sqltourism_place);
			$rstourism_place = mysqli_fetch_array($qsqltourism_place);	
			$tofor = "Hotel" .  $rstourism_place['hotel_name'];		
		}
		echo "<tr>
			<td>$rs[customer_name]</td>
			<td>$tofor</td>
			<td>$rs[feedback]";
		echo "<br>";
			if($rs['tourism_placeid'] != 0)
			{
			$sqlimg = "SELECT * FROM gallery WHERE tourism_placeid='$rs[0]' and status='Active' AND gallerytype='Feedback'";
			$qsqlimg = mysqli_query($con,$sqlimg);
			echo mysqli_error($con);
			while($rsimg = mysqli_fetch_array($qsqlimg))
			{
				$path = "imgfeedback/".$rsimg['upload_file'];
				if(is_image($path) == true)
				{
			?>
				<img src="<?php echo $path; ?>" style="width: 50px;height:50px;cursor: pointer;" onclick="loadfile('1','<?php echo $path; ?>')"   data-toggle="modal" data-target="#ModalLoadGallery" >
			<?php
				}
				else
				{
			?>
				<img src="images/vidimg.png" style="width: 50px;height:50px;cursor: pointer;" onclick="loadfile('2','<?php echo $path; ?>')"   data-toggle="modal" data-target="#ModalLoadGallery" >
			<?php
				}
			}
			}
		echo "</td>
			<td>$rs[ratings] stars</td>
			<td>" . date("d-M-Y",strtotime($rs['feedback_dt'])) . "</td>
			<td>
			<a href='giftcoupon.php?customer_id=$rs[customer_id]' class='btn btn-info'>Select Customer</a>";
	
		echo "		
			
			</td>
		</tr>";
	}
	?>
	</tbody>
</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <!-- iqoniq Contant Wrapper End-->  
<?php
include("footer.php");
?>
<script>
function confirmdel()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>
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