            <!-- iqoniq Mina Banner Start-->       
            <div class="mg_hotel_banner">
                <div class="mg_slider1">
                    <div>
                        <figure>
                            <img src="extra-images/banner1.jpg" alt=""/>
                        </figure>
                    </div>
                    <div>
                        <figure>
                            <img src="extra-images/banner2.jpg" alt=""/>
                        </figure>
                    </div>
                    <div>
                        <figure>
                            <img src="extra-images/banner3.jpg" alt=""/>
                        </figure>
                    </div>
                </div>
<form method="get" action="tourismlocationdeail.php">				
                <!-- iqoniq Search Wrapper Start-->
                <div class="search_wraper">
                    <div class="container">
                        <div class="search_one absolute">
                            <!-- Tab panes Start -->
                            <div class="tab-content">
                                <!-- Tabs Pane Start -->
                                <div role="tabpanel" class="tab-pane active" id="hotels">
                                    <!-- Search Start -->
									<br>
									<b style="color: #ff000a;font-size: 22px;">Search Hotel</b>
                                    <div class="mg_search_tab">
                                        <div class="row">
<!-- Input Field Start -->
<div class="col-md-6 col-sm-6">
	<div class="mg_input_1" style="text-align: left;">
	<b>Select Tourism Location</b>
		<select class="mg_selectric" name="location_id" id="location_id" required >
		<option value="">Select Tourism Location</option>
		<?php
		$sqlhotellist= "SELECT * FROM tourism_location WHERE status='Active'";
		$qsqlhotellist = mysqli_query($con,$sqlhotellist);
		while($rshotellist = mysqli_fetch_array($qsqlhotellist))
		{
			if($rshotellist['location_id'] == $_GET['location_id'])
			{
				echo "<option value='$rshotellist[location_id]' selected>$rshotellist[location_name]</option>";
			}
			else
			{
				echo "<option value='$rshotellist[location_id]'>$rshotellist[location_name]</option>";
			}
		}
		?>
		</select>
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-3 col-sm-3">
	<div class="mg_input_1" style="text-align: left;">
	<b>Adults</b>
		<select class="mg_selectric" name="searchadults" id="searchadults" required >
			<option value="">Adults</option>
			<?php
			$arr = array("1","2","3","4","5","8","10");
			foreach($arr as $val)
			{
				if($val == $_GET['searchadults'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val'>$val</option>";
				}
			}
			?>
		</select>
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-3 col-sm-3">
	<div class="mg_input_1" style="text-align: left;">
	<b>Children</b>
		<select class="mg_selectric" name="searchchildren" id="searchchildren" required >
			<option value="">Children</option>
			<?php
			$arr = array("0","1","2","3","4","5","8","10");
			foreach($arr as $val)
			{
				if($val == $_GET['searchchildren'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val'>$val</option>";
				}
			}
			?>
		</select>
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-6 col-sm-6">
	<div class="mg_input_1" style="text-align: left;">
		<b>CheckIn Date</b>
		<input type="date" class="form-control" name="search_check_in" id="search_check_in" placeholder="CheckIn Date" min="<?php echo date("Y-m-d"); ?>" value="<?php echo $_GET['search_check_in']; ?>"  required />
	</div>
</div>
<!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-6 col-sm-6">
	<div class="mg_input_1" style="text-align: left;">
		<b>CheckOut Date</b>
		<input type="date" class="form-control" name="search_check_out" id="search_check_out" placeholder="CheckOut Date" min="<?php echo date("Y-m-d"); ?>"  value="<?php echo $_GET['search_check_out']; ?>"  required  />
	</div>
</div>
<!-- Input Field End -->
                                            <!-- Input Field End -->
<!-- Input Field Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_input_1">
	<hr>
		<button class="btn btn-danger" style="width: 100%;" type="submit" name="btnsearch" id="btnsearch" value="btnsearch" > <i class="fa fa-search"></i> Find Hotel</button>
	</div>
</div>
<!-- Input Field End -->
                                        </div>
                                    </div>
                                    <!-- Search End -->
                                </div>
                                <!-- Tabs Pane End -->							</div>
                            <!-- Tab panes End -->
                        </div>
                    </div>
                </div>
                <!-- iqoniq Search Wrapper End-->
</form>
            </div>
            <!-- iqoniq Mina Banner End-->  