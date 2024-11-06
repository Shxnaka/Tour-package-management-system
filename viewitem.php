<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM item WHERE item_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Item deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewitem.php';</script>";
	}
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>View Item</h2>
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
			<th>Item Image</th>
			<th>Location </th>
			<th>Hotel </th>
			<th>Item name</th>
			<th>Food Category </th>
			<th>Item Description</th>
			<th>Cost</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT item.*,tourism_location.location_name,food_category.food_category,hotel.hotel_name FROM item LEFT JOIN tourism_location ON item.location_id=tourism_location.location_id LEFT JOIN food_category ON food_category.food_category_id=item.food_category_id LEFT JOIN hotel ON hotel.hotel_id =item.hotel_id";
	$qsql =mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		
		if($rs['item_img'] == "")
		{
			$img = "images/nophoto.jpg";
		}
		else if(file_exists('imgitem/'.$rs['item_img']))
		{
			$img = 'imgitem/'.$rs['item_img'];
		}
		else
		{
			$img = "images/nophoto.jpg";
		}
		echo "<tr>
			<td style='width: 135px;height: 135px;'><img src='$img' style='width: 135px;height: 135px;'></td>
			<td>$rs[location_name]</td>
			<td>$rs[hotel_name]</td>
			<td style='width: 100px;'>$rs[item_name]</td>
			<td>$rs[food_category]</td>
			<td>$rs[item_description]</td>
			<td> Rs.$rs[item_cost]</td>
			<td>$rs[status]</td>
			<td>
			<a href='item.php?editid=$rs[0]' class='btn btn-info'>Edit</a> ";
		if($_SESSION['stafftype'] == "Administrator")
		{
		echo " | 
			
			
			<A href='viewitem.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a>";	
		}		
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
function confirmdelete()
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