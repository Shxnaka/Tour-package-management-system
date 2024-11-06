<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM chatbot WHERE chatbot_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Chat Bot message record deleted successfully...');</script>";
		echo "<script>window.location='viewchatbotmessage.php';</script>";
	}
}
   ?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>View Chat Bot Message</h2>
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
<table id="datatable" class="table table-striped table-bordered">

	<thead>
		<tr>
			<th>Received Message</th>
			<th>Response Message</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		<?php
		$sql ="select * from chatbot";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "
			<tr>
				<td>$rs[received_message]</td>
				<td>$rs[response_message]</td>
				<td> 
				
				<a href='chatbotmessage.php?editid=$rs[0]' class='btn btn-warning'>Edit</a> 
				
				| 
				
				<a href='viewchatboxmessage.php?delid=$rs[0]' class='btn btn-danger' onclick='return confirmdel()'>Delete</a>
				
				</td>
			</tr>
			";			
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