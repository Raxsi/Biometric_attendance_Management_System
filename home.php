<?php
include('header.php'); 

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/button.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  </head>
	
	<!--	<h1 style="font-family:verdana;color:#13f9e8">
		<br><br>	WELCOME  </br></br></br>
		</h1>
		<div class="container" style="font-family:times new roman;">
	<h2 style="color: #68b44b">
			THINGS YOU CAN DO</br>
				
			</h2>
		</div> -->
		<div class="page-header">
	
    <h1 style="color: #2fd08b;font-size: 60px"><img src="images/logo.png" width="30%" height="40%"> Attendance Management System</h1>      
  </div>
		<div class="container">
	<!--	<div class="col-sm-3 col-sm-offset-10 col-lg-offset-9 col-lg-3">
		<!--<h2 style="color: #f15e0e"><strong>Services</strong></h2> <br/> -->
	<button type="button" class="btn btn-lg btn-success" onclick="location.href='liststu.php';" >Student</button>
	<button type="button" class="btn btn-lg btn-success" onclick="location.href='listsub.php';" > Subjects</button>
	<button type="button" class="btn btn-lg btn-success" onclick="location.href='listteach.php';" > Teachers</button>
	<button type="button" class="btn btn-lg btn-success" onclick="location.href='report.php';" >Attendance_all</button>
	<button type="button" class="btn btn-lg btn-success" onclick="location.href='report_all.php';" >Attendance_sem</button>
	<button type="button" class="btn btn-lg btn-success" onclick="location.href='att_upload.php';" >xls upload</button>
	<button type="button" class="btn btn-lg btn-success"onclick="location.href='report_single.php';" >Student Attendance</button>
	<button type="button" class="btn btn-lg btn-success"onclick="location.href='add_att.php';" >Add Attendance</button>
		
		
		</div>
		
		<script>
$(document).ready(function(){
    $(".btn").click(function(){
        $(this).button('loading');
    });   
});
</script>
<?php include('footer.php'); ?>
	</body>
</html>


