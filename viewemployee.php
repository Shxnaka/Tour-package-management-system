<?php
include("header.php");
if(!isset($_SESSION["employeeid"]))
{
	echo "<script>window.location='index.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM employee WHERE employee_id='$_GET[delid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('employee record deleted successfully...');</script>";
	}
}
?>
  <!-- Start main-content -->
  <div class="main-content">

  
    
    <!-- Section: Features  -->
    <section>
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="title text-uppercase line-bottom-double-line-centered" data-aos="fade-up"  data-aos-duration="600"> <span class="text-theme-colored">View Employee Record</span> </h2>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="icon-box left media border-1px mb-30 p-30 pb-20"> <a class="media-left pull-left flip" href="#"><i class="flaticon-user text-theme-colored"></i></a>
                <div class="media-body">
                  <h5 class="media-heading heading" data-aos="fade-down"  data-aos-duration="600">View Employee Records..</h5>
                  <p data-aos="fade-up"  data-aos-duration="600">

<table id="datatable"  class="table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;" >				
	<thead>
		<tr>
			<th>Employee name</th>
			<th>Login ID</th>
			<th>Employee type</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
		</thead>
		<tbody>
		<?php
		$sql = "select * from employee";
		$qsql = mysqli_query($con,$sql);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
				<td>$rs[emp_name]</td>
				<td>$rs[login_id]</td>
				<td>$rs[emp_type]</td>
				<td>$rs[status]</td>
				<td><a href='employee.php?editid=$rs[employee_id]'>Edit | <a href='viewemployee.php?delid=$rs[employee_id]' onclick='return deleteconfirm()'>Delete</a></td>
			</tr>";
		}
		?>
		
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
<?php
include("footer.php");
?>
<script>
function deleteconfirm()
{
	if(confirm("Are you sure want to delete this record?") == true)
	{
		return  true;
	}
	else
	{
		return false;
	}
}
</script>