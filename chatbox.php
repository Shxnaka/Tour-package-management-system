<div class="col-lg-3 col-md-3 col-sm-3"  style="position: fixed;bottom: 0;right: 0px;z-index: 2;">
	<div class="chat-box-div">
		<div class="chat-box-head">
		Chat with our Agent
			<div class="btn-group pull-right">
				<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-expanded="false"  onclick="funminmaxbtn()"  id="buttonchat" style="height:30px;">
				<span class="fa fa-minus"></span>
				<span class="sr-only">Toggle Dropdown</span>
				</button>
			</div>
		</div>
		<div class="panel-body chat-box-main" id="chatmessage" style="background-color:#F8F8F8">                        
			<?php
			include("jschatmsg.php");
			?>
		</div>         
		<div class="chat-box-footer"  id="chattext">
				<input type="text" class="form-control" id="txtchat" placeholder="Press Enter key to Send.."  onkeyup="submitchat('<?php echo $_SESSION['chatid']; ?>','Customer',this.value,event);">
		</div>
	</div>
</div>
<!-- ############ Chat code starts here  #####################  -->
<link href="onlinechat/css/style.css" rel="stylesheet" />
<!-- ############ Chat code ends here  #####################  -->
<div id="sound" style="visibility:hidden"></div>
<?php
if(!isset($_SESSION['staffid']))
{
?>
	<script type="application/javascript">	
        //On page load the message scroll box goes to bottom.
        $( window ).on( "load", function() {
           $('#chatmessage').animate({ scrollTop: $('#chatmessage').prop('scrollHeight')}, 1000);	
        });
    </script>
    <script type="application/javascript">
        function funminmaxbtn()
        {
            var button = document.getElementById('buttonchat');
            var divchatmessage = document.getElementById('chatmessage');
            var divchattext = document.getElementById('chattext');
        
            if (divchatmessage.style.display === 'none') 
            {		
                button.innerHTML = '<span class="fa fa-minus"></span><span class="sr-only">Toggle Dropdown</span>';	
                divchatmessage.style.display = 'block';
                divchattext.style.display = 'block';
            } 
            else
            {
                button.innerHTML = '<span class="fa fa-plus"></span><span class="sr-only">Toggle Dropdown</span>';		
                divchatmessage.style.display = 'none';
                divchattext.style.display = 'none';
            }
        }
        function mychatFunction()
        {
        
            var divuserslist = document.getElementById('divuserslist');
        
            if (divuserslist.style.display === 'none') 
            {		
                //button.innerHTML = '<span class="fa fa-window-minimize"></span><span class="sr-only">Toggle Dropdown</span>';	
                divuserslist.style.display = 'block';
            } 
            else
            {
                //button.innerHTML = '<span class="fa fa-window-maximize"></span><span class="sr-only">Toggle Dropdown</span>';		
                divuserslist.style.display = 'none';
            }
        }
        //Submit chat message
        function submitchat(chatsessionid,custtype,message,e)
        {
            if(message != "")
            {
                var code = (e.keyCode ? e.keyCode : e.which);
                if(code == 13) //Enter keycode
                {
                    var chatsessionid = chatsessionid;
                    var txtmessage = message;
                    document.getElementById("txtchat").value="";
					/*
                    $.post("jschatmsgins.php", 
					{ "chatsessionid": chatsessionid, "custtype": custtype,"message": message}
					);
					*/
					$.ajax({
						type: 'POST',
						url: 'jschatmsgins.php',
						data: {"chatsessionid": chatsessionid, "custtype": custtype,"message": message}, // or JSON.stringify ({name: 'jonas'}),
						success: function(data) 
						{
							if(data == 1)
							{
								auto_load();
								//Wait for 3 seconds to Staff bot message starts here
								  setTimeout(function(){
										sendautobotmessage(chatsessionid,custtype,message);
								  }, 3000);
								//Wait for 3 seconds to Staff bot message ends here
							}
							else
							{
								auto_load();
							}
						}
					});
                }
            }
        }
        function sendautobotmessage(chatsessionid,custtype,message)
        {
            if(message != "")
            {
				var chatsessionid = chatsessionid;
				var txtmessage = message;
				$.ajax({
					type: 'POST',
					url: 'jsbotmessage.php',
					data: {"chatsessionid": chatsessionid, "custtype": custtype,"message": message},					
					success: function(data) 
					{
						auto_load();
					}
				});
            }
        }
    </script>
    <script>
    var chatdata = "";
         function auto_load()
         {
             
            $.ajax({
              url: "jscart.php",
              cache: false,
              success: function(data){
                 $("#divcart").html(data);
              } 
            });
            
            $.ajax({
              url: "jschatmsg.php",
              cache: false,
              success: function(data){
                  if(data == chatdata)
                  {
                  }
                  else
                  {
                      chatdata = data;
                    $("#chatmessage").html(data);
                    $('#chatmessage').animate({ scrollTop: $('#chatmessage').prop('scrollHeight')}, 1000);	
                    document.getElementById("sound").innerHTML  ="<audio autoplay ><source src='onlinechat/mp3/surprise.mp3' type='audio/mp3' >";
                  }
              } 
            });	
         }
          $(document).ready(function(){
            auto_load(); //Call auto_load() function when DOM is Ready
          });
     
          //Refresh auto_load() function after 10000 milliseconds
          setInterval(auto_load,1000);
    </script>
<?php
}
?>