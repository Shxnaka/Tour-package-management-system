<?php
session_start();
error_reporting(0);
include("databaseconnection.php");
date_default_timezone_set("Asia/Calcutta");
$dttim = date("Y-m-d H:i:s");
if(isset($_POST['btnmessage']))
{
	$sql ="INSERT INTO message(sender_id,receiver_id,message_date_time,message,status,product_id) values('$_SESSION[customerid]','$_POST[receiverid]','$dttim','$_POST[message]','Customer','$_SESSION[customerid]')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
}
$sqlmessage ="SELECT message.*, customer.customer_name, customer.status as chatstatus FROM message LEFT JOIN customer ON message.product_id=customer.customer_id WHERE message.product_id='$_SESSION[customerid]' ORDER BY message.message_date_time ASC";
$qsqlmessage = mysqli_query($con,$sqlmessage);
while($rsmessage = mysqli_fetch_array($qsqlmessage))
{
	if($rsmessage['chatstatus'] == "Closed")
	{
		//unset($_SESSION['customerid']);
?>
<script>
document.getElementById("status_message").readOnly = true;
document.getElementById("status_message").disabled = true;
document.getElementById("status_message").placeholder = "Chat support Closed...";
</script>
<?php
	}
	if($rsmessage['chatstatus'] == "Waiting List")
	{
?>
<script>
document.getElementById("status_message").readOnly = true;
document.getElementById("status_message").disabled = true;
document.getElementById("status_message").placeholder = "Chat support not opened yet..";
</script>
<?php
	}
	if($rsmessage['chatstatus'] == "Processing")
	{
?>
<script>
document.getElementById("status_message").readOnly = false;
document.getElementById("status_message").disabled = false;
document.getElementById("status_message").placeholder = "Type a message...";
</script>
<?php
	}
		if($rsmessage['status'] == "Customer")
		{
			$name = $rsmessage['customer_name'];
		}
		if($rsmessage['status'] == "Employee")
		{
			$sqlemployee = "SELECT * FROM employee WHERE employee_id='$rsmessage[sender_id]'";
			$qsqlemployee = mysqli_query($con,$sqlemployee);
			$rsemployee = mysqli_fetch_array($qsqlemployee);
			if(mysqli_num_rows($qsqlemployee) == 0)
			{
				$name = "<b style='color: green;'>Chat Representative</b>";
			}
			else	
			{
				$name = $rsemployee['emp_name'];
			}
		}
?>
<div class="direct-chat-messages" >					
	<!-- Message. Default to the left -->
	<div class="direct-chat-msg doted-border" >
	  <div class="direct-chat-text" >
		<?php
		if($name != "<b style='color: green;'>Chat Representative</b>")
		{
		?>
	  <b><?php echo $name; ?></b><br>
		<?php
		}
		?>
		<span style="font: 15px arial, sans-serif;" ><?php echo $rsmessage['message']; ?></span>
	  </div>

	  <div class="direct-chat-info">  
		<span class="direct-chat-timestamp pull-right"><?php echo date("d-M-Y h:i A",strtotime($rsmessage['message_date_time'])); ?></span>
	  </div>
		<?php
		/*
		<div class="direct-chat-info clearfix">
		<span class="direct-chat-img-reply-small pull-left"></span>
		<span class="direct-chat-reply-name">Singh</span>
		</div>
		*/ 
		?>
	  <!-- /.direct-chat-text -->
	</div>
	<!-- /.direct-chat-msg -->
</div>
<?php
}
?>