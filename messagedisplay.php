<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM message WHERE message_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	if(!$qsql)
	{
		echo mysqli_error($con);
	}
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Record deleted successfully..');</script>";
	}
}
?>
<!-- contact section -->
<section id="contact" class="parallax-section" style="background-color:#CCF">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-8 col-sm-10 text-center">
				<h1 class="heading">Message</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 col-md-10 col-sm-11 wow fadeIn" data-wow-delay="0.9s">
<?php
include("datatables.php");
?>
<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<thead>
				  <tr>
				    <th width="76" scope="col">Message Type </th>
				    <th width="61" scope="col">Customer ID</th>
				    <th width="87" scope="col">Message Text</th>
				    <th width="50" scope="col">Date /Time</th>
				    <th width="73" scope="col">Active</th>
			    </tr>
                </thead>
<tbody>
  <?php
  $sql = "SELECT * FROM message";
  $qsql = mysqli_query($con,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {
	  $sqlmessage = "SELECT * FROM  message where message_id='$rs[message_id]'";
	  $qsqlmessage = mysqli_query($con,$sqlmessage);
	  $rsmessage = mysqli_fetch_array($qsqlmessage);
	  
	  $sqlcustomer = "SELECT * FROM  customer where customer_id='$rs[cust_id]'";
	  $qsqlcustomer = mysqli_query($con,$sqlcustomer);
	  $rscustomer = mysqli_fetch_array($qsqlcustomer);
	  
	 
  echo "<tr>
		<td>&nbsp;$rsmessage[message_type]</td>
	    <td>&nbsp;$rscustomer[cust_id]</td>
		<td>&nbsp;$rs[message_text]</td>
		<td>&nbsp;$rs[date_time]</td>
		<td>&nbsp;<a href='message.php?editid=$rs[message_id]'>Edit</a> | <a href='messagedisplay.php?delid=$rs[message_id]' onclick='return deleteconfirm();' >Delete</a></td>
  </tr>";
  }
  ?>
  </tbody>
			  </table>
            </div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>


<?php
include("footer.php");
?>
<script type="application/javascript">
function deleteconfirm()
{
	if(confirm("Are you sure you want to delete this record?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>