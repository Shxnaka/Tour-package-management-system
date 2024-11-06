<?php
include("header.php");
error_reporting(0);
date_default_timezone_set("Asia/Calcutta");
$dttim = date("Y-m-d H:i:s");
if(!isset($_SESSION["employeeid"]))
{
	echo "<script>window.location='index.php';</script>";
}
$sqledit = "SELECT * FROM employee WHERE employee_id='$_SESSION[employeeid]'";
$qsqledit= mysqli_query($con,$sqledit);
$rsedit = mysqli_fetch_array($qsqledit);
?>
<?php
if(!isset($_SESSION['receiver_id']))
{
	$sqlcustomer = "select * from customer WHERE status='Waiting List' order by customer_id LIMIT 1";
	$qsqlcustomer = mysqli_query($con,$sqlcustomer);
	echo mysqli_error($con);
	$rscustomer = mysqli_fetch_array($qsqlcustomer);
	$_SESSION['receiver_id'] = $rscustomer[0];
	//###
	$message = "Hello $rscustomer[customer_name], My name is $rsedit[emp_name]. How can I help you?";
	$sql ="INSERT INTO message(sender_id,receiver_id,message_date_time,product_id,message,status) values('$rsedit[0]','$_SESSION[receiver_id]','$dttim','$_SESSION[receiver_id]','$message','Employee')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
	//###
	$sqlupd = "UPDATE customer SET status='Processing' WHERE customer_id='$_SESSION[receiver_id]'";
	$qsqlupd = mysqli_query($con,$sqlupd);
	//Load Customer starts here
	$sqlcustomer = "select * from customer WHERE status='Waiting List' AND customer_id>'$_SESSION[receiver_id]'";
	$qsqlcustomer = mysqli_query($con,$sqlcustomer);
	echo mysqli_error($con);
	while($rscustomer = mysqli_fetch_array($qsqlcustomer))
	{
$sqlcountchat = "SELECT count(*) FROM customer WHERE status='Waiting List' AND customer_id<'$rscustomer[customer_id]'";
$qsqlcountchat= mysqli_query($con,$sqlcountchat);
echo mysqli_error($con);
$rscountchat = mysqli_fetch_array($qsqlcountchat);
$countno = $rscountchat[0]+1;
$message= "<label style='color: red;'>You are currently number "  . $countno . " in the queue...</label>";
$message =  mysqli_real_escape_string($con,$message);
if($countno != 0)
{
	$sql = "INSERT INTO message(sender_id,receiver_id,message_date_time,message,status,product_id) VALUES('$rscustomer[customer_id]','0','$dttim','$message','Employee','$rscustomer[customer_id]')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
}
	}
	//Load Customer ends here
}
?>
<?php
//Dashboard starts here
if(isset($_GET['status']))
{
	$sqlupd = "UPDATE customer SET status='$_GET[status]' WHERE customer_id='$_SESSION[receiver_id]'";
	$qsqlupd= mysqli_query($con,$sqlupd);
	$message = "<b style='color: red;'>Thank you for contacting our support team...</b>";
	$message =  mysqli_real_escape_string($con,$message);
	$sql = "INSERT INTO message(sender_id,receiver_id,message_date_time,message,status,product_id) VALUES('0','0','$dttim','$message','Employee','$_SESSION[receiver_id]')";
	$qsql= mysqli_query($con,$sql);
	echo mysqli_error($con);
	unset($_SESSION['receiver_id']);
	echo "<script>window.location='chatboard.php';</script>";
}
//Dashboard ends here
?>
  <!-- Start main-content -->
  <div class="main-content">

<?php
	$sqlcustomer = "select * from customer WHERE customer_id='$_SESSION[receiver_id]' order by customer_id LIMIT 1";
	$qsqlcustomer = mysqli_query($con,$sqlcustomer);
	echo mysqli_error($con);
	$rscustomer = mysqli_fetch_array($qsqlcustomer);
?>
    
    <!-- Section: Features  -->
    <section>
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="title text-uppercase line-bottom-double-line-centered" data-aos="fade-up"  data-aos-duration="600"> <span class="text-theme-colored">CHAT BOARD.</span> </h2>
            </div>
          </div>
        </div>
        <div class="section-content">

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="icon-box left media border-1px mb-30 p-30 pb-20"> <a class="media-left pull-left flip" href="#"><i class="flaticon-chat text-theme-colored"></i></a>
                <div class="media-body">
                  <p data-aos="fade-up"  data-aos-duration="600">
<table  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
    <thead>
		<tr>
			<th>Customer name</th>
			<td><?php echo $rscustomer['customer_name']; ?></td>
		</tr>
		<tr>
			<th>Email id</th>
			<td><?php echo $rscustomer['email_id']; ?></td>
		</tr>
		<tr>
			<th>Mobile number</th>
			<td><?php echo $rscustomer['mobile_no']; ?></td>
		</tr>
		<tr>
			<th>Enquiry detail</th>
			<td><?php echo $rscustomer['note']; ?></td>
		</tr>
		<tr>
			<td colspan="2">
			<center><input type="button" value="Click here to Chat" class="btn btn-warning  btn-lg" data-toggle="modal" data-target="#myModal"></center></td>
		</tr>
	</tbody>
