<?php
if(isset($_SESSION['customer_id']))
{
    $sql ="SELECT * FROM customer WHERE customer_id='" . $_SESSION['customer_id'] . "'";
	$qsql = mysqli_query($con,$sql);
	$rs = mysqli_fetch_array($qsql);
	//Welcome message for New registered user starts here
	if($rs['address'] == "")
	{
	}
	//Welcome message for New registered user ends here
}
?>