<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='userlogin.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM message_reply WHERE message_reply_id='$_GET[delid]'";
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
    <th scope="col">Message ID</th>
    <th scope="col">Message Reply Text</th>
    <th scope="col">Date/Time</th>
    <th scope="col">Active</th>
  </tr>
  </thead>
  <tbody>
  <?php
  $sql = "SELECT * FROM message_reply";
  $qsql = mysqli_query($con,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {
	  $sqlmessage = "SELECT * FROM  message where message_id='$rs[message_id]'";
	  $qsqlmessage = mysqli_query($con,$sqlmessage);
	  $rsmessage = mysqli_fetch_array($qsqlmessage);
	  
  echo "
  <tr>
    <td>&nbsp;$rsmessage[message_id]</td>
    <td>&nbsp;$rs[message_reply_text]</td>
    <td>&nbsp;$rs[date_time]</td>
    <td>&nbsp;<a href='message_reply.php?editid=$rs[message_reply_id]'>Edit</a> | <a href='message_reply_display.php?delid=$rs[message_reply_id]' onclick='return deleteconfirm();' >Delete</a></td>
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