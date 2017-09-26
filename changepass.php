<?php
include('header.php'); 
require('db connect.php');

?>
<?php
$opass=$npass=$dbpass="";
$flag="0";
$result="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST['opass'])) {
    $flag="1";
  } else {
    $opass =($_POST['opass']);
	}
	if(empty($_POST['npass'])) {
		$flag="1";
	}
	else {
		$npass = ($_POST['npass']);
	}
$sql=<<<EOD
select password from user where username="admin";
EOD;
$ret=$db->query($sql);
	while($row = $ret->fetchArray(SQLITE3_ASSOC) ){	
	$dbpass = $row['password'];}
	
	if($flag==1){
		$result='<div class="alert alert-danger">Field Missing!!!. Please try again</div>';
}
else{
	if(!password_verify($opass,$dbpass))
	{
		$result='<div class="alert alert-danger">Old password is wrong!!!</div>';
	}
	else{ 
		$options = [
    'cost' => 12,
];
$hpass = password_hash($npass, PASSWORD_BCRYPT, $options);
$db->exec("update user set password='$hpass'");
$result='<div class="alert alert-success">Password Successfully changed</div>';
	}
	
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
            
        <h2 class="form-heading" style="font-size: 40px;color: white">Change Password</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <div class="col-sm-3 col-sm-offset-2">
        <a><label for="opass"></label> </a>
            <input type="password" class="form-control" id="opass" placeholder="Old password" name="opass">
       <a><label for="npass"></label> </a>
            <input type="password" class="form-control" id="npass" placeholder="New password" name="npass">
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