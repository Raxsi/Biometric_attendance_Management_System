<?php
include('header.php'); 
require('db connect.php');

?> 
<?php
$name=$usn=$dob=$email=$phone=$gender=$sem="";
$flag="0";
$result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['name'])) {
    $flag="1";
  } else {
    $name =($_POST['name']);
	}
	if(empty($_POST['usn'])) {
		$flag="1";
	}
	else {
		$usn = strtoupper( ($_POST['usn']));
	}
	if(empty($_POST['dob'])) {
		$flag="1";
	}
	else {
		$dob =($_POST['dob']);
	}
	if(empty($_POST['email'])) {
		$flag="1";
	}
	else {
		$email = ($_POST['email']);
	}
	if(empty($_POST['phone'])) {
		$flag="1";
	}
	else {
		$phone = ($_POST['phone']);
	}
	if(empty($_POST['gender'])) {
		$flag="1";
	}
	else {
		$gender =($_POST['gender']);
	}
	if(empty($_POST['sem'])) {
		$flag="1";
	}
	else {
		$sem = ($_POST['sem']);
	}

if($flag==1){
$result='<div class="alert alert-danger">Field Missing!!!. Please try again</div>';
}
else{
	$sql =<<<EOD
insert into student(student_name,usn,dob,gender,email,phone,semester) values('$name','$usn','$dob','$gender','$email','$phone','$sem');
EOD;
$db->exec($sql);
$result='<div class="alert alert-success">Successfully Added</div>';
}}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap core CSS -->
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/button.css" rel="stylesheet">
 <!-- Custom styles for this template -->
  </head>

  <body style="background-image: url('images/ccc.png');">
<button type="button" class="btn btn-danger" onclick="location.href='home.php';" >Back</button>
<div class="form-group">
        
    </div>
    <div class="container" >
        
        <div class="form-group">
            
        <h2 class="form-heading" style="font-size: 40px;color: white">Add Student</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div class="col-sm-3 col-sm-offset-2">
        <a><label for="name">NAME</label> </a>
            <input type="textarea" class="form-control" id="name" placeholder="Name" name="name">
       <a><label for="usn">USN</label> </a>
            <input type="textarea" class="form-control" id="usn" placeholder="USN" name="usn">
       <a><label for="dob">DOB</label> </a>
            <input type="textarea" class="form-control" id="dob" placeholder="dd/mm/yyyy" name="dob">
        <a><label for="gender">Gender</label></a>
            <input type="textarea" class="form-control" id="gender" placeholder="M/F" name="gender">
             <br />
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
            
             <div class="col-sm-3 col-sm-offset-0">
             
       <a><label for="email">Email</label></a>
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
       <a><label for="phone">Phone</label></a>
            <input type="text" class="form-control" id="phone" name="phone">
       <a> <label for="sel1">Select sem:</label> </a>
        <select class="form-control" id="sel1" name="sem">
                 <option>1</option>
                 <option>2</option>
                 <option>3</option>
                 <option>4</option>
                 <option>5</option>
                 <option>6</option>
                 <option>7</option>
                 <option>8</option>
        </select> <br />
        <div class="col-sm-6 col-sm-offset-2">
          <?php echo $result; ?>   
        </div>
        </div>
        </form>
        <?php include('footer.php'); ?>
        </body>
   		 </html>