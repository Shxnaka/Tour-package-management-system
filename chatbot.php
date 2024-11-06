<?php 
include("header.php");
if(!isset($_SESSION['staffid']))
{
	echo "<script>window.location='index.php';</script>";
}
?>
            <!-- Sub Banner Start -->
            <div class="mg_sub_banner">
                <div class="container">
                    <h2>Chat Bot</h2>
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
<table id="datatable" class="table table-striped table-bordered" >
	<thead>
		<tr>
			<th>Count</th>
			<th>Received Message</th>
			<th>Response message</th>
			<th style="width: 150px;">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$i=0;
	$sql ="SELECT message_reply_text,(SELECT response_message FROM chatbot WHERE chatbot.received_message=message_reply.message_reply_text ) as response_message, (SELECT count(*) FROM message_reply as a WHERE a.message_reply_text=message_reply.message_reply_text ) msgcount FROM `message_reply` WHERE msg_type='Customer' GROUP BY message_reply_text  ORDER BY `msgcount` DESC";
	$qsql =mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[msgcount]</td>
			<td>$rs[message_reply_text]</td>
			<td><textarea class='form-control' name='response_message$i' id='response_message$i'>$rs[response_message]</textarea></td>
			<td>
			<button class='btn btn-info' onclick='updmsg(`$rs[message_reply_text]`,response_message$i.value)'>Update</button>";
		echo "</td></tr>";
		$i = $i + 1;
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
function confirmdelete()
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
<script>
function updmsg(message_reply_text,response_message)
{
	$.post("jsbotchat.php", 
	{ message_reply_text: message_reply_text, response_message : response_message},
   function(data) 
   {
	   alert("AutoBot message updated successfully...");
   });
}
</script>