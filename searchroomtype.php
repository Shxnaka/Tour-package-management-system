<!-- iqoniq Search Wrapper Start-->
<div class="">
	<div class="">
		<div class="mg_blog_medium fancy-overlay">
			<!-- Nav tabs Start -->
			<ul class="mg_hotel_search" role="tablist">
				<li role="presentation" style="width: 100%;padding-left: 10px;"><a href="#hotels" aria-controls="hotels" role="tab" data-toggle="tab">Search room type</a></li>
			</ul>
			<!-- Nav tabs End -->
			<form method="get" action="" >
			<input type="hidden" name="hotelid" value="<?php echo $_GET['hotelid']; ?>" >
			<!-- Tab panes Start -->
			<div class="tab-content">
				<!-- Tabs Pane Start -->
				<div role="tabpanel" class="tab-pane active" id="hotels">
					<!-- Search Start -->
					<div class="mg_search_tab">
<div class="row">
							<!-- Input Field Start -->
	<div class="col-md-6 col-sm-6">
		<div class="mg_input_1">
		<?php
			$sqlroomtype ="SELECT * FROM room_type where room_type.status='Active' AND room_type.hotel_id='$_GET[hotelid]'";
			$qsqlroomtype = mysqli_query($con,$sqlroomtype);
		?>
		<select id="room_type" name="room_type" class="mg_selectric"  onchange="loadadults(this.value)">
			<option value=''>Select Room type</option>
			<?php
			while($rsroomtype = mysqli_fetch_array($qsqlroomtype))
			{
				if($rsroomtype['room_typeid'] == $_GET['room_type'])
				{
					echo "<OPTION VALUE='$rsroomtype[room_typeid]' selected>" . $rsroomtype['room_type'] . "</option>";
				}
				else
				{
					echo "<OPTION VALUE='$rsroomtype[room_typeid]'>" . $rsroomtype['room_type'] . "</option>";
				}
			}
			?>
		</select>
		</div>
	</div>
	<!-- Input Field End -->
	<!-- Input Field Start -->
	<div class="col-md-3 col-sm-3">
		<div class="mg_input_1">
			<?php
			include("ajaxadult.php");
			?>
		</div>
	</div>
	<!-- Input Field End -->
	<!-- Input Field Start -->
	<div class="col-md-3 col-sm-3">
		<div class="mg_input_1">
			<?php
			include("ajaxchildren.php");
			?>
		</div>
	</div>
	<!-- Input Field End -->
</div>
<div class="row">

	<!-- Input Field Start -->
	<div class="col-md-3 col-sm-3">
		<!-- TIME WRAP START-->
		<input id="checkin" name="checkin" type="date" class="form-control"  value="<?php if(isset($_GET['btnsearch']))
		{
		echo $checkindt = $_GET['checkin']; 
		}
		else
		{
		echo $checkindt = date("Y-m-d", strtotime('tomorrow')); 
		} 
		?>" min="<?php echo date("Y-m-d", strtotime('tomorrow')); ?>" style="height:50px;" onkeyup="fun_load_checkout(checkin.value,checkout.value)"  onchange="fun_load_checkout(checkin.value,checkout.value)">
		<!--TIME WRAP END-->
	</div>
	<!-- Input Field End -->
	<div class="col-md-3 col-sm-3">
		<!-- TIME WRAP START-->
		<input id="checkintime" name="checkintime" class="form-control"  type="time" value="<?php if(isset($_GET['btnsearch']))
		{
			echo $checkindt = $_GET['checkintime']; 
		}
		?>" min="<?php echo date("Y-m-d", strtotime('tomorrow')); ?>" style="height:50px;" required >
		<!--TIME WRAP END-->
	</div>
	<!-- Input Field End -->
	
	<!-- Input Field Start -->
	<div class="col-md-3 col-sm-3">
		<input id="checkout" name="checkout" type="date"  min="<?php echo date("Y-m-d", strtotime('tomorrow')); ?>" class="form-control" value="<?php 
		if(isset($_GET['btnsearch']))
		{
			echo $checkoutdt = $_GET['checkout']; 
		}
		else
		{
			echo $checkoutdt = date("Y-m-d", strtotime('tomorrow')); 
		}
		?>" style="height:50px;"   >
	</div>
	<!-- Input Field End -->
	<!-- Input Field Start -->
	<div class="col-md-3 col-sm-3">
		<input id="checkouttime" name="checkouttime" type="time" class="form-control" value="<?php 
		if(isset($_GET['btnsearch']))
		{
			echo $checkoutdt = $_GET['checkouttime']; 
		}
		?>" style="height:50px;" required>
	</div>
	<!-- Input Field End -->
</div>
<div class="row">
							<!-- Input Field Start -->
							<div class="col-md-12 col-sm-12">
								<div class="mg_input_1">
								<hr>
									<button class="mg_btn1" name="btnsearch" id="btnsearch" value="Find Hotel"><i class="fa fa-search"></i>Find Hotel</button>
								</div>
							</div>
							<!-- Input Field End -->
</div>
						</div>
					</div>
					<!-- Search End -->
				</div>
				<!-- Tabs Pane End -->
			</div>
			<!-- Tab panes End -->
			</form>
		</div>
	</div>
</div>
<!-- iqoniq Search Wrapper End-->
<script>
//divadults divchildren onchange="showUser(this.value)"
function loadadults(roomtypeid) 
{
    if (roomtypeid == "") 
	{
        document.getElementById("divadults").innerHTML = '<select id="adults" name="adults"  class="form-control" style="height:50px;"><option value="" >Adults</option></select>';
        return;
    } 
	else 
	{ 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divadults").innerHTML = this.responseText;
				loadchildren(roomtypeid); 
            }
        };
        xmlhttp.open("GET","ajaxadult.php?room_type="+roomtypeid,true);
        xmlhttp.send();
    }
}
function loadchildren(roomtypeid) 
{
    if (roomtypeid == "") {
        document.getElementById("divchildren").innerHTML = '<select id="children" name="children"  class="form-control" style="height:50px;"><option value="" >Children</option></select>';
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divchildren").innerHTML = this.responseText;
            }
        };
      xmlhttp.open("GET","ajaxchildren.php?room_type="+roomtypeid,true);
        xmlhttp.send();
    }
}
</script>
<script>
function fun_load_checkout(checkin,checkout)
{
	//$("#checkout").val($("#checkin").val());
	$("#checkout").attr({"min" : $("#checkin").val(),"value" : $("#checkin").val()});
}
</script>