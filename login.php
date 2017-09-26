<?php include('header.php');	
session_start();
include('db connect.php');
$username =$password=$result=$dbpass= "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
$username=($_POST['username']);
$password=($_POST['password']);


       $sql="SELECT id, username, password FROM user WHERE username='$username'";
        $query=$db->query($sql);
        if($query){
         while( $row= $query->fetchArray(SQLITE3_ASSOC)){		 	
          $userId= $row['id'];
         $dbusername=$row['username'];
          $dbpass=$row['password'];
 
        }}
          if(!password_verify($password,$dbpass))
	{
		$result='<div class="alert alert-danger">username or password is wrong!!!</div>';
		
	}
	else{ 
          	
          $_SESSION['username']=$username;
          $_SESSION['id']=$userId;
$_SESSION['logon']="true";

 			 header('Location:home.php');
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
   <link href="css/bootstrap.css" rel="stylesheet">
 <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
   <style>
    body{
      margin: 50px;
    }
   </style>
  </head>

  <body style="background-image: url('images/ccc.png');">

  <!--  <div class="container" >
<div class="form-login">
<div class="col-sm-3 col-sm-offset-8">
<h2 class="form-heading" style="font-size: 40px;color: white">Sign in</h2>
      <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
      
        <label for="username" class="sr-only">Username</label>
        <input type="username" id="username" name="username" class="form-control" placeholder="Username" required>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log in</button>
        </div>
      </form>

    </div> <!-- /container 
</div> -->

<div class="container" style="padding-top: 10%;">
	
	<div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="username" name="username" type="text" autofocus>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button type="submit" class="btn btn-success btn-block">Login</button>
                            
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br />
<div class="col-sm-5 col-sm-offset-2">
          <?php echo $result; ?>   
        </div>
        <?php include('footer.php'); ?>
  </body>
</html>