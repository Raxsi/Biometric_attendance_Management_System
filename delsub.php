<?php
include('header.php');
require('db connect.php');

$result=$usn="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['subid'])) {
    $result='<div class="alert alert-danger">Field Missing!!!. Please try again</div>';
  } else {
    $usn =strtoupper($_POST['subid']);
    $sql=<<<EOD
    DELETE FROM subject_table
WHERE subid='$usn';
EOD;
$result='<div class="alert alert-success">Successfully Deleted</div>';
$db->exec($sql);
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
<button type="button" class="button button3" onclick="location.href='listsub.php';" >Back</button>
<div class="container" >
        
        <div class="form-group" >
            <div class="col-sm-4 col-sm-offset-3">
            <h2 class="form-heading" style="font-size: 30px;color: white"></h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">     
      <h3>  <label for="subid" style="color:white">Subject_ID</label> </h3>
            <input type="textarea" class="form-control" id="subid" placeholder="Sub_ID" name="subid">
            <button class="btn btn-success" type="submit" name="submit">Delete</button>
            </form>
            </div>
            </div>
            <div class="form-group">
        <div class="col-sm-6 col-sm-offset-2">
          <?php echo $result; ?>   
        </div>
    </div>
</body>
</html>