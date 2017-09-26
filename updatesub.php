<?php
include('header.php'); 
require('db connect.php');
?> 
<?php
$subid=$subname=$sem=$teacher="";
$flag="0";
$result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['subid'])) {
    $flag="1";
  } else {
    $subid =strtoupper(($_POST['subid']));
	}
	if(empty($_POST['subname'])) {
		$flag="1";
	}
	else {
		$subname = strtoupper( ($_POST['subname']));
	}
	if(empty($_POST['sem'])) {
		$flag="1";
	}
	else {
		$sem =($_POST['sem']);
	}
	if(empty($_POST['teacher'])) {
		$flag="1";
	}
	else {
		$teacher = strtoupper (($_POST['teacher']));
	}
	if($flag==1){
		$result='<div class="alert alert-danger">Field Missing!!!. Please try again</div>';
}
else{
	$sql =<<<EOD
UPDATE subject_table
SET subid='$subid',subject_name='$subname',teacher_id='$teacher',semester='$sem'
WHERE subid='$subid'
EOD;
$db->exec($sql);
$result='<div class="alert alert-success">Successfully modified</div>';
	}
		
}

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
<button type="button" class="btn btn-danger" onclick="location.href='listsub.php';" >Back</button>
    <div class="container" >
        
        <div class="form-group">
            
        <h2 class="form-heading" style="font-size: 40px;color: white"></h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div class="col-sm-3 col-sm-offset-2">
        <a><label for="subid">Subject_ID</label> </a>
            <input type="textarea" class="form-control" id="subid" placeholder="subid" name="subid" required>
       <a><label for="subname">Subject_Name</label> </a>
            <input type="textarea" class="form-control" id="subname" placeholder="SUBNAME" name="subname" required>
       <a><label for="sem">Semester</label> </a>
            <input type="number" class="form-control" id="sem" placeholder="SEM" name="sem" required>
        <a><label for="teach">Teacher_ID</label> </a>
            <input type="textarea" class="form-control" id="teach" placeholder="Teacher_ID" name="teacher" required>
             <br />
            <button class="btn btn-success" type="submit" name="submit">Submit</button>
            </div>
            </form>
            </div>
            </div> <br />
            <div class="col-sm-5 col-sm-offset-2">
          <?php echo $result; ?>   
        </div>
           <?php include('footer.php'); ?>
            </body>
            </html>