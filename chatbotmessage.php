<?php
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql = "UPDATE chatbot SET received_message='$_POST[received_message]',response_message='$_POST[response_message]' WHERE chatbot_id ='$_GET[editid]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Chat Bot message updated successfully..');</script>";
		}
	}
	else
	{
		$sql ="INSERT INTO chatbot(received_message,response_message) values('$_POST[received_message]','$_POST[response_message]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==  1)
		{
			echo "<script>alert('Chat Bot message inserted successfully..');</script>";
			echo "<script>window.location='chatbotmessage.php';</script>";
		}
	}
}
?>  
<?php
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM chatbot where chatbot_id ='$_GET[editid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?> 
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Chat Bot Message</h2>
                </div>
            </div>
            <!-- Sub Banner Start -->
            <!-- Main Contant Wrap Start -->
            <div class="iqoniq_contant_wrapper">
                <section>
                    <div class="container">
<form method="post" action="" onsubmit="return validateform()">
<div class="row">
<!-- Hotel Destination Start -->
<div class="col-md-12 col-sm-12">
	<div class="mg_hotel_destination fancy-overlay">
		<div class="text">
			
<div class="row"> 
	<div class="col-md-2 boldfont">
		Chat Message
	</div>
	<div class="col-md-10">
		<input type="text" placeholder="Enter the name" name="received_message" id="received_message" class="form-control" value="<?php echo $rsedit['received_message'];?>"><span id="errreceived_message" class="errmsg flash"></span>
	</div>
</div><br>
		
<div class="row"> 
	<div class="col-md-2 boldfont">
		Response Message
	</div>
	<div class="col-md-10">
		<input type="text" placeholder="Enter the name" name="response_message" id="response_message" class="form-control" value="<?php echo $rsedit['response_message'];?>"><span id="errresponse_message" class="errmsg flash"></span>
	</div>
</div><br>
	

<div class="row"> 
	<div class="col-md-2">
		
	</div>
	<div class="col-md-10">
		<input type="submit" name="submit" id="submit" class="form-control btn btn-warning " style="width: 250px;height:50px;" >
	</div>
</div><br>
</form>
		</div>
	</div>
</div>
<!-- Hotel Destination End -->


						</div>
                    </div>
                </section>
            </div>
            <!-- Main Contant Wrap End -->
   <?php
include("footer.php");
?>
<script>
function validateform()
{
	
	var alphaExp = /^[a-zA-Z]+$/;	//Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/;//Variable to validate only alphabets with space
	var alphanumericExp = /^[a-zA-Z0-9]+$/;//Variable to validate only alphanumerics
	var numericExpression = /^[0-9]+$/;	//Variable to validate only numbers
	var emailpattern = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/; //For email id
	var i = 0;
	$( ".errmsg" ).empty();
	if(document.getElementById("received_message").value== "")
	{
		document.getElementById("errreceived_message").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i> Receivable message should not be empty...";
		i=1;
	}
	if(document.getElementById("response_message").value== "")
	{
		document.getElementById("errresponse_message").innerHTML = " <i class='fa fa-times-circle' aria-hidden='true'></i>Response message should not be empty...";
		i=1;
	}	
	if(i == 0)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>