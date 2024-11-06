<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM gallery WHERE galleryid='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<SCRIPT>alert('Gallery record deleted successfully...');</SCRIPT>";
		echo "<script>window.location='viewgallery.php?tourism_placeid=$_GET[tourism_placeid]';</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>View Gallery</h2>
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
<input type="button" class="btn-primary" name="btnphoto" id="btnphoto" value="Upload Photo or Video" onclick="window.location='gallery.php?tourism_placeid=<?php echo $_GET['tourism_placeid']; ?>'">
<hr>				 					
<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Gallery File</th>
			<th>Gallery Type</th>
			<th>Note</th>
			<th>Status</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM gallery WHERE tourism_placeid='$_GET[tourism_placeid]'";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr><td style='width: 250px;'>";
		if($rs['gallerytype'] == "Photo Gallery")
		{
			if($rs['upload_file'] == "")
			{
				$img = "images/nophoto.jpg";
			}
			else if(file_exists("imggallery/" . $rs['upload_file']))
			{
				$img = "imggallery/" . $rs['upload_file'];
			}
			else
			{
				$img = "images/nophoto.jpg";
			}
			echo "<img src='$img' style='width: 250px;height: 125px;' >";
		}
		if($rs['gallerytype'] == "Video Gallery")
		{
			echo "<video width='150' height='130' controls><source src='imggallery/$rs[upload_file]' type='video/mp4'></video>";
		}
		echo "</td>
			<td>$rs[gallerytype]</td>
			<td>$rs[note]</td>
			<td>$rs[status]</td>
			<td>
				<a href='gallery.php?editid=$rs[0]&tourism_placeid=$_GET[tourism_placeid]' class='btn btn-info'>Edit</a>			
				<A href='viewgallery.php?delid=$rs[0]&tourism_placeid=$_GET[tourism_placeid]' class='btn btn-danger' onclick='return confirmdel()'>Delete</a>
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
