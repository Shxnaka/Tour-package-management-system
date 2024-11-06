<?php
include("header.php");
$_SESSION['randomid'] = rand();
?>
<!-- contact section -->
<section id="contact" class="parallax-section" style="background-color:#CCF">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-11 col-sm-11 wow fadeIn" data-wow-delay="0.9s">
<div id="chatsidebar" style="min-height:500px; max-height:500px; overflow-y: scroll;">
	<?php
	include("jsadminchatlist.php");
	?>
</div>
<div id="chatcontent" style="min-height:500px; max-height:500px; "> 
	<?php
	include("jsadminchat.php");
	?>

</div>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>
<?php
include("footer.php");
?>
<style type="text/css">
#chatsidebar {float: left; width: 250px; background: #eee; padding:5px;}
#chatcontent {overflow: hidden; background: #F8EEF8; padding:5px;}
</style>
<script type="application/javascript">
	var oldchatdata = "";
	function loadcustomerchat(message_id)
	{
		document.getElementById("chatcontent").innerHTML  =  "<br><center><img src='images/chat.gif' width='350px' height='350px'></img></center>";
				$.post("jsadminchat.php", { message_id: message_id},
			   function(data) 
			   {
				    document.getElementById("chatcontent").innerHTML  =  data;
					$('#divchatrecords').animate({ scrollTop: $('#divchatrecords').prop('scrollHeight')}, 1000);
					oldchatdata	= data;
			   });
	}
	
	function submitadminchat(msgid,custtype,message,e)
  	{		
		if(message != "")
		{
			var code = (e.keyCode ? e.keyCode : e.which);
			if(code == 13) //Enter keycode
			{
				var txtmessage = message;
				document.getElementById("txtadminchat").value="";
				$.post("jsadminchatins.php", { message_id: msgid, custtype: custtype,message:message});
				auto_load();
			}
		}
	}
</script>
<script>
	var chatdata = "";
	var msgid=0;
	 function auto_load()
	 {		
	 	msgid = document.getElementById("message_id").value;
				$.post("jsadminchat.php", { message_id: msgid},
			   function(data) 
			   {
					  if(data == chatdata)
					  {
					  }
					  else
					  {
						chatdata = data;
						if(oldchatdata != chatdata)
						{
						$("#chatcontent").html(data);
						$('#divchatrecords').animate({ scrollTop: $('#divchatrecords').prop('scrollHeight')}, 1000);	
						document.getElementById("sound").innerHTML  ="<audio autoplay ><source src='onlinechat/mp3/surprise.mp3' type='audio/mp3' >";
						oldchatdata=chatdata;
						}
					  }	
			   });
	 }
 
	  $(document).ready(function(){
		auto_load(); //Call auto_load() function when DOM is Ready
	  });
 
	  //Refresh auto_load() function after 10000 milliseconds
	  setInterval(auto_load,10000);
	  
	  
	  function cancelcustomized(item_id)
	  {
		  $.post("jscancelcustomized.php", { item_id: item_id},
			   function(data) 
			   {
				    alert('Custimized Order record cancelled..');			
			   });
	  }
</script>