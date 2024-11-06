<?php
session_start();
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$dttim = date("Y-m-d H:i:s");
include("databaseconnection.php");
if($_POST["message"] != "")
{
	$sql ="INSERT INTO message(sender_id,receiver_id,message_date_time,product_id,message,status) values('$_SESSION[employeeid]','$_SESSION[receiver_id]','$dttim','$_SESSION[receiver_id]','$_POST[message]','Employee')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
}
$sqlmessage = "SELECT message.*, customer.customer_name, customer.status as chatstatus FROM message LEFT JOIN customer ON message.product_id=customer.customer_id  WHERE message.product_id='$_SESSION[receiver_id]' ORDER BY message.message_date_time ASC";
$qsqlmessage = mysqli_query($con,$sqlmessage);
$rsmessage =mysqli_fetch_array($qsqlmessage);
if($rsmessage['chatstatus'] == "Closed")
{
	echo "<script>alert('Customer Closed Chat Panel..');</script>";
	echo "<script>window.location='chatboard.php?status=Closed';</script>";
}
$sqlmessage = "SELECT message.*, customer.customer_name, customer.status as chatstatus FROM message LEFT JOIN customer ON message.product_id=customer.customer_id  WHERE message.product_id='$_SESSION[receiver_id]' ORDER BY message.message_date_time ASC";
$qsqlmessage = mysqli_query($con,$sqlmessage);
echo mysqli_error($con);
while($rsmessage =mysqli_fetch_array($qsqlmessage))
{
	if($rsmessage['status'] == "Customer")
	{
		$name = "<b style='color: blue;'>$rsmessage[customer_name]</b>";
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
			$name = "<b style='color: green;'>$rsemployee[emp_name]</b>";
		}
	}
?>
	<a href="" class="chatperson" onclick="return false;">
		<div class="namechat">
			<div class="pname" style="text-align: left;"><?php echo $name; ?> - <span font-size='font-size:9px;'><b><?php echo date("d-M-Y h:i A",strtotime($rsmessage['message_date_time'])); ?></b></span><br>
			<?php echo $rsmessage['message'] ?></div>
		</div>
	</a>
<?php
}
?>