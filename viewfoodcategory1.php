<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM food_category WHERE food_category_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Food category deatils deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewfoodcategory.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>


<!-- teams 27 block -->
<section class="w3l-teams-27">
    <div class="teams27 section-gap">
        <div class="wrapper">
            <div class="">
                <h2>View Food Category</h2><hr>
                <p class="sub-paragraph">

<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Food Category</th>
			<th>Note</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM food_category LEFT JOIN location ON food_category.locationid=location.locationid";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[food_category]</td>
			<td>$rs[note]</td>
			<td>$rs[status]</td>
			<td>
			<a href='food_category.php?editid=$rs[0]' class='btn btn-info'>Edit</a>
			
			<A href='viewfoodcategory.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdelete()'>Delete</a>
			
			</td>
		</tr>";
	}
	?>
	</tbody>
</table>
				
				</p>
            </div>
        </div>
    </div>
</section>
    <!-- //teams 27 block -->




<?php
include("footer.php");
?>
<script>
function confirmdelete()
{
	if(confirm("Do you want to delete?") == true)
	{
		return true;
	}
	else
	{
		return false
	}
}
</script>