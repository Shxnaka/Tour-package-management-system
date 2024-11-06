<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
include("databaseconnection.php");
$dttime = date("Y-m-d h:i:s");	
$sqlmessage = "SELECT * FROM message WHERE message_id='$_POST[message_id]' AND status='Active'";
$qsqlmessage = mysqli_query($con,$sqlmessage);
$rsmessage = mysqli_fetch_array($qsqlmessage);
$countmsg =mysqli_num_rows($qsqlmessage);
if($rsmessage['cust_id'] == 0 )
{
	$cname = "Customer";
}
else
{
	$sqlcustomer = "SELECT * FROM customer WHERE customer_id='$rsmessage[cust_id]'";
	$qsqlcustomer = mysqli_query($con,$sqlcustomer);
	$rscustomer = mysqli_fetch_array($qsqlcustomer);
	$cname = $rscustomer['customer_name'];
}
if($rsmessage['user_id'] == 0 )
{
	$sname = "Staff";
}
else
{
	$sqluser = "SELECT * FROM staff WHERE staffid='$rsmessage[user_id]'";
	$qsqluser = mysqli_query($con,$sqluser);
	$rsuser = mysqli_fetch_array($qsqluser);
	$sname = $rsuser['staffname'];
}
?><link href="onlinechat/css/style.css" rel="stylesheet">	
<input type="hidden" name="message_id" id="message_id" value="<?php echo $_POST['message_id']; ?>" >
    	<div  style="height:400px; overflow-y: scroll;" id="divchatrecords">
        <?php
		$sqlreplymsg = "SELECT * FROM message_reply  WHERE message_id='$_POST[message_id]' ORDER BY date_time";
		$qsqlreplymsg = mysqli_query($con,$sqlreplymsg);
		while($rsreplymsg = mysqli_fetch_array($qsqlreplymsg))
		{
				if($rsreplymsg['msg_type'] == 'Autobot' )
				{
		?>            
				<div class="chat-box-left">
					<strong style="color:#9B0305;"><?php echo $sname; ?>:</strong>
					<?php echo "<br>".$rsreplymsg['message_reply_text']; ?>
				</div>
				<?php
				}
				else
				{
			if($rsreplymsg['msg_type'] != 'Customer' )
			{
		?>            
            <div class="chat-box-left">
                <strong style="color:#9B0305;"><?php echo $sname; ?>:</strong>
                <?php echo "<br>".$rsreplymsg['message_reply_text']; ?>
            </div>  
            <?php
			}
			if($rsreplymsg['msg_type'] != 'Staff' )
			{
			?>
            <div class="chat-box-right">
                <strong style="color:#1A4512;"><?php echo $cname; ?>:</strong>
                <?php echo "<br>".$rsreplymsg['message_reply_text']; ?>
            </div> 
        <?php
			}
				}
		}
		?>                   
        </div>
<div class="chat-box-footer"  id="chattext">
	<div class="input-group" style="width: 100%;">
		<textarea class="form-control" id="txtadminchat" placeholder="Press Enter key to Send.."  onkeyup="submitadminchat('<?php echo $_POST['message_id']; ?>','Staff',this.value,event);"></textarea>
	</div>
</div>