</table>
				  
				  </p>
                </div>
              </div>
            </div>
          </div>
	  
        </div>
      </div>
    </section>


   
  </div>
  <!-- end main-content -->
  
<style>
.modal-full {
    min-width: 100%;
    margin: 0;
}

</style>
<centeR>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog  modal-full">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Chat Window</h4>
      </div>
      <div class="modal-body">
<?php
session_start();
error_reporting(0);
$dttim = date("Y-m-d H:i:s");
include("databaseconnection.php");
?>
<!-- testimonials -->
	<div class="testimonials">
		<div class="container">
				<div class="w3_testimonials_grids">
					<div >
					<div class="container">
<?php
if(isset($_SESSION['receiver_id']))
{
?>
					
	<div class="row">

                 <div class="col-md-4">
				 
<table  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >			
    <thead>
		<tr>
			<th>Customer Name</th>
			<td><?php echo $rscustomer['customer_name']; ?></td>
		</tr>
		<tr>
			<th>Email ID</th>
			<td><?php echo $rscustomer['email_id']; ?></td>
		</tr>
		<tr>
			<th>Mobile Number</th>
			<td><?php echo $rscustomer['mobile_no']; ?></td>
		</tr>
		<tr>
			<th>Enquiry detail</th>
			<td><?php echo $rscustomer['note']; ?></td>
		</tr>
		<tr>
			<td colspan="2">
			<center><a href="chatboard.php?status=Closed" class="btn btn-danger  btn-lg" onclick="return confirmclose()" >Click here to END Chat</a></center></td>
		</tr>
	</tbody>
</table>	
                 </div>
                 <div class="col-md-8">
                  <div class="chatbody"  id="chatbody" style="height: 425px;width: 100%;overflow: auto; float: left; position: relative;margin-left: -5px;border: 11px;border: 1px solid black;" >
<?php
include("chatmode.php");
?>
                  </div>
				  <textarea id="status_message" placeholder="Type a message..."  class="form-control" name="message"    placeholder="Compose Message here.."></textarea>
                 </div>
             </div>


<?php
}
else
{
?>			

	<div class="row">
		<div class="col-md-12" style="height: 500px;">
				<center><h2>No Customers in Queue...</h2></center>
		</div>
	</div>
<?php
}
?>
</div>
<style>
.chatperson{
  display: block;
  border-bottom: 1px solid #eee;
  width: 100%;
  display: flex;
  align-items: center;
  white-space: nowrap;
  overflow: hidden;
  margin-bottom: 15px;
  padding: 4px;
}
.chatperson:hover{
  text-decoration: none;
  border-bottom: 1px solid orange;
}
.namechat {
    display: inline-block;
    vertical-align: middle;
}
.chatperson .chatimg img{
  width: 40px;
  height: 40px;
  background-image: url('http://i.imgur.com/JqEuJ6t.png');
}
.chatperson .pname{
  font-size: 13px;
  padding-left: 5px;
}
.chatperson .lastmsg{
  font-size: 12px;
  padding-left: 5px;
  color: #ccc;
}
</style>
									<div class="clearfix"> </div>
					</div>
				</div>
		</div>
	</div>
<!-- //testimonials -->
      </div>
    </div>
  </div>
</div>
  </centeR>
<?php
include("footer.php");
?>
<script>
function confirmclose()
{
	if(confirm("Are you sure want to close this Chat box...?") == true)
	{
		return  true;
	}
	else
	{
		return false;
	}
}
</script>

<script>
$('#status_message').bind('keyup', function(e) {
	if($('#status_message').val() != "")
	{
		if ( e.keyCode === 13 ) 
		{	// 13 is enter key
			var message = $('#status_message').val();
				$.post("chatmode.php",
				{
					'message': message,
					'product_id': 0,
					'senderid': 0,
					'receiverid': 0,
					'btnmessage': "Submit"
				},
				function(data, status){
					$('#status_message').val('');
					$('#chatbody').html(data);
					$('#chatbody').scrollTop($('#chatbody')[0].scrollHeight);
				});
		}
	}
});
</script>
<script>
$('#myModal').modal({backdrop: 'static', keyboard: false})  
</script>
<script>
function loadmessage(senderid,receiverid,productid)
{
	var message = "";
			$.post("chatmode.php",
			{
				'message': message,
				'productid': productid,
				'senderid': senderid,
				'receiverid': receiverid,
				'status':'Employee',
				'btnmessage1':'btnmessage'
			},
			function(data, status){
				//$('#status_message').val('');
				$('#chatbody').html(data);
				$('#chatbody').scrollTop($('#chatbody')[0].scrollHeight);
			});
}
</script>
<script>
setInterval(function(){
    loadmessage(0,0,0); // this will run after every 5 seconds
}, 5000);
</script>
<script>
loadmessage(0,0,0);
</script>