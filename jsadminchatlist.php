<?php
error_reporting(E_ALL & ~E_NOTICE  &  ~E_STRICT & ~E_WARNING);
?>
<table  id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
<tbody>
  <?php
  $sql = "SELECT * FROM message WHERE status='Active' ORDER BY message_id DESC";
  $qsql = mysqli_query($con,$sql);
  while($rs = mysqli_fetch_array($qsql))
  {
	  $sqlmessage = "SELECT * FROM  message where message_id='$rs[message_id]'";
	  $qsqlmessage = mysqli_query($con,$sqlmessage);
	  $rsmessage = mysqli_fetch_array($qsqlmessage);
	  
	  $sqlcustomer = "SELECT * FROM  customer where customer_id='$rs[cust_id]'";
	  $qsqlcustomer = mysqli_query($con,$sqlcustomer);
	  $rscustomer = mysqli_fetch_array($qsqlcustomer);
	 
  echo "<tr style='cursor:pointer;' onclick='loadcustomerchat(`$rs[message_id]`)'><td>&nbsp;";
  if($rs['cust_id'] == "0")
  {
	  echo "Customer".$rs[0];
  }
  else
  {
	  echo $rscustomer['customer_name'];  
  }
  echo "<br>$rs[date_time]  
  </td>
  </tr>";
  }
  ?>
  </tbody>
</table>