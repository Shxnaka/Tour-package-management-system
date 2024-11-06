<?php
include("header.php");
if($_POST['randomid'] == $_SESSION['randomid'])
{
	if(isset($_POST['submit']))
	{
		if(isset($_GET['editid']))
		{
			$sql ="UPDATE message_reply SET message_id='$_POST[msg]',message_reply_text='$_POST[msgrep]',date_time='$_POST[datetime]' WHERE  message_reply_id='$_GET[editid]'";
			$qsql = mysqli_query($con,$sql);
			if(!$qsql)
			{
				echo mysqli_error($con);
			}
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<script>alert('Message reply record updated successfully.');</script>";
			}	
		}
		else
		{
			$sql ="INSERT INTO message_reply(message_id,message_reply_text,date_time) values('$_POST[msg]','$_POST[msgrep]','$_POST[datetime]')";
		    $qsql = mysqli_query($con,$sql);
			if(!$qsql)
			{
				echo mysqli_error($con);
			}
			if(mysqli_affected_rows($con) == 1)
			{
				echo "<script>alert('Message reply record inserted successfully.');</script>";
			}
		}
	}
}
$_SESSION['randomid'] = rand();
if(isset($_GET['editid']))
{
	$sqledit ="select * from message_reply WHERE message_reply_id='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
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
				<form action="" method="post" name="frmmessagereply" onsubmit="return validateform()">
                <input type="hidden" name="randomid" value="<?php echo $_SESSION['randomid']; ?>">                 
                    <div class="col-md-10 col-sm-10">
						<select name="msg" class="form-control"  placeholder="Message">
                        <option value="">Select Message</option>
                        <?php
						$sqlmessage = "SELECT * FROM message";
						$qsqlmessage = mysqli_query($con,$sqlmessage);
						while($rsmessage = mysqli_fetch_array($qsqlmessage))
						{
							if($rsmessage['message_id'] == $rsedit['message_id'])
							{
							echo "<option value='$rsmessage[message_id]' selected>$rsmessage[message_type]</option>";
							}
							else
							{
							echo "<option value='$rsmessage[message_id]'>$rsmessage[message_type]</option>";
							}
						}
						?>
                        </select>
					<span id="idmessage" ></span>
                    </div>                                   
                     <div class="col-md-10 col-sm-10">
						<textarea name="msgrep" class="form-control" placeholder="Message Reply"><?php echo $rsedit['message_reply_text']; ?></textarea>
					<span id="idmessagerep" ></span>
                    </div>                    
                     <div class="col-md-10 col-sm-10">
						<input name="datetime" type="datetime-local" class="form-control" placeholder="Date Time" value="<?php echo $rsedit['date_time']; ?>">
					<span id="iddttym" ></span>
                    </div>                      	
					<div class="col-md-offset-3 col-md-4 col-sm-offset-3 col-sm-5">
						<input name="submit" type="submit" class="form-control" id="submit" value="<?php 
						if(isset($_GET['editid']))
						{
							echo "Update";
						}
						else
						{
							echo "Submit";
						}
						?>">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>


<?php
include("footer.php");
?>
<script type="application/javascript">
function validateform()
{
	var errmsg = 0;
	document.getElementById("idmessage").innerHTML = "";
	document.getElementById("idmessagerep").innerHTML ="";
	document.getElementById("iddttym").innerHTML ="";	
	
	if(document.frmmessagereply.msg.value =="")
	{
		document.getElementById("idmessage").innerHTML ="<font color='red'>Please select message.</font>";
		errmsg=1;
	}
	if(document.frmmessagereply.msgrep.value =="")
	{
		document.getElementById("idmessagerep").innerHTML ="<font color='red'>Please reply to the message.</font>"; 
		errmsg=1;
	}	
	if(document.frmmessagereply.datetime.value =="")  
	{
		document.getElementById("iddttym").innerHTML ="<font color='red'>Please enter date and time.</font>";
		errmsg=1;
	}
	if(errmsg==1)
	{
		return false;
	}
	else
	{
		return true;
	}
}
</script>